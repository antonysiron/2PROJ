@extends('layouts.app')
@section('title','Create Survey')
@section('content')
    <div class="row mt-5">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Duration (days)</th>
                </tr>
                @foreach($surveys as $survey)
                    <tr class = "text-center">
                        <td>{{ $survey->name }}</td>
                        <td>{{ $survey->category }}</td>
                        <td>{{ $survey->description }}</td>
                        <td>{{ $survey->duration }}</td>
                        <td><a href="{{route('surveys.edit',['id'=>$survey->id])}}" class = "btn btn-info">Edit</a></td>
                        <td><a href="{{route('surveys.destroy',['id'=>$survey->id])}}" class = "btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
