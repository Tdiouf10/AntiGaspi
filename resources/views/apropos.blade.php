@extends('layouts.app')

@section('content')

<div class="m-5">
    <h1 class="display-4 font-weight-bold">A PROPOS</h1>
    <h2 class="my-5">LE TROC ALIMENTAIRE, C’EST SUPER !</h2>
    <h3 class="font-weight-bold my-5">Pratiquer le troc alimentaire : que de bonnes raisons !</h3>
    <div class="row h5">
        <div class="col-lg-4" style="width: 420px; margin: auto">
            <img class="image" src="{{ URL('storage/img/panier_legumes.jpeg') }}" alt="image d'un panier de légumes garni"/>
        </div>
        <div class="col-lg-8">
            <p>Aujourd'hui, des scandales sont connus autour du gaspillage éhonté de produits d'épicerie dans les
                grands magasins, alors qu'ils sont tout à fait comestibles. Ce gâchis éhonté est interdit depuis des années...</p>
            <p>En attendant que les pouvoirs publics se mobilisent pour changer la donne, le peuple a le pouvoir de lancer un mouvement de solidarité grâce au troc alimentaire.</p>
            <p>Donner ou échanger de la nourriture, c’est à la fois :</p>
            <p>• Lutter contre le fléau du gaspillage ;<br>
                • Faire plaisir à autrui ;<br>
                • Favoriser les contacts sociaux ;<br>
                • Venir en aide aux plus démunis ;<br>
                • Permettre la découverte de nouvelles saveurs.</p>
            <p>Les échanges alimentaires peuvent affecter à la fois les gérants de magasins et les restaurateurs.</p>
        </div>
        <p>Pour les grosses commandes normales, l'offre peut temporairement dépasser la demande. Cependant, si
            un professionnel reste en contact dans un tel environnement, le problème sera résolu immédiatement !
            Par exemple, échanger une quantité excessive de pêches contre une quantité excessive de poissons
            rééquilibrera l'inventaire et tout reviendra à la normale.</p>
    </div>

    <h3 class="font-weight-bold my-5">L’échange de nourriture lorsque le frigo déborde</h3>
    <div class="row h5">
        <div class="col-lg-8">
            <p>Les pays occidentaux ne connaissent pas aujourd'hui de véritables pénuries alimentaires. Notre niveau de
                vie s'est nettement amélioré depuis la fin de la guerre, ce qui est une bonne nouvelle. Mais même pour les
                ménages qui choisissent de faire leurs courses de manière responsable, il arrive que cet accès facile à la
                consommation entraîne certains excès.</p>
            <p>Par exemple, se promener dans un supermarché ou un petit magasin vous présente une myriade de tentations.
                Moitié prix pour un paquet de brioche acheté. Un pack de saumon bio est en promo à -30%... et
                vous repartez avec un cabas plus que prévu. D'autres fois, vous avez simplement plus de stocks de nourriture
                que nécessaire. C'est ce qu'on appelle "des yeux plus gros qu'un réfrigérateur".</p>
            <p>Cependant, la plupart de nos aliments sont périssables, en particulier les aliments frais. Votre réserve de
                citrouilles est épuisée à temps pour cet hiver ? Plus de viande que votre famille ne peut en manger avant
                la date de péremption ? Ou certains de vos produits frais arrivent-ils à expiration ?</p>
        </div>
        <div class="col-lg-4" style="width: 420px; margin: auto">
            <img class="image" src="{{ URL('storage/img/frigo.jpeg') }}" alt="image d'un frigo ouvert rempli"/>
        </div>
        <p>N'hésitez plus, remplacez vos courses ! S'il y a trop de carottes, un membre de la famille qui habite à
            proximité peut avoir du pain supplémentaire. Ce sera un accord gagnant-gagnant.</p>
    </div>

    <h3 class="font-weight-bold my-5">Don de fruits et légumes</h3>
    <div class="row h5">
        <div class="col-lg-4" style="width: 420px; margin: auto">
            <img class="image" src="{{ URL('storage/img/don.jpeg') }}" alt="image d'un don, d'un échange de légumes"/>
        </div>
        <div class="col-lg-8">
            <p>Certaines personnes aiment faire pousser des légumes et des herbes dans leurs jardins et patios. Certains
                ont la chance d'avoir un pommier, un prunier ou même un verger entier tout près de chez eux. Des plantes
                maison et automatiquement bio, que demander de plus ?</p>
            <p>Cependant, les plantes et les arbres peuvent donner de grosses récoltes. Dans ce cas, ce serait vraiment
                dommage de les perdre ! Pour éviter un gaspillage malheureux, donner des légumes et des fruits à des amis,
                des connaissances et même de nouvelles personnes est une solution idéale pour éviter les pertes.</p>
            <p>Un échange de nourriture est également une excellente idée. Offrez une partie de votre récolte à d'autres
                ménages ! Peut-être vous réservons-nous de belles surprises en retour...</p>
            <p>Pour remplacer les aliments produits à la maison, vous aurez peut-être besoin d'aliments non végétaux
                délicieux et nutritifs, comme des œufs de poule de votre jardin ou du fromage de chèvre. De plus, ce type
                de troc ne se limite pas aux échanges de bonnes pratiques. C'est aussi l'occasion de partager des moments
                chaleureux avec d'autres résidents de votre quartier et de votre communauté et de rencontrer de nouveaux
                cœurs. Autant de raisons de s'amuser !</p>
        </div>
    </div>

    <h3 class="font-weight-bold my-5">Partager ses plats cuisinés</h3>
    <div class="row h5">
        <div class="col-lg-8">
            <p>Partager la nourriture a toujours été synonyme de sociabilité et de plaisir partagé dans toutes les cultures
                du monde. Une autre façon de passer un bon moment avec les autres est de partager un repas cuisiné.</p>
            <p>Selon la situation, nous échangerons ou donnerons simplement ce que nous aurons préparé nous-mêmes.
                Si vous avez cuisiné beaucoup de gratin ou de couscous pour une occasion spéciale, je suis sûr que tous
                vos invités auraient adoré. Cependant, nous sommes parfois confrontés à des invités moins gourmands, et
                ces petits morceaux de nourriture laissent une grande épave sur nos bras. Bien sûr, je suis très heureux
                que personne n'ait rien manqué. Pourtant, j'aimerais éviter de gaspiller des trucs supplémentaires.</p>
            <p>Cependant, la plupart de nos aliments sont périssables, en particulier les aliments frais. Votre réserve de
                citrouilles est épuisée à temps pour cet hiver ? Plus de viande que votre famille ne peut en manger avant
                la date de péremption ? Ou certains de vos produits frais arrivent-ils à expiration ?</p>
            <p>N'hésitez plus, remplacez vos courses ! S'il y a trop de carottes, un membre de la famille qui habite à
                proximité peut avoir du pain supplémentaire. Ce sera un accord gagnant-gagnant.</p>
        </div>
        <div class="col-lg-4" style="width: 420px; margin: auto">
            <img class="image" src="{{ URL('storage/img/plat.jpeg') }}" alt="image d'un plat cuisiné goûtu"/>
        </div>
    </div>
    <h5>
        <p>Il existe un autre moyen d'échanger de la nourriture : échanger des plats faits maison. Vos voisins et autres
            habitants de votre ville (ou du reste du monde) profiteront avec plaisir de vos talents culinaires. Ce n'est
            pas tout! Les personnes en situation économique difficile seront affectées de la même manière, sinon plus.</p>
        <p>Un autre scénario est lorsque vous voulez que les autres apprécient ce que vous pouvez cuisiner et apprécient
            plutôt vos talents de cuisinier. Chacun connaît sa propre recette avec sa propre touche unique. Les plats de
            différentes cultures sont particulièrement intéressants à partager.</p>
        <p>Qu'il s'agisse d'une cuisine exotique ou des plus pures traditions d'un pays, les repas succulents favorisent
            toujours le contact social et génèrent de la chaleur humaine.</p>
    </h5>

    <h3 class="font-weight-bold my-5">Le don de nourriture entre particuliers, par solidarité</h3>
    <div class="row h5">
        <div class="col-lg-4" style="width: 420px; margin: auto">
            <img class="image" src="{{ URL('storage/img/partage.jpeg') }}" alt="image d'un repas entre amis, en famille"/>
        </div>
        <div class="col-lg-8">
            <p>Pour toutes les raisons ci-dessus, vous pouvez accidentellement vous retrouver avec un excès de nourriture
                qui peut devenir rassis. Si vous partez en vacances avec un placard ou un réfrigérateur plein, votre
                nourriture sera gâtée et votre cœur sera brisé.</p>
            <p>Notre objectif est d'accélérer le troc au sens le plus large. Grâce à la publicité, les personnes dans le
                besoin peuvent obtenir de la nourriture gratuitement sans contacter l'association.</p>
            <p>Tous ces aliments peuvent rendre heureux les gens en difficulté.</p>
            <p>Alors qu'attendez-vous pour t'entez l'expérience et rejoindre la communauté de nom-du-site !</p>
        </div>
    </div>
</div>

@endsection
