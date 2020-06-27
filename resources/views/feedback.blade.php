@extends('layouts.app')
@section('title', 'Feedback')
@section('path')
    / Feedback
@endsection
@section('content')
    <img src="/images/feedback_background.png" style="width: 100%; position:absolute; z-index: -999">
    <img src="/images/feedback_background_shadow.svg" style="width: 100%; position:absolute; z-index: -998">
    <h1 class="font-weight-bold" style="text-align: center; color: white; font-size:3vw; margin-top:6vw; text-shadow: 2px 2px 8px black">Ils nous font confiance</h1>
    <div style="text-align: center; margin-top:2vw; margin-bottom: 10%">
        <div class="container-fluid">
            <div class="row align-items-center" style="height: 35vw">
                <div class="col-2">
                    <img src="/images/arrow_left.svg" style="width: 5vw; margin-left: 6vw">
                </div>
                <div class="col">
                    <img src="/images/feedback_banner_card.svg" style="width: 60vw">
                </div>
                <div class="col-2">
                    <img src="/images/arrow_right.svg" style="width: 5vw; margin-right: 6vw">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <h2 class="font-weight-bold" style="text-align: center; margin: 50px">Laissez nous votre avis, nous nous améliorons</h2>
            @foreach($feedbacks as $feedback)
                <div class="row border-top align-items-center" style="padding: 50px">
                    <div class="col-10">
                        <div class="row font-weight-bold" style="margin-bottom: 20px">
                            {{$feedback->title}}
                        </div>
                        <div class="row">
                            {{$feedback->content}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col" style="text-align: center; margin-bottom: 15px">
                                {{$feedback->user_name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: center; margin-bottom: 30px">
                                {{$feedback->date}}
                            </div>
                        </div>
                        <div class="row" style="margin-left: 15px; margin-right: 15px">
                            @for($i=1; $i<=5 ; $i++)
                                <div class="col" style="text-align: center; padding: 0">
                                    @if($feedback->mark-$i >= 0)
                                        <img src="/images/star_full.png" style="width:100%">
                                    @elseif($feedback->mark-$i == -0.5)
                                        <img src="/images/star_half.png" style="width:100%">
                                    @else
                                        <img src="/images/star_empty.png" style="width:100%">
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @auth
        <div class="row mt-5 border-top" style="padding-top: 50px;">
            <div class="col-sm-8 offset-sm-2">
                <form action="{{route('feedback.store')}}" method = "post">
                @csrf
                    <h2 style="text-align: center; margin-bottom: 100px">Ecrivez notre histoire</h2>
                    <div class="form-group" style="margin-bottom: 30px">
                        <label for="mark">Notez nous : </label>
                        <select name="mark" id="mark" style="width: 60px; background-color: #FEF3E6" required>
                            <option value=""></option>
                            <option value="0">0</option>
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                            <option value="3.5">3.5</option>
                            <option value="4">4</option>
                            <option value="4.5">4.5</option>
                            <option value="5">5</option>
                        </select>
                         / 5
                    </div>
                    <div class="form-group" style="margin-bottom: 30px">
                        <label for="title">Sujet : </label>
                        <input type="text" name = "title" id = "title" class="form-control" style="background-color: #FEF3E6" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 30px">
                        <label for="content">Avis : </label>
                        <textarea name="content" id="content" class="form-control" style="background-color: #FEF3E6" required></textarea>
                    </div>
                    <div style="text-align: right">
                        <button type = "submit" name = "btn-action" class = "btn btn-info" value = "save" style="margin-top: 18px">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection
