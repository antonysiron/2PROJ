@extends('layouts.app')
@section('title','Create Survey')
@section('content')
    <a href="{{route('surveys.index')}}" >< Back</a>
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('surveys.store')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name = "name" id = "name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" name = "category" id = "category" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea type="text" name = "description" id = "description" class="form-control" rows="5" cols="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Duration (days):</label>
                    <input type="number" min="0" step="1" oninput="validity.valid||(value='')" name = "duration" id = "duration" class="form-control" required>
                </div>
                <!-- Add question -->
                <div id ="div-add-question"></div>
                <a href="" style="margin-top: 5px" id = "a-add-question">&nbsp;<i class="fa fa-plus"></i> Add Question</a>
                <br>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save">Save</button>
                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "publish" >Publish</button>
            </form>
        </div>
    </div>


@endsection
