@extends('layouts.app')
@section('title', 'Home')
@section('path')
    / Home
@endsection
@section('content')

<div class="banner">
    <h1>Poser des questions n'a jamais été aussi SIMPLE.</h1>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

<div class="text-center column justify-content-center p-4">
    <h1>Des engagements pour répondre à vos besoins</h1>
    <p>- des points clés -</p>
</div>

<div class="card-container">
    <div class="icon-card">
        <img src="/images/cadena.png" alt="">
        <h3>SECURITE</h3>
        <p>Récolte de données conforme à la RGPD. Nous ne conservons, ni stockons vos questionnaires, les réponses et les analyses</p>
    </div>

    <div class="icon-card">
        <img src="/images/multilangues.png" alt="">
        <h3>MULTILANGUES</h3>
        <p>
            Ouverture sur le monde. Possibilité de créer des questionnaires pour vos clients à travers le monde
        </p>
    </div>

    <div class="icon-card">
        <img src="/images/questions.png" alt="">
        <h3>QUESTIONS</h3>
        <p>
            Sondages ouverts ou fermés. Définissez une durée pour vos questionnaire et ils s'acieront et se fermeront automatiquement.
        </p>
    </div>

    <div class="icon-card">
        <img src="/images/formats.png" alt="">
        <h3>FORMATS</h3>
        <p>
            Exportation des réponses en PDF ou CSV. Afin de permettre une meilleure analyse des résultats et faciliter vos rapports.
        </p>
    </div>
</div>


<div class="info-container">
    <img src="" alt="">
    <p>
        Nos surveys sont sous la forme d'un chat en ligne.
        En effet cela donna l'impression à vos clients de discuter et d'intéragir
        avec une personne et non de répondre à une liste infinie de questions
        comme vous pouvez retrouver sur d'autres sites de suveys.
        De plus, vous pouvez entièrement personnaliser votre questionnaire.
        En passant par l'image du fond, la couleur des bulles, l'avatar de votre client,
        le format et la taille des bulles, et bien plus encore.
        Vous pouvez cliquez sour le bouton ci-dessous pour tester un de nos questionnaires.
    </p>

</div>

<div class="text-center column justify-content-center p-4">
    <h1>Ils nous font confiance</h1>
    <p>- Vos avis, des améliorations -</p>
</div>

<div class="card-container">
    <div class="cards">
        <img src="/images/adobe.png" alt="">
        <p>
            "Tout ce que l'on peut imaginer, on peut le créer avec Big Brother"
        </p>
    </div>

    <div class="cards">
        <img src="" alt="">
        <p>
            "Simple et facile d'utilisation. Un plaisir pour les yeux avec sa colletion de design complet."
        </p>
    </div>

    <div class="cards">
        <img src="" alt="">
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
