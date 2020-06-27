@extends('layouts.app')
@section('title','Surveys')
@section('path')
    / Surveys
@endsection
@section('content')
<div class="index-container">

<div class="survey-container">
    <h1>Mes Sondages</h1>
    <a href="{{route('surveys.create')}}" class="btn btn-success"> + Nouveau Sondage</a>
</div>
    <div class="row mt-5">
        <div class="col-sm-12 text-center ml-auto mr-auto">
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Description</th>
                    <th>Date d'expiration</th>
                    <th>Etat</th>
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
                                Publié
                            @elseif($survey->status_survey == 'FINISHED')
                                Terminé
                            @else
                                Privé
                            @endif
                        </td>
                        <td>
                            @if($survey->status_survey == 'PUBLISHED')
                                <a href="{{route('surveys.view',['id'=>$survey->id])}}" class = "btn btn-info">Voir</a>
                                <a href="{{route('answer.index',['id'=>$survey->id])}}" class = "btn btn-success">Répondre</a>
                            @endif
                            @if($survey->status_survey == 'PUBLISHED' || $survey->status_survey == 'FINISHED')
                                <a href="{{route('surveys.result',['id'=>$survey->id, 'question_nb'=>1])}}" class = "btn btn-success">Résultats</a>
                            @endif
                            @if($survey->status_survey == 'FINISHED')
                                <a href="{{route('surveys.reset',['id'=>$survey->id])}}" class = "btn btn-danger">Remettre à zéro</a>
                            @endif
                            @if($survey->status_survey == 'SAVED')
                                <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class = "btn btn-info">Modifier</a>
                            @endif
                            @if($survey->status_survey == 'PUBLISHED')
                                <a href="{{route('surveys.stop',['id'=>$survey->id])}}" class = "btn btn-danger">Arrêter</a>
                            @endif
                            @if($survey->status_survey == 'SAVED' || $survey->status_survey == 'FINISHED')
                                <a href="{{route('surveys.destroy',['id'=>$survey->id])}}" class = "btn btn-danger">Supprimer</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection
