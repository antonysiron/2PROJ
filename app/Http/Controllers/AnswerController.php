<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use App\UserAnswerSurvey;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index($id)
    {
        $survey = Survey::find($id);

        $user_answer_survey = UserAnswerSurvey::all()
            ->where('user_id', '=', auth()->user()->id)
            ->where('survey_id', '=', $id);
        if($user_answer_survey->count() == 0)
        {
            $user_answer_survey = new UserAnswerSurvey();
            $user_answer_survey->user_id = auth()->user()->id;
            $user_answer_survey->survey_id = $id;
            $user_answer_survey->save();
        }
        else
            $user_answer_survey = $user_answer_survey->first();

        if($user_answer_survey->last_question_nb >= $survey->nb_questions)
        {
            $user_answer_survey->answer_status = 'FINISHED';
            $user_answer_survey->save();
            return view('survey.answer.completed', ['id'=>$id, 'survey'=>$survey]);
        }

        $question = Question::all()
            ->where('survey_id', '=', $id)
            ->where('order_nb', '=', $user_answer_survey->last_question_nb+1)->first();

        $choices = null;
        if($question->question_type == 'MULTIPLE_CHOICE')
            $choices = explode(';', $question->choices);

        return view('survey.answer.index', ['id'=>$id, 'survey'=>$survey, 'question'=>$question, 'choices'=>$choices]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $user_answer_survey = UserAnswerSurvey::all()
            ->where('user_id', '=', auth()->user()->id)
            ->where('survey_id', '=', $id)->first();

        $question = Question::all()
            ->where('survey_id', '=', $id)
            ->where('order_nb', '=', $user_answer_survey->last_question_nb+1)
            ->first();

        $answer = new Answer();
        $answer->question_id = $question->id;
        $answer->answer_type = $question->question_type;

        switch ($question->question_type) {
            case('CLOSED-ENDED'):
                $answer->closed_ended = $request->input('closed-ended') == "yes";
                break;
            case('OPEN-ENDED'):
                $answer->open_ended = $request->input('open-ended');
                break;
            case('NUMERICAL'):
                $answer->numerical = $request->input('numerical');
                break;
            case('RATING'):
                $answer->rating = $request->input('rating');
                break;
            case('MULTIPLE_CHOICE'):
                $choices = "";
                $nb_choices = substr_count($question->choices, ';')+1;
                for($i=0; $i<$nb_choices; $i++) {
                    if($request->has('multiple_choice' . $i)) {
                        $choice = $request->input('multiple_choice' . $i);
                        if($choices != "")
                            $choices .= ';';
                        $choices .= $choice;
                    }
                }
                $answer->multiple_choice = $choices;
                break;
            default:
                break;
        }
        $answer->save();

        $user_answer_survey = UserAnswerSurvey::all()
            ->where('user_id', '=', auth()->user()->id)
            ->where('survey_id', '=', $id)->first();
        $user_answer_survey->last_question_nb++;
        $user_answer_survey->save();

        return redirect()->route('answer.index', ['id'=>$id]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
