@extends('layouts.app')
@section('title','Edit Survey')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('surveys.update')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name = "name" id = "name" class="form-control" required value = "{{$survey->name}}">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" name = "category" id = "category" class="form-control" required value = "{{$survey->category}}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name = "description" id = "description" class="form-control" value = "{{$survey->description}}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration (days):</label>
                    <input type="text" name = "duration" min="0" step="1" oninput="validity.valid||(value='')" id = "duration" class="form-control" required value = "{{$survey->duration}}">
                </div>
                <input type="hidden" name="id" value = "{{$survey->id}}">

                <!-- Add question -->
                <div id ="div-add-question"></div>
                <a href="" style="margin-top: 5px" id = "a-add-question">&nbsp;<i class="fa fa-plus"></i> Add Question</a>
                <br>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save">Save</button>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "publish" >Publish</button>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "delete" >Delete</button>
            </form>
        </div>
    </div>
@endsection
