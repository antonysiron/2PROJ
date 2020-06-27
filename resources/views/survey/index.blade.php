@extends('layouts.app')
@section('title','Surveys')
@section('path')
    / Surveys
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Expiration Date</th>
                    <th>State</th>
                    <td></td>
                </tr>
                @foreach($surveys as $survey)
                    <tr class='clickable-row'>
                        <td>{{ $survey->name }}</td>
                        <td>{{ $survey->category }}</td>
                        <td>{{ $survey->description}}</td>
                        <td>{{ $survey->expiration_date }}</td>
                        <td>
                            @if($survey->status_survey == 'PUBLISHED')
                                Published
                            @elseif($survey->status_survey == 'FINISHED')
                                Finished
                            @else
                                Private
                            @endif
                        </td>
                        <td>
                            @if($survey->status_survey == 'PUBLISHED')
                                <a href="{{route('surveys.view',['id'=>$survey->id])}}" class = "btn btn-info">View</a>
                                <a href="{{route('answer.index',['id'=>$survey->id])}}" class = "btn btn-success">Answer</a>
                            @endif
                            @if($survey->status_survey == 'PUBLISHED' || $survey->status_survey == 'FINISHED')
                                <a href="{{route('surveys.result',['id'=>$survey->id, 'question_nb'=>1])}}" class = "btn btn-success">Results</a>
                            @endif
                            @if($survey->status_survey == 'FINISHED')
                                <a href="{{route('surveys.reset',['id'=>$survey->id])}}" class = "btn btn-danger">Reset</a>
                            @endif
                            @if($survey->status_survey == 'SAVED')
                                <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class = "btn btn-info">Edit</a>
                            @endif
                            @if($survey->status_survey == 'PUBLISHED')
                                <a href="{{route('surveys.stop',['id'=>$survey->id])}}" class = "btn btn-danger">Stop</a>
                            @endif
                            @if($survey->status_survey == 'SAVED' || $survey->status_survey == 'FINISHED')
                                <a href="{{route('surveys.destroy',['id'=>$survey->id])}}" class = "btn btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
