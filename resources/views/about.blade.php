@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; A propos</div>
                        <div class="bigtitle" style="color:#1847AD">La maison du lait en quelques mot</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><!--Main content-->

            <div class="f-widget featpro">
                <div style="padding :10px; background-color :#D5D8DB">
                  <img src="{{asset('/apropos.jpg')}}" height="100%" width="100%" alt="">
                </div>
            </div>
            <div class="page-content" style="margin-top: 20px;">
                <div class="col-md-6">
                    <p>
                        La laiteire La Maison du lait S.A.R.L est une entreprise familiale Algérienne, créée en 1999 par <b> Madame et Monsieur BOUAYAD-AGHA </b>, se situe dans la zone industrielle de Remchi (wilaya de Tlemcen) sur la route nationale n° 22 .
                    </p>
                    <p>
                        Aujourd'hui, elle compte une trentaine de salariés, et sélectionne depuis sa début d’activité en 2004 le meilleur lait de vache , le transforme en produits ultra frais et met tout en place pour offrir au consommateur des produits naturels d'une grande qualité gustative:
                        <ul>
                            <li>Lait en sachet reconstitué à base de poudre de lait</li>
                            <li>Fromages Zahra (Mozzarella, feta , Halloumi)</li>
                            <li>Beurre</li>
                            <li>Yaourt Nature</li>
                        </ul>
                    </p>
                    <p>
                        Les Moyens Humains :<br>
                        La Laiterie La Maison du Lait,sarl est une entreprise régionale à taille humaine dotée d'une équipe compétente et motivée. L'homme qui occupe une place prépondérante est pour une trés large part l'artisan de la dynamique et de la réussite de l'entreprise dont le souci quotidien est d'offrir au consommateur des produits naturels d'une grande qualité gustative et bactériologiquement irréprochables.
                    </p>
                  

                </div>

                <div class="col-md-6">
                    <p>
                        Les Moyens Techniques:<br>
                        Le litrage traité par l'entreprise lui permet de se doter de technologies, de moyens de productions modernes et fiables, sécurisants pour le consommateur, en offrant le meilleur rapport qualité / prix
                    </p>


                    <p>
                        Notre mission:<br>
                        Chez La Maison du Lait, nous croyons que manger sainement tout en se faisant plaisir n'est pas une contradiction, mais une mission.
                    </p>
                    <p>
                        C'est pourquoi nous proposons des yaourts et d'autres produits laitiers frais pour chaque instant de la vie et pour le plus grand plaisir de tous.
                    </p>
                    <p>
                        Être à l'écoute du consommateur, fabriquer des produits sains d'une qualité irréprochable, chercher sans cesse à innover et même à surprendre et investir dans le capital humain qu'est notre personnel, voilà les ingrédients essentiels qui font la réussite de notre entreprise et la satisfaction de notre clientèle.
                    </p>

                </div>
                
              
            </div>
        </div>
       
    </div>
    <div class="spacer"></div>
</div>

@endsection
