@extends('layouts.app')
@section('title','Answer Survey')
@section('path')
    / <a href="{{route('surveys.index')}}">Surveys</a>
    / <a href="{{route('surveys.view', ['id'=>$survey->id])}}">{{$survey->name}}</a>
    / Answer
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-sm-12" style="text-align: center">
            <div style="margin-bottom: 100px">
                <h3>
                    {{ $question->question }}
                </h3>
            </div>
            <form action="{{route('answer.store', ['id'=>$id, 'question'=>$question])}}" method = "post">
            @csrf
                @if($question->question_type == 'CLOSED-ENDED')
                    <div style="margin-top:10px; text-align: center">
                        <label for="yes" class="btn-success btn-lg" style="margin-right: 50px;">
                            <input id="yes" type="radio" name="closed-ended" value="yes" required>
                            OUI
                        </label>
                        <label for="no" class="btn-danger btn-lg">
                            <input id="no" type="radio" name="closed-ended" value="no">
                            NON
                        </label>
                    </div>
                @elseif($question->question_type == 'OPEN-ENDED')
                    <textarea name="open-ended" style="width: 70%;" required></textarea>
                @elseif($question->question_type == 'NUMERICAL')
                    <input type="number" name="numerical" placeholder=" enter a number" style="text-align: center" required>
                @elseif($question->question_type == 'RATING')
                        <input type="number" name="rating" min="0" max="{{$question->rating_scale}}" placeholder=" entrez un nombre" style="text-align: center; width: 20%" required>
                        / {{$question->rating_scale}}
                @elseif($question->question_type == 'MULTIPLE_CHOICE')
                    @for($i=0; $i<sizeof($choices); $i++)
                        <label for="{{$i}}" class="row" style=" font-size:large; margin:15px">
                            <div class="col-2">
                                <input id="{{$i}}" name="multiple_choice{{$i}}" type="checkbox" value="{{$choices[$i]}}">
                            </div>
                            <div class="col">
                                {{$choices[$i]}}
                            </div>
                        </label>
                    @endfor
                @endif
                <div style="margin-top: 50px">
                    {{$question->order_nb}} / {{$survey->nb_questions}}
                </div>
                <div>
                    <button id="checkBtn" type = "submit" name = "btn-action" class = "btn btn-info" value = "{{$question->question_type}}" style="margin-top: 100px;">
                        @if($question->order_nb >= $survey->nb_questions)
                            Terminé
                        @else
                            Suivant
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if($question->question_type == 'MULTIPLE_CHOICE')
        <script src="{{asset('js/answer.js')}}"></script>
    @endif
@endsection
