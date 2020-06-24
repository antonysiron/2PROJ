<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($id)
    {
        $questions = Question::all()->where('survey_id', '=', $id)->sortBy('order_nb');
        return view('survey.questions.index', ['id'=>$id, 'questions'=>$questions]);
    }


    public function create($id)
    {
        return view('survey.questions.create', ['id'=>$id]);
    }


    public function store($id, Request $request)
    {
        $questions = Question::all()->where('survey_id', '=', $id)->sortBy('order_nb');

        $question = new Question();
        $question->survey_id = $id;
        if($questions->count() == 0)
            $question->order_nb = 1;
        else
            $question->order_nb = $questions->last()->order_nb+1;
        $question->question = $request->input('question');
        $question->question_type = $request->input('question_type');
        switch ($request->input('question_type')){
            case 'MULTIPLE_CHOICE':
                $question->choices = $request->input('choices');
                break;
            case 'RATING':
                $question->rating_scale = $request->input('rating_scale');
                break;
            default:
                break;
        }
        $question->save();

        $survey = Survey::find($id);
        $survey->nb_questions++;
        $survey->save();

        $msg = "Question Created Successfully";
        $questions = Question::all()->where('survey_id', '=', $id)->sortBy('order_nb');
        return view('survey.questions.index', ['id'=>$id, 'questions'=>$questions])->with('msg', $msg);
    }


    public function show($id)
    {
        //
    }


    public function edit($id, $question_id)
    {
        $question = Question::find($question_id);
        return view('survey.questions.edit', ['id'=>$id, 'question'=>$question]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id, $question_id)
    {
        $msg = " Error : Failed To Delete the Question";

        try {
        $answers = Answer::all()->where('question_id', '=', $question_id);
        foreach ($answers as $answer)
            $answer->delete();
        $question = Question::find($question_id);
        $question->delete();
        $msg = "Question Deleted Successfully";
        } catch (\Exception $e) {
            return redirect()->route('questions.index', ['id'=>$id])->with('msg',$msg);
        }

        $i = 0;
        $questions = Question::all()->where('survey_id', '=', $id)->sortBy('order_nb');
        foreach ($questions as $question){
            $i++;
            $question->order_nb = $i;
            $question->save();
        }

        $survey = Survey::find($id);
        $survey->nb_questions = $i;
        $survey->save();

        return redirect()->route('questions.index', ['id'=>$id])->with('msg',$msg);
    }
}
