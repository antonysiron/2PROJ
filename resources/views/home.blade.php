@extends('layouts.app')
@section('title', 'Home')
@section('path')
    / Home
@endsection
@section('content')
<div class="banner">
    <h1 style="width: 35%; margin-top: 8%; margin-left: 5%">Poser des questions n'a jamais été aussi <strong>SIMPLE</strong></h1>
    <img src="/images/robo.svg" alt="robot image">
</div>

<div class="text-center text-uppercase column justify-content-center p-4">
    <h1 class="header">Des engagements pour répondre à vos besoins</h1>
    <p>- des points clés -</p>
</div>

<div class="card-container">
    <div class="icon-card">
        <img src="/images/cadena.png" alt="lock icon">
        <h3>SECURITE</h3>
        <p>Récolte de données conforme à la RGPD. Nous ne conservons, ni stockons vos questionnaires, les réponses et les analyses</p>
    </div>

    <div class="icon-card">
        <img src="/images/multilangues.png" alt="multilangues icon">
        <h3>MULTILANGUES</h3>
        <p>
            Ouverture sur le monde. Possibilité de créer des questionnaires pour vos clients à travers le monde
        </p>
    </div>

    <div class="icon-card">
        <img src="/images/questions.png" alt="question icon">
        <h3>QUESTIONS</h3>
        <p>
            Sondages ouverts ou fermés. Définissez une durée pour vos questionnaire et ils s'ouvriront et se fermeront automatiquement.
        </p>
    </div>

    <div class="icon-card">
        <img src="/images/formats.png" alt="formats icon">
        <h3>FORMATS</h3>
        <p>
            Exportation des réponses en PDF ou CSV. Afin de permettre une meilleure analyse des résultats et faciliter vos rapports.
        </p>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-5" style="background-color: rgb(250,227,200); text-align: center;">
            <img src="/images/chat.png" alt="" style="margin-top:30px; margin-bottom:30px; width:20vw">
        </div>
        <div class="col" style="background-color: #f3f0f1">
            <div class="container" style="margin-top: 5vw">
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col align-self-center border-top border-warning" style="color: #f6993f"></div>
                    <div class="col-5"></div>
                </div>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col align-self-center border-top border-warning" style="color: #f6993f"></div>
                    <div class="col-5"></div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center; margin-top: 0.5vw;">
                        <h1 style="font-size: 2vw">NOS SONDAGES</h1>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 3vw">
                    <div class="col" style="text-align: center;">
                        <p style="color: #407ebd; font-size:1vw;">- Chattez avec Biro-</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: left; margin: 3vw; margin-bottom: 1.5vw; font-size: 1.25vw;">
                        <div>Nos sondages sont sous la forme d'un tchat en ligne.</div>
                        <div>En effet cela donna l'impression à vos clients de discuter et d'intéragir
                            avec une personne et non de répondre à une liste infinie de questions
                            comme vous pouvez le retrouver sur d'autres sites de sondage.</div>
                        <div>De plus, vous pouvez entièrement personnaliser votre questionnaire.
                            En passant par l'image du fond, la couleur des bulles, l'avatar de votre client,
                            le format et la taille des bulles, et bien plus encore.</div>
                        <div>Vous pouvez cliquez sour le bouton ci-dessous pour tester un de nos questionnaires.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: left; margin-left: 3vw; margin-right: 3vw">
                        <a href="#" style="font-size: 1vw">En savoir plus ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 5vw">
    <div class="row">
        <div class="col-5"></div>
        <div class="col align-self-center border-top border-warning" style="color: #f6993f"></div>
        <div class="col-5"></div>
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col align-self-center border-top border-warning" style="color: #f6993f"></div>
        <div class="col-5"></div>
    </div>
    <div class="row">
        <div class="col" style="text-align: center; margin-top: 0.5vw;">
            <h1 class="header" style="font-size: 2vw">Ils nous font confiance</h1>
        </div>
    </div>
    <div class="row" style="margin-bottom: 3vw">
        <div class="col" style="text-align: center;">
            <p style="color: #407ebd; font-size:1vw;">- Vos avis, des améliorations -</p>
        </div>
    </div>
</div>

<div class="card-container">
    <div class="cards">
        <img src="/images/adobe.svg" alt="adobe logo">
        <p>
            "Tout ce que l'on peut imaginer, on peut le créer avec Big Brother"
        </p>
    </div>

    <div class="cards">
        <img src="/images/carrefour.svg" alt="carrefour logo">
        <p>
            "Simple et facile d'utilisation. Un plaisir pour les yeux avec sa colletion de design complet."
        </p>
    </div>

    <div class="cards">
        <img src="/images/microsoft.svg" alt="microsoft logo">
        <p>
            "Big Brother est un outil intuitif et performant qui nous permet de nous développer et nous perfectionner"
        </p>
    </div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
