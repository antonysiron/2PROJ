@extends('layouts.app')
@section('title', 'Survey Results')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / Results
@endsection
@section('content')
    <h3 style="text-align: center; margin-top: 50px">
        {{$question->question}}
    </h3>
    <div style="text-align: center; margin-top: 50px">
        <h5>{{$answers->count()}} participation(s)</h5>
    </div>
    @switch($question->question_type)
        @case('CLOSED-ENDED')
            <div class="container border" style="text-align: center; padding: 30px; margin-top: 50px">
                <div class="row">
                    <div class="col font-weight-bold border-right">OUI</div>
                    <div class="col font-weight-bold">NON</div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col border-right">{{$nb_yes}}</div>
                    <div class="col">{{$answers->count()-$nb_yes}}</div>
                </div>
            </div>
        @break
        @case('OPEN-ENDED')
            <div class="container border" style="text-align: center; padding: 30px; margin-top: 50px">
                <div class="row font-weight-bold" style="margin-bottom: 20px">
                    <div class="col">Réponse</div>
                    <div class="col">Nombre de réponses</div>
                </div>
                @foreach($open_ended as $key => $value)
                    <div class="row border-top">
                        <div class="col">{{$key}}</div>
                        <div class="col">{{$value}}</div>
                    </div>
                @endforeach
            </div>
        @break
        @case('NUMERICAL')
            <div class="container border" style="text-align: center; padding: 30px; margin-top: 50px">
                <div class="row font-weight-bold" style="margin-bottom: 20px">
                    <div class="col">Réponse</div>
                    <div class="col">Nombre de réponses</div>
                </div>
                @foreach($numerical as $key => $value)
                    <div class="row border-top">
                        <div class="col">{{$key}}</div>
                        <div class="col">{{$value}}</div>
                    </div>
                @endforeach
            </div>
        @break
        @case('RATING')
            <div class="container border" style="text-align: center; padding: 30px; margin-top: 50px">
                <div class="row font-weight-bold" style="margin-bottom: 20px">
                    <div class="col">Valeur</div>
                    <div class="col">Nombre de réponses</div>
                </div>
                @foreach($rating as $key => $value)
                    <div class="row border-top">
                        <div class="col">{{$key}}</div>
                        <div class="col">{{$value}}</div>
                    </div>
                @endforeach
            </div>
        @break
        @case('MULTIPLE_CHOICE')
            <div class="container border" style="text-align: center; padding: 30px; margin-top: 50px">
                <div class="row font-weight-bold" style="margin-bottom: 20px">
                    <div class="col">Choix</div>
                    <div class="col">Nombre de réponses</div>
                </div>
                @foreach($multiple_choice as $key => $value)
                    <div class="row border-top">
                        <div class="col">{{$key}}</div>
                        <div class="col">{{$value}}</div>
                    </div>
                @endforeach
            </div>
        @break

    @endswitch
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: left">
                @if($question->order_nb > 1)
                    <a class="btn btn-info" href="{{route('surveys.result', ['id'=>$id, 'question_nb'=>$question->order_nb-1])}}" style="margin-top: 100px;">
                        précédent
                    </a>
                @endif
            </div>
            <div class="col" style="text-align: right">
                @if($question->order_nb < $survey->nb_questions)
                    <a class="btn btn-info" href="{{route('surveys.result', ['id'=>$id, 'question_nb'=>$question->order_nb+1])}}" style="margin-top: 100px;">
                        suivant
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
