@extends('layouts.app')
@section('title','Edit Questions')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.edit', ['id'=>$id])}}">Edit</a>
    / Questions
@endsection
@section('content')
    @if (Session::has('msg'))
        @if(stripos(Session::get('msg'), 'error'))
            <div class="alert alert-danger">
                {!! Session::get('msg') !!}
            </div>
        @else
            <div class="alert alert-success">
                {!! Session::get('msg') !!}
            </div>
        @endif
    @endif
    <a href="{{route('questions.create', ['id'=>$id])}}" class="btn btn-success"> + New Question</a>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>n°</th>
                    <th>question</th>
                    <th>answers</th>
                    <th></th>
                </tr>
                <tr>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$question->order_nb}}</td>
                            <td>{{$question->question}}</td>
                            <td>
                                @switch($question->question_type)
                                    @case('CLOSED-ENDED')

                                    @case('OPEN-ENDED')

                                    @case('MULTIPLE_CHOICE')

                                    @case('NUMERICAL')

                                    @case('RATING')

                                @endswitch
                            </td>
                            <td>
                                <a href="{{route('questions.edit', ['id'=>$question->survey_id, 'question_id'=>$question->id])}}" class="btn btn-info" >Edit</a>
                                <a href="{{route('questions.destroy', ['id'=>$question->survey_id, 'question_id'=>$question->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
@endsection
