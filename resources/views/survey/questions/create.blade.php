@extends('layouts.app')
@section('title','Create Question')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.edit', ['id'=>$id])}}">Edit</a>
    / <a href="{{route('questions.index', ['id'=>$id])}}">Questions</a>
    / Create
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('questions.store', ['id'=>$id])}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="question">Question:</label>
                    <input type="text" name = "question" id = "question" class="form-control" required>
                </div>
                <div class="form-group">
                    <select name="question_type" id="question_type" required>
                        <option value="">-- Please Select The Question Type --</option>
                        <option value="CLOSED-ENDED">Closed-Ended</option>
                        <option value="OPEN-ENDED">Open-Ended</option>
                        <option value="NUMERICAL">Numerical</option>
                        <option value="RATING">Rating</option>
                        <option value="MULTIPLE_CHOICE">Multiple Choice</option>
                    </select>
                </div>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save">Save</button>
            </form>
        </div>
    </div>
@endsection
