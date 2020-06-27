<?php

namespace App\Http\Controllers;

use App\Feedback;
use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all()->sortByDesc('created_at');
        return view('feedback', ['feedbacks'=>$feedbacks]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $feedback = new Feedback();
        $feedback->user_id = auth()->user()->id;
        $feedback->user_name = auth()->user()->name;
        $feedback->title = $request->input('title');
        $feedback->content = $request->input('content');
        $feedback->mark = $request->input('mark');
        $feedback->date = Carbon::now()->toDateString();
        $feedback->save();

        return redirect()->route('feedback.index');
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
