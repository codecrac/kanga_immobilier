@include('fonctions-php')
@extends("partials.includes")

@section("style_supplementaire")
    <style>
        .page-top{
            background: url("{{asset('template/images/slides/keys-large.jpg')}}");
        }
    </style>
@endsection

@section("contenu")

    <!-- Begin Main -->
    <div role="main" class="main pgl-bg-grey">
        <!-- Begin page top -->
        <section class="page-top">
            <div class="container">
                <div class="page-top-in">
                    <h2><span>{{$titre}}</span></h2>
                </div>
            </div>
        </section>
        <!-- End page top -->

        <!-- Begin Advanced Search -->
        {{--<section class="pgl-advanced-search pgl-bg-light">
            <div class="container">

                <form name="advancedsearch">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Statut de la Propriété</label>
                                <select id="property-status" name="property-status" data-placeholder="Statut de la Propriété" class="chosen-select">
                                    <option selected="selected" value="Property Status">Statut de la Propriété</option>
                                    <option value="sale">A vendre</option>
                                    <option value="rent">A louer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="Emplacement">Emplacement</label>
                                <select id="location" name="location" data-placeholder="Emplacement" class="chosen-select">
                                    <option selected="selected" value="Emplacement">Emplacement</option>
                                    <option value="United States">Cocody</option>
                                    <option value="United Kingdom">Yopougon</option>
                                    <option value="United Kingdom">Bingerville</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="search-bedrooms">Nombre de chambre</label>
                                <select id="search-bedrooms" name="search-bedrooms" data-placeholder="Bedrooms" class="chosen-select">
                                    <option selected="selected" value="Bedrooms">Nombre de chambre</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="5plus">5+</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="area-from">Taille en m2</label>
                                <select id="area-from" name="area-from" data-placeholder="Area From" class="chosen-select">
                                    <option selected="selected" value="Area From">Taille en m2</option>
                                    <option value="450">450</option>
                                    <option value="350">350</option>
                                    <option value="250">250</option>
                                    <option value="150">150</option>
                                    <option value="100">100</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <label class="sr-only" for="search-bathrooms">Nombre de douches</label>
                                <select id="search-bathrooms" name="search-bathrooms" data-placeholder="Bathrooms" class="chosen-select">
                                    <option selected="selected" value="Bathrooms">Nombre de douches</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4plus">4+</option>
                                </select>
                            </div>
                        </div>
                        <!--   <div class="col-xs-6 col-sm-3">
                               <div class="form-group">
                                   <div class="row pgl-narrow-row">
                                       <div class="col-xs-6">
                                           <label class="sr-only" for="search-minprice">Price From</label>
                                           <select id="search-minprice" name="search-minprice" data-placeholder="Price From" class="chosen-select">
                                               <option selected="selected" value="Price From">Price From</option>
                                               <option value="0">$0</option>
                                               <option value="25000">$25000</option>
                                               <option value="50000">$50000</option>
                                               <option value="75000">$75000</option>
                                               <option value="100000">$100000</option>
                                               <option value="150000">$150000</option>
                                               <option value="200000">$200000</option>
                                               <option value="300000">$300000</option>
                                               <option value="500000">$500000</option>
                                               <option value="750000">$750000</option>
                                               <option value="1000000">$1000000</option>
                                           </select>
                                       </div>
                                       <div class="col-xs-6">
                                           <label class="sr-only" for="search-maxprice">Price To</label>
                                           <select id="search-maxprice" name="search-maxprice" data-placeholder="Price To" class="chosen-select">
                                               <option selected="selected" value="Price To">Price To</option>
                                               <option value="25000">$25000</option>
                                               <option value="50000">$50000</option>
                                               <option value="75000">$75000</option>
                                               <option value="100000">$100000</option>
                                               <option value="150000">$150000</option>
                                               <option value="200000">$200000</option>
                                               <option value="300000">$300000</option>
                                               <option value="500000">$500000</option>
                                               <option value="750000">$750000</option>
                                               <option value="1000000">$1000000</option>
                                               <option value="1000000plus">>$1000000</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           -->
                        <div class="col-xs-6 col-sm-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Trouvez votre maison</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>--}}
        <!-- End Advanced Search -->

        <!-- Begin Properties -->
        <section class="pgl-properties pgl-bg-grey">
            <div class="container">
{{--                <h2>{{$titre}}</h2>--}}
                <div class="properties-full">
                    <div class="row">

                        @foreach($liste_propriete as $item_propriete)
                            <div class="col-xs-4 animation">
                            <div class="pgl-property">
                                <div class="property-thumb-info">
                                    <div class="property-thumb-info-image">
                                        <img alt="" class="img-responsive" src="{{asset(chemin_de_dev($item_propriete->url_image))}}">
                                        <span class="property-thumb-info-label">
                                            <?php
                                                try{
                                                    $prix = number_format($item_propriete->prix,0,',',' ');
                                                    echo "<span class='label price'>$prix FCFA</span>";
                                                }catch(Exception $e){
                                                    $prix =$item_propriete->prix;
                                                    echo "<span class='label price'>$prix</span>";
                                                }
                                            ?>
                                        <span class="label forrent">{{$item_propriete->categorie->nom}}</span>
                                        </span>
                                    </div>
                                    <div class="property-thumb-info-content">
                                        <h3><a href="{{route('property-details',[$item_propriete->id])}}">{{$item_propriete->titre}}</a></h3>
                                        <address>{{$item_propriete->adresse}}</address>
                                    </div>
                                    <div class="amenities clearfix">
                                        <ul class="pull-left">
                                            <li><strong>Superficie:</strong> {{$item_propriete->superficie}}<sup>m2</sup></li>
                                        </ul>
                                        <ul class="pull-right">
                                            <li><i class="icons icon-bedroom"></i> {{$item_propriete->chambres}}</li>
                                            <li><i class="icons icon-bathroom"></i> {{$item_propriete->douches}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                  {{--  <ul class="pagination">
                        <li class="active"><a href="template/#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="template/#">2</a></li>
                        <li><a href="template/#">3</a></li>
                        <li><a href="template/#">Next</a></li>
                    </ul>--}}
                </div>
            </div>
        </section>
        <!-- End Properties -->

    </div>
    <!-- End Main -->


@endsection
