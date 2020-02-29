<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;


class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all surveys from the database and return to view
        $surveys = Survey::all();
        return view('survey.index',['surveys'=>$surveys]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return view to create survey
        return view('survey.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Persist the survey in the database
        //form data is available in the request object
        $survey = new Survey();
        //input method is used to get the value of input with its
        //name specified
        $survey->name = $request->input('name');
        $survey->category = $request->input('category');
        $survey->description = $request->input('description');
        $survey->duration = $request->input('duration');
        $survey->save(); //persist the data
        return redirect()->route('surveys.index')->with('info','Survey Added Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the survey
        $survey = Survey::find($id);
        return view('survey.edit',['survey'=> $survey]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Retrieve the employee and update
        $survey = Survey::find($request->input('id'));
        $survey->name = $request->input('name');
        $survey->category = $request->input('category');
        $survey->description = $request->input('description');
        $survey->duration = $request->input('duration');
        $survey->save(); //persist the data
        return redirect()->route('surveys.index')->with('info','Survey Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Retrieve the survey
        $survey = Survey::find($id);
        //delete
        $survey->delete();
        return redirect()->route('surveys.index');
    }

}
