@extends('layouts.app')
@section('title', 'Contact')
@section('content')
    <img src="/images/contact_background.png" style="width: 100%; position:absolute; z-index: -999">
    <img src="/images/contact_background_shadow.svg" style="width: 100%; position:absolute; z-index: -998; margin-top:-0.75vw">
    <h1 class="font-weight-bold" style="text-align: center; color: white; font-size:3vw; margin-top:4vw; text-shadow: 2px 2px 8px black">
        Une question ? Besoin de nous contacter ?
    </h1>
    <h1 style="text-align: center; color: white; font-size:1.5vw; text-shadow: 2px 2px 8px black; margin-top:1.20vw">
        N'hésitez pas, nos équipes vous répondront rapidement.
    </h1>
    <div style="text-align: center; margin-top:10vw; margin-bottom: 10%">
        <img src="/images/contact_banner_card.svg" style="width: 60vw">
    </div>
    <div class="container-fluid" style="margin-top: 15vw">
        <div class="row align-items-center">
            <div class="col-5" style="text-align: center">
                <img src="/images/contact_robot.svg" style="width: 25vw">
            </div>
            <div class="col">
                <div class="row mt-5 border-top" style="padding-top: 50px;">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="{{route('contact.store')}}" method = "post">
                            @csrf
                            <h2 style="text-align: center; margin-bottom: 100px">
                                Si vous avez une question, n'attendez plus,
                                envoyez-nous un message.
                            </h2>
                            <div class="form-group" style="margin-bottom: 30px">
                                <label for="name">Nom : </label>
                                <input type="text" name="name" id="name" class="form-control" style="background-color: #FEF3E6" required>
                            </div>
                            <div class="form-group" style="margin-bottom: 30px">
                                <label for="content">Email : </label>
                                <input type="email" name="email" id="email" class="form-control" style="background-color: #FEF3E6" required>
                            </div>
                            <div class="form-group" style="margin-bottom: 30px">
                                <label for="title">Sujet : </label>
                                <input type="text" name = "title" id = "title" class="form-control" style="background-color: #FEF3E6" required>
                            </div>
                            <div class="form-group" style="margin-bottom: 80px">
                                <label for="content">Avis : </label>
                                <textarea name="content" id="content" class="form-control" style="background-color: #FEF3E6" required></textarea>
                            </div>
                            <div style="text-align: center">
                                <button type = "submit" name = "btn-action" class = "btn btn-info" value = "save" style="margin-top: 18px; width: 10vw; text-align: center">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center; margin-top: 13vw">
        <h2 class="font-italic">Suivez nous !</h2>
    </div>
    <div style="text-align: center; margin-top: 2vw">
        <a href="#">
            <img src="/images/facebook_green.svg">
        </a>
        <a href="#">
            <img src="/images/instagram_green.svg">
        </a>
        <a href="#">
            <img src="/images/twitter_green.svg">
        </a>
        <a href="#">
            <img src="/images/pinterest_green.svg">
        </a>
    </div>
@endsection
