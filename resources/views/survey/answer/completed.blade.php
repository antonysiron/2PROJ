@extends('layouts.app')
@section('title','Survey Completed!')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.view', ['id'=>$survey->id])}}">{{$survey->name}}</a>
    / Answer
@endsection
@section('content')
    <div class="index-container">
        <h1 style="text-align: center; margin-top: 50px">
            Merci d'avoir répondu à ce sondage!
        </h1>
    </div>
@endsection
