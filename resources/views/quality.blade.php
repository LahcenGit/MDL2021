@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-9">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Qualité</div>
                        <div class="bigtitle" style="color:#1847AD">Qualité et sécurité alimentaire</div>
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
                  <img src="{{asset('/quality.jpg')}}" height="100%" width="100%" alt="">
                </div>
            </div>
            <div class="page-content" style="margin-top: 20px;">
                <div class="col-md-6">
                    <p>
                        La maison du lait, est fière de garantir la qualité et la sécurité alimentaire de ses produits. Nous nous engageons à fournir à nos clients des produits de la plus haute qualité en contrôlant rigoureusement la qualité du lait que nous utilisons.
                    </p>
    
                    <p>
                        Tout d'abord, nous nous assurons que le lait que nous achetons provient de fermes qui respectent les normes les plus strictes en matière de soins aux animaux et de sécurité alimentaire. Nous travaillons en étroite collaboration avec ces fermes pour nous assurer que les vaches sont nourries avec des aliments de qualité et que leurs conditions de vie sont saines et confortables.
                    </p>
                    <p>
                        De plus, nous effectuons régulièrement des contrôles de qualité sur le lait que nous recevons pour nous assurer qu'il répond à nos normes élevées en matière de pureté et de sécurité. Nous utilisons les dernières techniques d'analyse pour détecter tout contaminant potentiel, et nous n'utilisons que le lait qui répond à nos critères de qualité rigoureux.
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        Enfin, nous mettons en œuvre des pratiques de fabrication strictes pour garantir la qualité de nos produits finis. Toutes les étapes de la production sont surveillées de près pour garantir que nos produits sont fabriqués dans des conditions saines et hygiéniques, et que leur goût et leur texture répondent à nos normes élevées.
                    </p>
                                   
                    <p>
                        En somme, chez la maison du lait, nous nous engageons à fournir à nos clients des produits laitiers de la plus haute qualité et sécurité alimentaire. Nous n'utilisons que le meilleur lait et mettons en œuvre les pratiques de fabrication les plus rigoureuses pour garantir la satisfaction de nos clients.
                    </p>
                </div>
            </div>
        </div>
       
    </div>
    <div class="spacer"></div>
</div>

@endsection
