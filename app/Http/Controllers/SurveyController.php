<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Survey;


class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
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
            $msg = 'Survey Saved Successfully';
            // this is a comment
        }
        $survey->creator_id = auth()->user()->id;
        $survey->name = $request->input('name');
        $survey->category = $request->input('category');
        $survey->description = $request->input('description');
        $survey->duration = $request->input('duration');
        $survey->status_survey = 'SAVED';
        $survey->save();
        return redirect()->route('surveys.index')->with('msg',$msg);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        if(auth()->user()->id == $survey->creator_id) {
            return view('survey.edit', ['survey' => $survey]);
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $survey = Survey::find($request->input('id'));
        $action = $_POST['btn-action'];
        if($survey->creator_id == auth()->user()->id) {
            if ($action == 'delete') {
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
            $survey->duration = $request->input('duration');
            $survey->save();
            return redirect()->route('surveys.index')->with('msg', $msg);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $survey = Survey::find($id);
        if($survey->creator_id == auth()->user()->id){
            $survey->delete();
            return redirect()->route('surveys.index')->with('msg','Survey Deleted Successfully');
        }
        return redirect()->back();
    }

    public function stop($id)
    {
        $survey = Survey::find($id);
        if($survey->creator_id == auth()->user()->id) {
            $survey->status_survey = "FINISHED";
            $survey->save();
            return redirect()->route('surveys.index')->with('msg', 'The survey ended before its end date');
        }
        return redirect()->back();
    }

    public function answer($id)
    {
        $surveys = Survey::all();
        return view('survey.index',['surveys'=>$surveys]);
    }

    public function result($id)
    {
        $surveys = Survey::all();
        return view('survey.index',['surveys'=>$surveys]);
    }
}
