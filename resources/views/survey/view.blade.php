@extends('layouts.app')
@section('title','Survey - '.$survey->name)
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / {{$survey->name}}
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-sm-12" style="text-align: center">
            <div style="margin: 50px">
                <h2>
                    {{ $survey->name }}
                </h2>
            </div>
            <div class="border-top" style="margin: 50px; padding:20px; font-size: large">
                {{ $survey->description }}
            </div>
            @if($user_answer_survey == null || $user_answer_survey->answer_status == 'IN_PROGRESS')
                <div class="border-top">
                    <a href="{{route('answer.index',['id'=>$survey->id])}}" class = "btn btn-success btn-lg" style="margin-top:50px;">Répondre</a>
                </div>
            @else
                <div class="border-top" style="margin-top:50px; padding: 20px; color: #f6993f; font-size: large">
                    Vous avez déjà répondu à ce sondage.
                </div>
            @endif
        </div>
    </div>
@endsection
