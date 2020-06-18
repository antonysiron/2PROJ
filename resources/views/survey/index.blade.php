@extends('layouts.app')
@section('title','Surveys')
@section('path')
    / Surveys
@endsection
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
                    <th>Expiration Date</th>
                    <th>State</th>
                    <td></td>
                </tr>
                @foreach($surveys as $survey)
                    <tr>
                        <td>{{ $survey->name }}</td>
                        <td>{{ $survey->category }}</td>
                        <td>{{ $survey->description}}</td>
                        <td>{{ $survey->expiration_date }}</td>
                        <td>
                            @if($survey->status_survey == 'PUBLISHED')
                                Published
                            @else
                                Private
                            @endif
                        </td>
                        <td>
                            @if($survey->status_survey == 'PUBLISHED')
                                <a href="{{route('surveys.answer',['id'=>$survey->id])}}" class = "btn btn-success">Answer</a>
                            @endif
                            <a href="{{route('surveys.result',['id'=>$survey->id])}}" class = "btn btn-success">Results</a>
                            <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class = "btn btn-info">Edit</a>
                            @if($survey->status_survey == 'PUBLISHED')
                                <a href="{{route('surveys.stop',['id'=>$survey->id])}}" class = "btn btn-danger">Stop</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
