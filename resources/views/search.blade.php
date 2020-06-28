@extends('layouts.app')
@section('title', 'Search Results')
@section('path')
    / Search Results
@endsection
@section('content')
    <div class="index-container">
        <div class="row align-items-start">
            <div class="col" style="padding: 0; margin-left: 2vw">
                <input id="SearchBar" class="font-italic" placeholder="rechercher" type="text" style="width: 100%; height: 30px; text-align: center; background-color: #d6e3ef; border:0px">
            </div>
            <a id="SearchBtn" href="{{route('search', ['search_value'=>' '])}}/" class="col-1" style="padding: 0;">
                <img src="/images/search_icon.svg" style="height: 30px;">
            </a>
        </div>
        <div class="border-top" style="text-align: center; font-size:30px; padding-top:20px; margin-top: 50px">
            Résultats de la recherche : "{{$search_value}}"
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 text-center ml-auto mr-auto">
                <table class="table">
                    @if(sizeof($surveys) == 0)
                        <h5 class="border-top" style="padding-top:20px">Aucun Résultat</h5>
                    @else
                        <tr>
                            <th>Nom</th>
                            <th>Categorie</th>
                            <th>Description</th>
                            <td></td>
                        </tr>
                        @foreach($surveys as $survey)
                            <tr class='clickable-row'>
                                <td>{{ $survey->name }}</td>
                                <td>{{ $survey->category }}</td>
                                <td>{{ $survey->description}}</td>
                                <td>
                                    <a href="{{route('surveys.view',['id'=>$survey->id])}}" class = "btn btn-info">Voir</a>
                                    <a href="{{route('answer.index',['id'=>$survey->id])}}" class = "btn btn-success">Répondre</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('js/search.js')}}"></script>
@endsection
