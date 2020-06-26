<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\User;
use App\UserAnswerSurvey;
use Illuminate\Http\Request;
use App\Survey;


class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all()->where('creator_id', '=', auth()->user()->id);
        return view('survey.index',['surveys'=>$surveys]);
    }

    public function create()
    {
        return view('survey.create');
    }

    public function store(Request $request)
    {
        $survey = new Survey();
        $survey->creator_id = auth()->user()->id;
        $survey->name = $request->input('name');
        $survey->category = $request->input('category');
        $survey->description = $request->input('description');
        $survey->expiration_date = $request->input('expiration_date');
        $survey->status_survey = 'SAVED';
        $survey->save();
        return redirect()->route('questions.create', ['id'=>$survey->id]);
    }

    public function show($id)
    {
        $survey = Survey::find($id);
        $user_answer_survey = UserAnswerSurvey::all()
            ->where('user_id', '=', auth()->user()->id)
            ->where('survey_id', '=', $id);
        if($user_answer_survey->count()>0)
            $user_answer_survey = $user_answer_survey->first();
        else
            $user_answer_survey = null;
        return view('survey.view', ['survey'=>$survey, 'user_answer_survey'=>$user_answer_survey]);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        return view('survey.edit', ['survey' => $survey]);
    }

    public function update(Request $request)
    {
        $survey = Survey::find($request->input('id'));
        $action = $_POST['btn-action'];
        if($action == 'questions'){
            return redirect()->route('questions.index', ['id' => $survey->id]);
        } elseif ($action == 'delete') {
            return redirect()->route('surveys.destroy', ['id' => $survey->id]);
        } elseif ($action == 'publish') {
            if($survey->nb_questions > 0) {
                $survey->status_survey = 'PUBLISHED';
                $msg = 'Survey Published Successfully';
            }
            else {
                $survey->status_survet = 'SAVED';
                $msg = ' Error : Survey Requires One Question To Be Published';
            }
        } else {
            $msg = 'Survey Saved Successfully';
        }
        $survey->name = $request->input('name');
        $survey->category = $request->input('category');
        $survey->description = $request->input('description');
        $survey->expiration_date = $request->input('expiration_date');
        $survey->save();
        return redirect()->route('surveys.index')->with('msg', $msg);
    }

    public function destroy($id)
    {
        $msg = " Survey Deleted Successfully";
        try {
            $questions = Question::all()->where('survey_id', '=', $id);
            foreach ($questions as $question) {
                $answers = Answer::all()->where('question_id', '=', $question->id);
                foreach ($answers as $answer)
                    $answer->delete();
                $question->delete();
            }
            $survey = Survey::find($id);
            $survey->delete();
        } catch (\Exception $e) {
            $msg = " Error : Failed To Delete the Survey";
        }

        return redirect()->route('surveys.index')->with('msg',$msg);
    }

    public function stop($id)
    {
        $survey = Survey::find($id);$survey->status_survey = "FINISHED";
        $survey->save();
        return redirect()->route('surveys.index')->with('msg', 'The survey ended before its end date');
    }

    public function reset($id)
    {
        $questions = Question::all()->where('survey_id', '=', $id);
        foreach ($questions as $question)
        {
            $answers = Answer::all()->where('question_id', '=', $question->id);
            foreach ($answers as $answer)
                $answer->delete();
        }
        $users_answer_survey = UserAnswerSurvey::all()->where('survey_id', '=', $id);
        foreach ($users_answer_survey as $user_answer_survey)
            $user_answer_survey->delete();

        $survey = Survey::find($id);
        $survey->status_survey = "SAVED";
        $survey->save();

        return redirect()->route('surveys.index')->with('msg', 'The survey has been reset');
    }

    public function result($id, $question_nb)
    {
        $survey = Survey::find($id);
        if($survey->nb_questions < $question_nb)
            return redirect()->route('surveys.result', ['id'=>$id, 'question_nb'=>$question_nb+1]);

        $question = Question::all()
            ->where('survey_id', '=', $id)
            ->where('order_nb', '=', $question_nb)->first();

        $answers = Answer::all()
            ->where('question_id', '=', $question->id);

        switch($question->question_type){
            case('CLOSED-ENDED'):
                $nb_yes = $answers->where('closed_ended', '=', true)->count();
                break;
            case('OPEN-ENDED'):
                $open_ended = array();
                foreach ($answers as $answer) {
                    if(isset($open_ended[$answer->open_ended]))
                        $open_ended[$answer->open_ended]++;
                    else
                        $open_ended[$answer->open_ended] = 1;
                }
                break;
            case('NUMERICAL'):
                $numerical = array();
                foreach ($answers as $answer) {
                    if(isset($numerical[$answer->numerical]))
                        $numerical[$answer->numerical]++;
                    else
                        $numerical[$answer->numerical] = 1;
                }
                break;
            case('RATING'):
                $rating = array();
                for ($i=0; $i < $question->rating_scale+1; $i++)
                    $rating[$i] = 0;
                foreach($answers as $answer)
                    $rating[$answer->rating]++;
                break;
            case('MULTIPLE_CHOICE'):
                $multiple_choice = array();
                $choices = explode(';', $question->choices);
                foreach ($choices as $choice) {
                    $ch = $choice;
                    while($ch[0] == ' ')
                        $ch = substr($ch, 1);
                    $multiple_choice[$ch] = 0;
                }
                foreach ($answers as $answer){
                    $selected_choices = explode(';', $answer->multiple_choice);
                    foreach ($selected_choices as $choice)
                        $multiple_choice[$choice]++;
                }
                break;
            default:
                break;
        }

        return view('survey.result',['id'=>$id, 'survey'=>$survey, 'question'=>$question, 'answers'=>$answers,
            'nb_yes'=>isset($nb_yes)?$nb_yes:null,
            'open_ended'=>isset($open_ended)?$open_ended:null,
            'numerical'=>isset($numerical)?$numerical:null,
            'rating'=>isset($rating)?$rating:null,
            'multiple_choice'=>isset($multiple_choice)?$multiple_choice:null]);
    }
}
