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
    function afficher_liste_des_images($chaine_de_liste_durl,$id_propriete){
        $tableau_durl = explode('###',$chaine_de_liste_durl);
        foreach ($tableau_durl as $item_chemin_de_prod){
            $chemin_dev = chemin_de_dev($item_chemin_de_prod);

            $route_effacer = route('effacer_photo_de_la_galerie',[$id_propriete]);
            if(!empty($chemin_dev)){
                echo "<div class=\"col-md-3 p-5\">
                        <a target='_blank' href='$chemin_dev'> <img src='$chemin_dev' width='100px' /> </a>
                        <div class='container text-center'>
                            <a href='$route_effacer?photo_a_effacer=$item_chemin_de_prod'> <b>x</b> </a>
                        </div>
                    </div>
                 ";
            }
        }
    }
    function afficher_liste_des_images_effacer_un_un($chaine_de_liste_durl,$id_propriete){
        $tableau_durl = explode('###',$chaine_de_liste_durl);
        foreach ($tableau_durl as $item_chemin_de_prod){
            $chemin_dev = chemin_de_dev($item_chemin_de_prod);

            $route_effacer = route('effacer_photo_de_la_galerie',[$id_propriete]);
            if(!empty($chemin_dev)){
                echo "<div class=\"col-md-3\">
                        <a target='_blank' href='$chemin_dev'> <img src='$chemin_dev' width='100px' /> </a>
                        <a href='$route_effacer?effacer=$item_chemin_de_prod'> <h3>x</h3> </a>
                        <input type='checkbox' name='photo_a_effacer[]' value='$item_chemin_de_prod'>
                    </div>
                 ";
            }
        }
    }
?>

{{--<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>--}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    {!! Session::get('notification','') !!}

    <div class="py-12">
        <div class="container">
            <h1  style="font-size: 30px;font-weight:bold">Editer propriete</h1>
            <form method="POST" action="{{route('modifier_proprietes')}}" enctype="multipart/form-data">
                <div class="row grid grid-flow-col md:auto-cols-auto">
                    <div class="col-md-6 px-10 py-10">
                        <select type="text" name="categorie_id" class="form-control  border rounded w-full py-2 px-3 text-gray-700" >
                            <option value="{{$la_propriete->categorie->id}}" > {{$la_propriete->categorie->nom}}</option>
                            @foreach($liste_des_categorie as $item_categorie)
                                <option value="{{$item_categorie['id']}}"> {{$item_categorie['nom']}} </option>
                            @endforeach
                        </select>
                        <br/><br/>
                        <input type="text" name="titre" placeholder="Titre" value="{{$la_propriete->titre}}" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                        <br/><br/>
                        <input type="text" name="adresse" placeholder="Adresse" value="{{$la_propriete->adresse}}" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                        <br/><br/>
                        <input type="text" name="superficie" placeholder="Superficie( en mettre carre)" value="{{$la_propriete->superficie}}" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                        <br/><br/>
                        <input type="text" name="chambres" placeholder="Nombre de chambres" value="{{$la_propriete->chambres}}" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                        <br/><br/>
                        <input type="text" name="douches" placeholder="Nombre de douches" value="{{$la_propriete->douches}}" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                        <br/><br/>
                        <input type="text" name="prix" placeholder="Prix" value="{{$la_propriete->prix}}" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                        <br/><br/>
                    </div>
                    <div class="col-md-6 px-10 py-10">

                        <textarea type="text" name="description_courte" placeholder="Description courte" class="form-control  border rounded w-full py-2 px-3 text-gray-700">{{$la_propriete->description_courte}}</textarea>
                        <br/><br/>
                        <textarea type="text" name="description_longue" placeholder="Description longue" class="form-control border rounded w-full py-2 px-3 text-gray-700" >{{$la_propriete->description_longue}}</textarea>
                        <br/><br/>

                        <label>Image pricipale</label><br/>
                        @if(!empty($la_propriete->url_image))
                            <img src="<?=chemin_de_dev($la_propriete->url_image)?>" width="100px">
                        @endif
                        <input type="file" name="url_image" class="form-control  border rounded w-full py-2 px-3 text-gray-700" /><br/>

                        <label>Video</label><br/>
                        @if(!empty($la_propriete->video))
                            <a target="_blank" href="<?=chemin_de_dev($la_propriete->video)?>" style="color: blue;text-decoration: underline">Voir la video</a><br/>
                        @endif
                        <input type="file" name="video" class="form-control  border rounded w-full py-2 px-3 text-gray-700" /><br/>

                        <label>Ajouter à la Gallerie</label><br/>

                        @if(!empty($la_propriete->listes_url_image))
                            <div class="container">
                                {{--                                <form method="POST" action="{{route('effacer_photo_de_la_galerie',[$la_propriete->id])}}">--}}
                                <div class="grid grid-flow-col md:auto-cols-max">
                                    <?= afficher_liste_des_images($la_propriete->listes_url_image,$la_propriete->id); ?>
                                </div>
                                {{--                                    @csrf--}}
                                {{--                                    <input type="submit" value="Effacer de la galerie">--}}
                                {{--                                </form>--}}
                            </div>
                        @endif
                        <input type="hidden" multiple name="id_propriete" value="{{$la_propriete->id}}" class=" border rounded w-full py-2 px-3 text-gray-700" /><br/>
                        <input type="file" multiple name="listes_url_image[]" class="form-control  border rounded w-full py-2 px-3 text-gray-700"  /><br/>
                    </div>
                </div>

                <div class="row text-center">
                    @csrf
                    <input type="submit" value="Enregistrer" class="btn btn-dark bg-green-800 text-white font-bold py-2 px-4" />
                </div>
            </form>

          {{--  <h3>Retirer des images</h3>
            <form method="POST" action="{{route('effacer_photo_de_la_galerie',[$la_propriete->id])}}">
                @if(!empty($la_propriete->listes_url_image))
                    <div class="container">
                        --}}{{--                                <form method="POST" action="{{route('effacer_photo_de_la_galerie',[$la_propriete->id])}}">--}}{{--
                        <div class="grid grid-flow-col md:auto-cols-max px-10">
                            <?= afficher_liste_des_images_effacer_un_un($la_propriete->listes_url_image,$la_propriete->id); ?>
                        </div>
                        @csrf
                        <input type="submit" value="Effacer de la galerie">

                    </div>
                @endif
            </form>--}}
        </div>
    </div>
</x-app-layout>

