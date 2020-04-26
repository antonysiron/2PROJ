@extends('layouts.app')
@section('title','Create Survey')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-success">
            {!! \Session::get('msg') !!}
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Duration (days)</th>
                </tr>
                @foreach($surveys as $survey)
                    @guest
                        {{$survey}}
                        @if($survey->status_survey == 'RUNNING' or ($survey->status_survey == 'FINISHED' and $survey->status_result == 'PUBLISHED'))
                            <tr class = "text-center">
                                <td>{{ $survey->name }}</td>
                                <td>{{ $survey->category }}</td>
                                <td>{{ $survey->description }}</td>
                                <td>{{ $survey->duration }}</td>
                                @if($survey->status_survey == 'RUNNING')
                                    <td>
                                        <a href="{{route('surveys.answer',['id'=>$survey->id])}}" class = "btn btn-info">Answer</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{route('surveys.result',['id'=>$survey->id])}}" class = "btn btn-info">Result</a>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @elseif($survey->creator_id == auth()->user()->id)
                        creator
                        <tr class = "text-center">
                            <td>{{ $survey->name }}</td>
                            <td>{{ $survey->category }}</td>
                            <td>{{ $survey->description }}</td>
                            <td>{{ $survey->duration }}</td>
                            @if($survey->status_survey == 'SAVED')
                                <td>
                                    <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class = "btn btn-info">Edit</a>
                                    <a href="{{route('surveys.destroy',['id'=>$survey->id])}}" class = "btn btn-danger">Delete</a>
                                </td>
                            @elseif($survey->status_survey == 'RUNNING')
                                <td>
                                    <a href="{{route('surveys.answer',['id'=>$survey->id])}}" class = "btn btn-info">Answer</a>
                                    <a href="{{route('surveys.stop',['id'=>$survey->id])}}" class = "btn btn-danger">Stop</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{route('surveys.result',['id'=>$survey->id])}}" class = "btn btn-info">Result</a>
                                </td>
                            @endif
                        </tr>
                    @elseif($survey->status_survey == 'RUNNING' or ($survey->status_survey == 'FINISHED' and $survey->status_result == 'PUBLISHED'))
                        user
                        <tr class = "text-center">
                            <td>{{ $survey->name }}</td>
                            <td>{{ $survey->category }}</td>
                            <td>{{ $survey->description }}</td>
                            <td>{{ $survey->duration }}</td>
                            @if($survey->status == 'RUNNING')
                                <td>
                                    <a href="{{route('surveys.answer',['id'=>$survey->id])}}" class = "btn btn-info">Answer</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{route('surveys.result',['id'=>$survey->id])}}" class = "btn btn-info">Result</a>
                                </td>
                            @endif
                        </tr>
                    @endguest
                @endforeach
            </table>
        </div>
    </div>
@endsection
