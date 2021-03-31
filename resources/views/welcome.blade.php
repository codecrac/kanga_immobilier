<?php
function chemin_de_dev($chemin_de_prod){
    $chemin_de_dev = explode('public/',$chemin_de_prod);
    if(isset($chemin_de_dev[1])){
        $chemin_de_dev = $chemin_de_dev[0].$chemin_de_dev[1];
    }else{
        $chemin_de_dev = $chemin_de_dev[0];
    }
    return $chemin_de_dev;
}
?>

@extends("partials.includes")
@section("contenu")
    <!-- Begin Main -->
    <div role="main" class="main">
        <!-- Begin Main Slide -->
        <section class="main-slide">
            <div id="owl-main-slide" class="owl-carousel pgl-main-slide" data-plugin-options='{"autoPlay": true}'>

                <div class="item" id="item3"><img src="template/images/slides/keys-large.jpg" alt="Photo" class="img-responsive">
                    <div class="item-caption">
                        <div class="container">
                            <div class="property-info">
                                <div class="property-thumb-info-content">
                                    <h2>KANGA IMMOBILIER</h2>
                                    <p>Entreprise leader dans le domaine immobilier, laissez nous vous apporter
                                        la satisfaction de trouvé un logement confortable sans le stress qui va avec...</p>
                                    <p class="text-center"> <a href="#proprietes"> Voir les logements</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" id="item1"><img src="template/images/slides/trust.jpg" alt="Photo" class="img-responsive">
                    <div class="item-caption">
                        <div class="container">
                            <div class="property-info">
                                <div class="property-thumb-info-content">
                                    <h2>PARTENAIRE DE CONFIANCE</h2>
                                    <p>Notre image dépend totalement du retour d'experience de nos clients et
                                        73% de nos clients nous viennent sur recommandations,vous aussi faites nous confiance .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Main Slide -->

        <!-- Begin Advanced Search -->
        <section class="pgl-advanced-search pgl-bg-light">
            <div class="container">
                <form name="advancedsearch" method="POST" action="{{route('recherche_cibler')}}">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Statut de la Propriété</label>
                                <select id="property-status" name="categorie_id" data-placeholder="Statut de la Propriété" class="chosen-select">
                                    <option selected="selected" value="Property Status">Statut de la Propriété</option>
                                    @foreach($liste_categorie as $item_categorie)
                                        <option value="{{$item_categorie->id}}">{{$item_categorie->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    {{--    <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="Emplacement">Emplacement</label>
                                <select id="location" name="location" data-placeholder="Emplacement" class="chosen-select">
                                    <option selected="selected" value="Emplacement">Emplacement</option>
                                    <option value="United States">Cocody</option>
                                    <option value="United Kingdom">Yopougon</option>
                                    <option value="United Kingdom">Bingerville</option>
                                </select>
                            </div>
                        </div>--}}


                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="area-from">Taille en m2</label>
                                <select id="area-from" name="superficie" data-placeholder="Area From" class="chosen-select">
                                    <option selected="selected" value="Area From">Taille en m2</option>
                                    <option value="moins_de_100">moins de 100</option>
                                    <option value="100_a_300">100 à 300</option>
                                    <option value="plus_de_300">plus de 300</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="search-bedrooms">Nombre de chambre</label>
                                <select id="search-bedrooms" name="chambres" data-placeholder="Bedrooms" class="chosen-select">
                                    <option selected="selected" value>Nombre de chambre</option>
                                    <option value="moins_de_3">moins de 3</option>
                                    <option value="plus_de_3">plus de 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="search-bathrooms">Nombre de douches</label>
                                <select id="search-bathrooms" name="douches" data-placeholder="Bathrooms" class="chosen-select">
                                    <option selected="selected">Nombre de douches</option>
                                    <option value="moins_de_3">moins de 3</option>
                                    <option value="plus_de_3">plus de 3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary">Trouvez votre maison</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        <!-- End Advanced Search -->

        <!-- Begin Featured -->
        {{--
        <section class="pgl-featured pgl-bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 animation">
                        <div class="pgl-property featured-item">
                            <div class="property-thumb-info">
                                <div class="property-thumb-info-image">
                                    <img alt="" class="img-responsive" src="template/images/properties/property-featured-1.jpg">
                                </div>
                                <div class="property-thumb-info-content">
                                    <h3><a href="#">Yopougon,4 chambre salon | A louer</a></h3>
                                    <p>340 000 FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 animation">
                        <div class="pgl-property featured-item">
                            <div class="property-thumb-info">
                                <div class="property-thumb-info-image">
                                    <img alt="" class="img-responsive" src="template/images/properties/property-featured-2.jpg">
                                </div>
                                <div class="property-thumb-info-content">
                                    <h3><a href="#">Yopougon,4 chambre salon | A vendre</a></h3>
                                    <p>13 400 000 FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 animation">
                        <div class="pgl-property featured-item">
                            <div class="property-thumb-info">
                                <div class="property-thumb-info-image">
                                    <img alt="" class="img-responsive" src="template/images/properties/property-featured-3.jpg">
                                </div>
                                <div class="property-thumb-info-content">
                                    <h3><a href="template/property-detail.html">Cocody,2 chambre salon | A louer</a></h3>
                                    <p>140 000 FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 animation">
                        <div class="pgl-property featured-item">
                            <div class="property-thumb-info">
                                <div class="property-thumb-info-image">
                                    <img alt="" class="img-responsive" src="template/images/properties/property-featured-4.jpg">
                                </div>
                                <div class="property-thumb-info-content">
                                    <h3><a href="template/property-detail.html">Cocody ,1 chambre salon | A louer</a></h3>
                                    <p>40 000 FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 animation">
                        <div class="pgl-property featured-item">
                            <div class="property-thumb-info">
                                <div class="property-thumb-info-image">
                                    <img alt="" class="img-responsive" src="template/images/properties/property-featured-5.jpg">
                                </div>
                                <div class="property-thumb-info-content">
                                    <h3><a href="template/property-detail.html">Cocody, 2 chambre salon | A louer</a></h3>
                                    <p>180 000 FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="top-tall">
            </div>
        </section>
        --}}

        <!-- End Featured -->

        <!-- Begin Properties -->
        <section class="pgl-properties pgl-bg-grey" id="proprietes">
            <div class="container">
                <h2>Proprietes</h2>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs pgl-pro-tabs text-center animation" role="tablist">
                    <li class="active"><a href="#all" role="tab" data-toggle="tab">Toutes</a></li>
                    @foreach($liste_categorie as $item_categorie)
                        <li><a href="{{route('properties',[$item_categorie->id])}}">{{$item_categorie->nom}}</a></li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="all">
                        <div class="row">
                            @foreach($six_derniere_propriete as $item_propriete)
                                <div class="col-xs-4 animation">
                                <div class="pgl-property">
                                    <div class="property-thumb-info">
                                        <div class="property-thumb-info-image">
                                            <img alt="" class="img-responsive" src="{{chemin_de_dev(asset($item_propriete->url_image))}}">
                                            <span class="property-thumb-info-label">
                                                        <span class="label price">$3 580 000</span>
                                                        <span class="label forrent">{{$item_propriete->categorie->nom}}</span>
                                                    </span>
                                        </div>
                                        <div class="property-thumb-info-content">
                                            <h3><a href="{{route('property-details',[$item_propriete->id])}}">{{$item_propriete->titre}}</a></h3>
                                            <address>{{$item_propriete->adresse}}</address>
                                        </div>
                                        <div class="amenities clearfix">
                                            <ul class="pull-left">
                                                <li><strong>Area:</strong> {{$item_propriete->superficie}}<sup>m2</sup></li>
                                            </ul>
                                            <ul class="pull-right">
                                                @if($item_propriete->chambres >0)
                                                    <li><i class="icons icon-bedroom"></i> {{$item_propriete->chambres}}</li>
                                                @endif
                                                @if($item_propriete->douches >0)
                                                    <li><i class="icons icon-bathroom"></i> {{$item_propriete->douches}}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="vendre">
                        <div class="row">
                            <div class="col-xs-4 animation">
                                <div class="pgl-property">
                                    <div class="property-thumb-info">
                                        <div class="property-thumb-info-image">
                                            <img alt="" class="img-responsive" src="template/images/properties/property-4.jpg">
                                            <span class="property-thumb-info-label">
													<span class="label price">$3 580 000</span>
													<span class="label forrent">A vendre</span>
												</span>
                                        </div>
                                        <div class="property-thumb-info-content">
                                            <h3><a href="template/property-detail.html">Villa 2 pieces</a></h3>
                                            <address>Yopougon</address>
                                        </div>
                                        <div class="amenities clearfix">
                                            <ul class="pull-left">
                                                <li><strong>Area:</strong> 450<sup>m2</sup></li>
                                            </ul>
                                            <ul class="pull-right">
                                                <li><i class="icons icon-bedroom"></i> 3</li>
                                                <li><i class="icons icon-bathroom"></i> 2</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="louer">
                        <div class="row">
                            <div class="col-xs-4 animation">
                                <div class="pgl-property">
                                    <div class="property-thumb-info">
                                        <div class="property-thumb-info-image">
                                            <img alt="" class="img-responsive" src="template/images/properties/property-4.jpg">
                                            <span class="property-thumb-info-label">
													<span class="label price">35 000</span>
													<span class="label forrent">A louer</span>
												</span>
                                        </div>
                                        <div class="property-thumb-info-content">
                                            <h3><a href="template/property-detail.html">Studio americain</a></h3>
                                            <address>Angre</address>
                                        </div>
                                        <div class="amenities clearfix">
                                            <ul class="pull-left">
                                                <li><strong>Area:</strong> 50<sup>m2</sup></li>
                                            </ul>
                                            <ul class="pull-right">
                                                <li><i class="icons icon-bedroom"></i> 1</li>
                                                <li><i class="icons icon-bathroom"></i> 1 </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="terrain">
                        <div class="row">
                            <div class="col-xs-4 animation">
                                <div class="pgl-property">
                                    <div class="property-thumb-info">
                                        <div class="property-thumb-info-image">
                                            <img alt="" class="img-responsive" src="template/images/properties/property-4.jpg">
                                            <span class="property-thumb-info-label">
													<span class="label price">8 500 000</span>
													<span class="label forrent">A vendre</span>
												</span>
                                        </div>
                                        <div class="property-thumb-info-content">
                                            <h3><a href="template/property-detail.html">Terrain 700 m2</a></h3>
                                            <address>Agboville</address>
                                        </div>
                                        <div class="amenities clearfix">
                                            <ul class="pull-left">
                                                <li><strong>Area:</strong> 700<sup>m2</sup></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Properties -->

        <!-- Begin About -->
        <section class="pgl-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 animation about-item">
                        <h3>Qui Sommes Nous</h3>
                        <p><img src="template/images/content/question.png" alt="" class="img-responsive"></p>
                        <p>KANGA IMMOBILIER est une Société à Responsabilité Limitée créée pour répondre à un besoin exprimé par un marché ivoirien en pleine mutation : celui d’offrir aux entreprises et aux particuliers des solutions sur mesure adaptés à leurs besoins.</p>
                        <a href="{{route("about")}}" class="btn btn-lg btn-default">En savoir plus</a>
                    </div>
                    <div class="col-md-4 animation about-item">
                        <h3>Pourquoi Nous</h3>
                        <div class="panel-group" id="accordion">

                            <div class="panel panel-default pgl-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Des Experts</a> </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>L’agence compte au sein de ses effectifs des architectes rompus à leur art, des techniciens et spécialistes du bâtiment, du lotissement, du génie civil, de la gestion et de l’expertise immobilières.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default pgl-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">Une entreprise internationale</a> </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body"> <p>Grâce à notre expertise,Nous intervenons en Côte d’Ivoire et à l’étranger sur des projets de toutes échelles.</p> </div>
                                </div>
                            </div>

                            <div class="panel panel-default pgl-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">Soucieuse</a> </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>La sensibilité de l’agence aux questions environnementales, culturelles et sociales fait de ses projets des modèles d’intégration et de valorisation</p>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="panel panel-default pgl-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="template/#collapseFouth" class="collapsed">Bootstrap Compatible</a> </h4>
                                </div>
                                <div id="collapseFouth" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default pgl-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="template/#collapseFive" class="collapsed">Unique Design</a> </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                    <div class="col-md-4 animation about-item">
                        {{--                        <h3>Notre equipe</h3>--}}
                        <div class="owl-carousel pgl-bg-dark pgl-testimonial" data-plugin-options='{"items": 1, "pagination": false, "autoHeight": true}'>

                            <div class="col-md-12">
                                <div class="testimonial-author">
                                    {{--<div class="img-thumbnail-small img-circle">
                                        <img src="template/images/logo.png" class="img-circle" alt="KANGA IMMOBILIER">
                                    </div>--}}
                                    <h4>KANGA IMMOBILIER</h4>
                                    {{--                                    <p><strong>Selller</strong></p>--}}
                                </div>
                                <div class="divider-quote-sign"><span>“</span></div>

                                <blockquote class="testimonial">
                                    <p>La maison est le point de départ de l'amour, de l'espoir et des rêves</p>
                                </blockquote>
                                <br/>
                                <blockquote class="testimonial">
                                    <p>Il n'y a rien de plus important qu'une maison de qualité, sûre et sécurisée</p>
                                </blockquote>
                                <br/>
                                <blockquote class="testimonial">
                                    <p>Ce qui est magique à la maison, c'est que ça fait du bien de partir, et c'est encore mieux de revenir</p>
                                </blockquote>
                            </div>
                            {{--<div class="col-md-12">
                                <div class="testimonial-author">
                                    <div class="img-thumbnail-small img-circle">
                                        <img src="template/images/agents/agent-1.jpg" class="img-circle" alt="Andrew MCCarthy">
                                    </div>
                                    <h4>Andrew MCCarthy</h4>
                                    <p><strong>Selller</strong></p>
                                </div>
                                <div class="divider-quote-sign"><span>“</span></div>
                                <blockquote class="testimonial">
                                    <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium totam rem.</p>
                                </blockquote>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About -->

    </div>
    <!-- End Main -->
@endsection
