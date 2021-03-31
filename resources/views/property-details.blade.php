@extends("partials.includes")
@include('fonctions-php')
@section("contenu")

    <!-- Begin content with sidebar -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 content">

                <section class="pgl-pro-detail pgl-bg-light">
                    <div class="flexslider">
                        <ul class="slides">
{{--                            {{ afficher_liste_des_images_en_mode_slider($la_propriete->listes_url_image,$la_propriete->prix,$la_propriete->categorie->nom) }}--}}

                            <li data-thumb='{{asset(chemin_de_dev($la_propriete->url_image))}}'>
                                <img src='{{asset(chemin_de_dev($la_propriete->url_image))}}' alt=''>
                                <span class='property-thumb-info-label'>";
                                        <?php
                                    try{
                                        $prix = number_format($la_propriete->prix,0,',',' ');
                                        echo "<span class='label price'>$prix FCFA</span>";
                                    }catch(Exception $e){
                                        echo "<span class='label price'>$la_propriete->prix</span>";
                                    }
                                    ?>
                                        <span class='label forrent'>{{$la_propriete->categorie->nom}}</span>
                                    </span>
                            </li>
                            <?php
                                $tableau_durl = explode('###',$la_propriete->listes_url_image);
                            ?>
                            @foreach ($tableau_durl as $item_chemin_de_prod)
                            <?php $chemin_dev = chemin_de_dev($item_chemin_de_prod); ?>

                              @if(!empty($chemin_dev))
                                <li data-thumb='{{asset(chemin_de_dev($chemin_dev))}}'>
                                    <img src='{{asset(chemin_de_dev($chemin_dev))}}' alt=''>
                                    <span class='property-thumb-info-label'>";
                                        <?php
                                            try{
                                                $prix = number_format($la_propriete->prix,0,',',' ');
                                                echo "<span class='label price'>$prix FCFA</span>";
                                            }catch(Exception $e){
                                                echo "<span class='label price'>$la_propriete->prix</span>";
                                            }
                                        ?>
                                        <span class='label forrent'>{{$la_propriete->categorie->nom}}</span>
                                    </span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="pgl-detail">
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="list-unstyled amenities amenities-detail">
                                    <li><strong>Type:</strong> {{$la_propriete->categorie->nom}}</li>
                                    <li><strong>Area:</strong> {{$la_propriete->superficie}}<sup>m2</sup></li>
                                    <li><address><i class="icons icon-location"></i> {{$la_propriete->adresse}}</address></li>
                                    <li><i class="icons icon-bedroom"></i> {{$la_propriete->chambres}} Chambres</li>
                                    <li><i class="icons icon-bathroom"></i> {{$la_propriete->douches}} Douches</li>
                                </ul>
                            </div>
                            <div class="col-sm-8">
                                <h2>{{$la_propriete->titre}}</h2>
                                <p><strong>{{$la_propriete->description_courte}}</strong></p>
                                <p>{{$la_propriete->description_longue}}</p>
                            </div>
                        </div>

                       @if(!empty($la_propriete->video))
                           <a target="_blank" href="<?=chemin_de_dev($la_propriete->video)?>"> Voir La video </a>
                       @endif
                    </div>
                </section>

            </div>
            <div class="col-md-3 sidebar">
                <!-- Begin Advanced Search -->
                <aside class="block pgl-advanced-search pgl-bg-light">
                    <h3>Recherche Avance</h3>
                    <form name="advancedsearch" method="POST" action="{{route('recherche_cibler')}}">
                        <div class="row">
                            <div class="col-xs-12">
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
                            {{--    <div class="col-xs-12">
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


                            <div class="col-xs-12">
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

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="sr-only" for="search-bedrooms">Nombre de chambre</label>
                                    <select id="search-bedrooms" name="chambres" data-placeholder="Bedrooms" class="chosen-select">
                                        <option selected="selected" value>Nombre de chambre</option>
                                        <option value="moins_de_3">moins de 3</option>
                                        <option value="plus_de_3">plus de 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
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
                            <div class="col-xs-12">
                                <div class="form-group">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-primary">Trouvez votre maison</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </aside>
                <!-- End Advanced Search -->
            </div>
        </div>
    </div>
    <!-- End content with sidebar -->

@endsection
