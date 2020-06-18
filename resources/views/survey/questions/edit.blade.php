@extends('layouts.app')
@section('title','Edit Questions')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.edit', ['id'=>$id])}}">Edit</a>
    / <a href="{{route('questions.index', ['id'=>$id])}}">Questions</a>
    / Edit
@endsection
@section('content')
@endsection
