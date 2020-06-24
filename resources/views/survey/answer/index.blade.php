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
            <form action="{{route('answer.store', ['id'=>$id])}}" method = "post">
            @csrf
                @if($question->question_type == 'CLOSED-ENDED')
                    <div style="margin-top:10px; text-align: center">
                        <label for="yes" class="btn-success btn-lg" style="margin-right: 50px;">
                            <input id="yes" type="radio" name="closed-ended" required>
                            YES
                        </label>
                        <label for="no" class="btn-danger btn-lg">
                            <input id="no" type="radio" name="closed-ended">
                            NO
                        </label>
                    </div>
                @elseif($question->question_type == 'OPEN-ENDED')
                    <textarea name="open-ended" style="width: 100%"></textarea>
                @elseif($question->question_type == 'NUMERICAL')
                    <input type="number" name="numerical" placeholder=" enter a number" style="text-align: center">
                @elseif($question->question_type == 'RATING')
                        <input type="number" name="rating" min="0" max="{{$question->rating_scale}}" placeholder=" enter a number" style="text-align: center; width: 20%">
                        / {{$question->rating_scale}}
                @elseif($question->question_type == 'MULTIPLE_CHOICE')
                    @for($i=0; $i<sizeof($choices); $i++)
                        <label for="{{$i}}" class="row" style=" font-size:large; margin:15px">
                            <div class="col-2">
                                <input id="{{$i}}" name="multiple_choice{{$i}}" type="checkbox">
                            </div>
                            <div class="col">
                                {{$choices[$i]}}
                            </div>
                        </label>
                    @endfor
                @endif
                <div style="text-align: right;">
                    <button type = "submit" name = "btn-action" class = "btn btn-info" value = "save" style="margin-top: 100px;">
                        @if($question->order_nb >= $survey->nb_questions)
                            Complete
                        @else
                            Next
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
