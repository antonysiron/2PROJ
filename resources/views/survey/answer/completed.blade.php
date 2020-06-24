@extends('layouts.app')
@section('title','Survey Completed!')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.view', ['id'=>$survey->id])}}">{{$survey->name}}</a>
    / Answer
@endsection
@section('content')
    <h1>
        Thank you for completing this survey!
    </h1>
@endsection
