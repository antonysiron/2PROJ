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

    public function result($id)
    {
        $surveys = Survey::all();
        return view('survey.result',['surveys'=>$surveys]);
    }
}
