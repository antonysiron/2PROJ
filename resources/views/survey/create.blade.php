@extends('layouts.app')
@section('title','Create Survey')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / Create
@endsection
@section('content')
<div class="index-container">    
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('surveys.store')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" name = "name" id = "name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category">Categorie:</label>
                    <input type="text" name = "category" id = "category" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name = "description" id = "description" class="form-control" rows="5" cols="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="expiration_date">Date d'expiration:</label>
                    <input type="date" min="{{Carbon\Carbon::now()->toDateString()}}" name = "expiration_date" id = "expiration_date" class="form-control" value="{{Carbon\Carbon::now()->toDateString()}}">
                </div>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "next">Next</button>
            </form>
        </div>
    </div>
</div>


@endsection
