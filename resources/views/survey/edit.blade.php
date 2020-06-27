@extends('layouts.app')
@section('title','Edit Survey')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('surveys.update')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" name = "name" id = "name" class="form-control" required value = "{{$survey->name}}">
                </div>
                <div class="form-group">
                    <label for="category">Categorie:</label>
                    <input type="text" name = "category" id = "category" class="form-control" required value = "{{$survey->category}}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name = "description" id = "description" class="form-control" value = "{{$survey->description}}">
                </div>
                <div class="form-group">
                    <label for="expiration_date">Date d'expiration:</label>
                    <input type="date" min="{{Carbon\Carbon::now()->toDateString()}}" name = "expiration_date" id = "expiration_date" class="form-control" value="{{$survey->expiration_date < Carbon\Carbon::now()->toDateString() ? Carbon\Carbon::now()->toDateString() : $survey->expiration_date}}">
                </div>
                <input type="hidden" name="id" value = "{{$survey->id}}">

                <!-- submit buttons -->
                <div style="text-align: center; margin-top:32px;">
                    @if($survey->status_survey != 'PUBLISHED' && $survey->nb_questions != 0)
                        <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save" style="margin-bottom:8px; width:49.7%">Enregistrer</button>
                        <button type = "submit" name = "btn-action" class = "btn btn-success" value = "publish" style="margin-bottom:8px; width:49.7%">Publier</button>
                    @else
                        <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save" style="margin-bottom:8px; width:100%">Enregistrer</button>
                    @endif
                    <br>
                    <button type = "submit" name = "btn-action" class = "btn btn-info" value = "questions" style="margin-bottom:8px; width:100%">Editer les Questions</button>
                    <br>
                    <button type = "submit" name = "btn-action" class = "btn btn-danger" value = "delete" style="width:100%">Supprimer</button>
                </div>

            </form>
        </div>
    </div>
@endsection
