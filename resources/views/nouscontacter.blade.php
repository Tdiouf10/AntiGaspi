@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-img-top">
        <img src="{{ URL('storage/img/fond_nouscontacter.jpeg') }}" class="image-fond" alt=""/>
    </div>
    <div class="card-img-overlay">
        <div class="row m-5">
            <div class="col-lg-6 col-md-12 col-12">
                <h1 class="display-4 font-weight-bold mb-5">A PROPOS</h1>
                <div class="row h4 card p-2 fond-couleur">
                    <p>Nous sommes deux étudiants en alternance pour le diplôme d'Expert en développement Web au campus d'Ynov à Bordeaux.</p>
                    <p>Nous avons créé ce site lors d'un projet éducatif, mais également parce que le sujet de l'alimentation
                    ainsi que du gaspillage alimentaire nous porte à coeur et nous préoccupe pour les années à venir.</p>
                    <p>Notre objectif est d'accélérer le troc au sens le plus large. Grâce à la publicité, les personnes dans le besoin peuvent obtenir de la nourriture gratuitement sans contacter l'association.</p>
                    <p>Tous ces aliments peuvent rendre heureux les gens en difficulté.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header h2 mx-auto">OSWALD Perrine</div>
                    <div class="card-img-top text-center">
                        <img src="{{ URL('storage/img/photo-profile/perrine.jpeg') }}" class="photo_profile" alt=""/>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <a href="https://www.linkedin.com/in/perrine-oswald-7a89431a2/"><img src="{{ URL('storage/img/logo/linkedin.png') }}" class="logo" alt="Logo Linkedin"/></a>
                        </div>
                        <div class="col">
                            <a href="https://github.com/perrineosw"><img src="{{ URL('storage/img/logo/github.png') }}" class="logo" alt="Logo Github"/></a>
                        </div>
                        <div class="col">
                            <a href="mailto:oswald.perrinedu40@gmail.com"><img src="{{ URL('storage/img/logo/email.png') }}" class="logo" alt="Logo Email"/></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header h2 mx-auto">DIOUF Théodore</div>
                    <div class="card-img-top text-center">
                        <img src="{{ URL('storage/img/photo-profile/theo2.jpg') }}" class="photo_profile" alt=""/>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <a href="https://www.linkedin.com/in/theodore-diouf-035429225/"><img src="{{ URL('storage/img/logo/linkedin.png') }}" class="logo" alt="Logo Linkedin"/></a>
                        </div>
                        <div class="col">
                            <a href="https://github.com/Tdiouf10"><img src="{{ URL('storage/img/logo/github.png') }}" class="logo" alt="Logo Github"/></a>
                        </div>
                        <div class="col">
                            <a href="mailto:oswald.perrinedu40@gmail.com"><img src="{{ URL('storage/img/logo/email.png') }}" class="logo" alt="Logo Email"/></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row h2 mt-5 mx-2 text-center p-2 card fond-couleur">
                Alors qu'attendez-vous pour t'entez l'expérience et rejoindre la communauté d'AntiGaspi !
            </div>
        </div>
    </div>
</div>
@endsection
