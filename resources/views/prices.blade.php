@extends('layouts.app')
@section('title', 'Prices')
@section('content')
    <img src="/images/prices_banner_background.png" style="width:100%; height: 60vw; position:absolute; z-index: -999">
    <h1 style="text-align: center; color: white; font-size: 2.5vw; margin: 3vw; margin-bottom: 10vw">Choisissez un abonnement ou payez à l'unité</h1>
    <div class="container-fluid" style="width: 90vw; margin-bottom: 5vw;">
        <div class="row">
            <div class="col">
                <img src="/images/prices_card_essentials.svg" style="height: 40vw">
            </div>
            <div class="col" style="margin: -5vw;">
                <img src="/images/prices_card_entreprise.svg" style="height: 40vw">
                <div style="text-align: center">
                    <img src="/images/prices_dotted_line.svg" style="position:absolute; z-index: -997; height: 25vw">
                </div>
            </div>
            <div class="col">
                <img src="/images/prices_card_free.svg" style="position:absolute; height: 40vw; z-index: -998">
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <img src="/images/prices_table.svg" style="width: 80vw; margin-top: 10vw; margin-bottom: 15vw">
    </div>
    <h1 style="text-align: center; font-size: 2.5vw; margin: 3vw; margin-bottom: 5vw">Ou peut-être que vous n'avez besoin que d'un sondage ?</h1>
    <div style="text-align: center">
        <img src="/images/prices_unit_survey.svg" style="width: 90vw; margin-bottom: 5vw">
    </div>
    <div style="text-align: center">
        <a href="{{route('contact.index')}}" class="btn btn-warning font-weight-bold" style="position:absolute; color: white; background-color: #f29422; margin-left: 65vw; margin-top: 20vw; width: 15vw; font-size: 1vw">Nous Contacter</a>
        <img src="/images/prices_ONG.svg" style="width: 100vw; margin-bottom: 5vw">
    </div>
    @guest
        <div style="text-align: center; margin-bottom: 5vw; margin-top: 10vw; font-size: 2vw">
            <div class="font-weight-bold">Prêt à vous lancer ?</div>
            <div>Créez simplement un compte et obtenez des réponses à vos questions.</div>
            <a href="{{route('register')}}" class="btn font-weight-bold" style=" color: white; background-color: #F3658D; width: 55vw; height: 2.5vw; font-size: 1vw; margin-top:1.5vw">INSCRIVEZ-VOUS</a>
        </div>
    @endguest
@endsection
