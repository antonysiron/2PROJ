@extends('layouts.app')
@section('title', 'Feedback')
@section('path')
    / Feedback
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            @foreach($feedbacks as $feedback)
                <div class="row border-top" style="padding: 50px">
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
                        <div class="row">
                            <div class="col" style="text-align: center">
                                @for($i=1; $i<=5 ; $i++)
                                    @if($feedback->mark-$i >= 0)
                                        <img src="/images/star_full.png" style="width:18%">
                                    @elseif($feedback->mark-$i == -0.5)
                                        <img src="/images/star_half.png" style="width:18%">
                                    @else
                                        <img src="/images/star_empty.png" style="width:18%">
                                    @endif
                                @endfor
                            </div>
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
                    <h2 style="text-align: center; margin-bottom: 50px">Leave us a feedback !</h2>
                    <div class="form-group" style="margin-bottom: 30px">
                        <label for="mark">Rate us : </label>
                        <select name="mark" id="mark" style="width: 60px" required>
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
                        <label for="title">Title : </label>
                        <input type="text" name = "title" id = "title" class="form-control" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 30px">
                        <label for="content">Feedback : </label>
                        <textarea name="content" id="content" class="form-control" required></textarea>
                    </div>
                    <button type = "submit" name = "btn-action" class = "btn btn-success" value = "save" style="margin-top: 18px">Submit</button>
                </form>
            </div>
        </div>
    @endauth
@endsection
