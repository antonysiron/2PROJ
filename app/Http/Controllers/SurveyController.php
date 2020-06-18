<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Survey;


class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all()->where('creator_id', '=', auth()->user()->id);
        foreach($surveys as $survey)
        {
            if($survey->expiration_date != null && $survey->status_survey == 'PUBLISHED' && $survey->expiration_date < Carbon::now()->toDateString())
            {
                $survey->status_survey = 'FINISHED';
            }
        }
        return view('survey.index',['surveys'=>$surveys]);
    }

    public function create()
    {
        return view('survey.create');
    }

    public function store(Request $request)
    {
        $survey = new Survey();
        $action = $_POST['btn-action'];
        if($action == 'publish') {
            $survey->status_survey = 'PUBLISHED';
            $msg = 'Survey Published Successfully';
        } else {
            $survey->status_survey = 'SAVED';
            $msg = 'Survey Saved Successfully';
        }
        $survey->creator_id = auth()->user()->id;
        $survey->name = $request->input('name');
        $survey->category = $request->input('category');
        $survey->description = $request->input('description');
        $survey->expiration_date = $request->input('expiration_date');
        $survey->save();
        if($action == 'next')
            return redirect()->route('questions.create', ['id'=>$survey->id]);
        return redirect()->route('survey.index')->with('msg',$msg);
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
            $survey->status_survey = 'PUBLISHED';
            $msg = 'Survey Published Successfully';
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
        $survey = Survey::find($id);
        $survey->delete();
        return redirect()->route('surveys.index')->with('msg','Survey Deleted Successfully');
    }

    public function stop($id)
    {
        $survey = Survey::find($id);$survey->status_survey = "FINISHED";
        $survey->save();
        return redirect()->route('surveys.index')->with('msg', 'The survey ended before its end date');
    }

    public function answer($id)
    {
        $surveys = Survey::all();
        return view('survey.index',['surveys'=>$surveys]);
    }

    public function result($id)
    {
        $surveys = Survey::all();
        return view('survey.result',['surveys'=>$surveys]);
    }
}
