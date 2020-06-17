@extends('layouts.app')
@section('title', 'Survey Results')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / Results
@endsection
@section('content')
    <a href="{{route('surveys.index')}}" >< Back</a>


@endsection
