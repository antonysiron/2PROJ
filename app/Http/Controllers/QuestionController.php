<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
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
        //
    }


    public function store($id, Request $request)
    {
        //
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
        //$question->delete();
        $msg = "Question Deleted Successfully";
        } catch (\Exception $e) {
            return redirect()->route('questions.index', ['id'=>$id])->with('msg',$msg);
        }

        $i = 0;
        $questions = Question::all()->where('survey_id', '=', $id)->sortBy('order_nb');
        foreach ($questions as $question){
            $question->order_nb = $i;
            $question->save();
            $i++;
        }

        return redirect()->route('questions.index', ['id'=>$id])->with('msg',$msg);
    }
}
