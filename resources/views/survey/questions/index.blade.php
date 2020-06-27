@extends('layouts.app')
@section('title','Edit Questions')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.edit', ['id'=>$id])}}">Edit</a>
    / Questions
@endsection
@section('content')
<div class="index-container">
    <a href="{{route('questions.create', ['id'=>$id])}}" class="btn btn-success"> + Nouvelle Question</a>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>n°</th>
                    <th>question</th>
                    <th></th>
                </tr>
                <tr>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$question->order_nb}}</td>
                            <td>{{$question->question}}</td>
                            <td>
                                <a href="{{route('questions.edit', ['id'=>$question->survey_id, 'question_id'=>$question->id])}}" class="btn btn-info" >Modifier</a>
                                <a href="{{route('questions.destroy', ['id'=>$question->survey_id, 'question_id'=>$question->id])}}" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
