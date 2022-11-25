@extends('layouts.app')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div  class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>
                Bienvenue sur notre site
                <span>Anti-Gaspi</span>
            </h1>
            <h2>Votre site pour lutter contre le gaspillage</h2>
        </div>
    </section>
    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-basket"></i></div>
                            <h4 class="title"><a href="" style="text-decoration:none">Fruits & Légumes</a></h4>
                            <p class="description">Un large choix parmis les fruits et légumes sont à votre portée !</p><br>
                            <p class="description">N'hésitez pas les partager également. <i class="bi bi-emoji-wink"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-egg"></i></div>
                            <h4 class="title"><a href="" style="text-decoration:none">Condiments, féculents, ...</a></h4>
                            <p class="description">Venez trouver les condiments, ingrédients qu'ils vous manquent.</p><br>
                            <p class="description">Votre stocke peut intéresser votre voisin ! <i class="bi bi-emoji-heart-eyes"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-fire"></i> <i class="bi bi-snow2"></i></div>
                            <h4 class="title"><a href="" style="text-decoration:none">Plats chauds & froids</a></h4>
                            <p class="description">Envie de manger autre chose d'originale ? d'un plat cuisiné ? Venez réserver les pats qui vous font envie !</p><br>
                            <p class="description">Partagez vos plats, vos restes, votre passion avec des gens à côté de chez-vous ! <i class="bi bi-emoji-laughing"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title mb-0 pb-0">
                    <h2>Qui sommes nous</h2>
                    <h3>En savoir plus <span>sur nous</span></h3>
                    <p>Deux étudiants en informatiques qui veulent sensibiliser et lutter contre le gaspillage alimentaire.</p>
                    <h4 class="text-center mt-5 pb-lg-0 pb-5"><strong>Notre objectif est d'accélérer le troc et lutter ensemble et gratuitement contre le gaspillage alimentaire !</strong></h4>
                </div>
                <div class="row">
                    <div class="col-lg-3 my-auto" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ URL('storage/img/photo-profile/theo2.jpg') }}"  class="img-fluid rounded-5" alt="">
                        <div class="row text-center">
                            <div class="col-4">
                                <a href="https://www.linkedin.com/in/theodore-diouf-035429225/"><i class="bi bi-linkedin text-black fs-3"></i></a>
                            </div>
                            <div class="col-4">
                                <a href="https://github.com/Tdiouf10"><i class="bi bi-github text-black fs-3"></i></a>
                            </div>
                            <div class="col-4">
                                <a href="mailto:theodoremdiouf98@gmail.com"><i class="bi bi-envelope text-black fs-3"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-4 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <ul>
                            <li>
                                <i class="puce bi bi-house"></i>
                                <div class="my-auto">
                                    <h5 class="text-justify">Trouver et partager avec ses voisins <i class="bi bi-search-heart"></i></h5>
                                    <p class="text-justify">Bien souvent nous ne connaissons pas bien nos voisins, c'est locasion de nouer des liens !</p>
                                </div>
                            </li>
                            <li>
                                <i class="puce bi bi-trash3"></i>
                                <div class="my-auto">
                                    <h5 class="text-justify">Ne jetez plus vos aliments <i class="bi bi-check-circle"></i></h5>
                                    <p class="text-justify">Vos ingrédients, plats approchent de la date de consommation ?<br>Proposez le, quelqu'un pourrait être intéressé !</p>
                                </div>
                            </li>
                            <li>
                                <i class="puce bi bi-currency-euro"></i>
                                <div class="my-auto">
                                    <h5 class="text-justify">Trouver de la nourriture gratuitement <i class="bi bi-lightbulb"></i></h5>
                                    <p class="text-justify">Les personnes dans le besoin peuvent obtenir de la nourriture gratuitement et sans contacter d'association.</p>
                                </div>
                            </li>
                            <li>
                                <i class="puce bi bi-globe"></i>
                                <div class="my-auto">
                                    <h5 class="text-justify">Agissons ensemble pour la planète <i class="bi bi-balloon-heart"></i></h5>
                                    <p class="text-justify">Faisons parti de ceux qui agisse à leur échelle contre le réchauffement climatique !</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 my-auto" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ URL('storage/img/photo-profile/perrine.jpeg') }}"  class="img-fluid rounded-5" alt="">
                        <div class="row text-center">
                            <div class="col-4">
                                <a href="https://www.linkedin.com/in/perrine-oswald-7a89431a2/"><i class="bi bi-linkedin text-black fs-3"></i></a>
                            </div>
                            <div class="col-4">
                                <a href="https://github.com/perrineosw"><i class="bi bi-github text-black fs-3"></i></a>
                            </div>
                            <div class="col-4">
                                <a href="mailto:oswald.perrinedu40@gmail.com"><i class="bi bi-envelope text-black fs-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-center"><strong>Alors qu'attendez-vous pour t'entez l'expérience et rejoindre la communauté d'AntiGaspi !</strong></h3>
            </div>
        </section>
@endsection
