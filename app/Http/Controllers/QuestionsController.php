<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
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


    public function destroy($id)
    {
        //
    }
}
