@extends('layouts.app')
@section('title','Edit Questions')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.edit', ['id'=>$id])}}">Edit</a>
    / <a href="{{route('questions.index', ['id'=>$id])}}">Questions</a>
    / Edit
@endsection
@section('content')
<div class="index-container">

    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('questions.update', ['id'=>$id, 'question_id'=>$question->id])}}" method = "post">
            @csrf

            <!-- Question field -->
                <div class="form-group" style="margin-bottom: 30px">
                    <label for="question">Question : </label>
                    <input type="text" name = "question" id = "question" class="form-control" value="{{$question->question}}" required>
                </div>

                <!-- Type display -->
                <div id="CLOSED-ENDED" class="type" @if($question->question_type !== 'CLOSED-ENDED')style="display: none;"@endif>
                    Aperçu :
                    <div class="border" style="padding: 18px; margin-top:10px; text-align: center">
                        <button class="btn btn-success btn-lg" disabled style="margin-right: 18px">OUI</button>
                        <button class="btn btn-danger btn-lg" disabled>NON</button>
                    </div>
                </div>
                <div id="OPEN-ENDED" class="type" @if($question->question_type !== 'OPEN-ENDED')style="display: none;"@endif>
                    Aperçu :
                    <div class="border" style="padding: 18px; margin-top:10px; text-align: center">
                        <textarea style="width: 90%" disabled></textarea>
                    </div>
                </div>
                <div id="NUMERICAL" class="type" @if($question->question_type !== 'NUMERICAL')style="display: none;"@endif>
                    Aperçu :
                    <div class="border" style="padding: 18px; margin-top:10px; text-align: center">
                        <input type="number" placeholder=" entrez un nombre" style="text-align: center" disabled>
                    </div>
                </div>
                <div id="RATING" class="type border" style="@if($question->question_type !== 'RATING')display: none;@endif padding: 18px">
                    <label for="rating_scale">Note Max :</label>
                    <input class="RATING_REQUIRED REQUIRED" type="number" min="1" name="rating_scale" id="rating_scale" @if($question->question_type === 'RATING')value="{{$question->rating_scale}}" required @endif>
                    <br>
                    Aperçu :
                    <div class="border" style="padding: 18px; margin-top:10px; text-align: center">
                        <input class="RATING_REQUIRED" type="number" placeholder=" entrez un nombre" style="text-align: center" disabled>
                        / "Note Max"
                    </div>
                </div>
                <div id="MULTIPLE_CHOICE" class="type border" style="@if($question->question_type !== 'MULTIPLE_CHOICE')display: none;@endif padding: 18px">
                    <label for="choices">Entrez les différentes propositions séparées par ";" : </label><br>
                    <input class="MULTIPLE_CHOICE_REQUIRED REQUIRED" type="text" name="choices" id="choices" style="width: 100%; margin-bottom: 10px;" @if($question->question_type === 'MULTIPLE_CHOICE') value="{{$question->choices}}" required @endif>
                    <br>
                    Aperçu :
                    <div class="border" style="padding: 18px; margin-top:10px">
                        <input id="01" type="checkbox" style="text-align: center" disabled>
                        <label for="01">Proposition 1</label>
                        <br>
                        <input id="02" type="checkbox" style="text-align: center" disabled>
                        <label for="02">Proposition 2</label>
                        <br>
                        <input id="03" type="checkbox" style="text-align: center" disabled>
                        <label for="03">Proposition 3</label>
                    </div>
                </div>

                <!-- Type Selection -->
                <div class="form-group" style="margin-top: 50px">
                    <label for="question_type">Type de question :</label>
                    <select onchange="UpdateDisplayCreateQuestion(this.value)" name="question_type" id="question_type" required>
                        <option value="">-- Selectionnez un type de question --</option>
                        <option value="CLOSED-ENDED" @if($question->question_type == 'CLOSED-ENDED') selected @endif>Fermée</option>
                        <option value="OPEN-ENDED" @if($question->question_type == 'OPEN-ENDED') selected @endif>Ouverte</option>
                        <option value="NUMERICAL" @if($question->question_type == 'NUMERICAL') selected @endif>Numérique</option>
                        <option value="RATING" @if($question->question_type == 'RATING') selected @endif>Notation</option>
                        <option value="MULTIPLE_CHOICE" @if($question->question_type == 'MULTIPLE_CHOICE') selected @endif>Choix multiple</option>
                    </select>
                </div>

                <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save" style="margin-top: 18px">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/question.js')}}"></script>
@endsection
