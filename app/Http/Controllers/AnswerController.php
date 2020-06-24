<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        //
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
