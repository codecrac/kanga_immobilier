<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('proprietes') }}
        </h2>
    </x-slot>

    {!! Session::get('notification','') !!}

    <div class="py-12">
        <h2 class="text-left" style="font-size: 30px;font-weight:bold">Nouvelle propriete</h2>
        <div class="container">
            <form method="POST" action="{{route('enregistrer_proprietes')}}" enctype="multipart/form-data">
                    <div class="grid grid-flow-col md:auto-cols-auto">
                        <div class="col-md-6 px-10">
                                <select type="text" name="categorie_id" class="form-control border rounded w-full py-2 px-3 text-gray-700" >
                                    <option value > Choississez la categorie </option>
                                    @foreach($liste_des_categorie as $item_categorie)
                                        <option value="{{$item_categorie['id']}}"> {{$item_categorie['nom']}} </option>
                                    @endforeach
                                </select>
                                    <br/><br/>
                                <input type="text" name="titre" placeholder="Titre" class="form-control border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>
                                <input type="text" name="adresse" placeholder="Adresse" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>
                                <input type="text" name="superficie" placeholder="Superficie( en mettre carre)" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>
                                <input type="text" name="chambres" placeholder="Nombre de chambres" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>
                                <input type="text" name="douches" placeholder="Nombre de douches" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>
                                <input type="text" name="prix" placeholder="Prix" class="form-control  border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>
                        </div>
                        <div class="col-md-6 px-10">

                                <textarea type="text" name="description_courte" placeholder="Description courte" class="form-control border rounded w-full py-2 px-3 text-gray-700"></textarea>
                                    <br/><br/>
                                <textarea type="text" name="description_longue" placeholder="Description longue" class="form-control border rounded w-full py-2 px-3 text-gray-700" ></textarea>
                                    <br/><br/>

                                <label>Image pricipale</label><br/>
                                    <input type="file" name="url_image" class="form-control border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>

                                <label>Video</label><br/>
                                    <input type="file" name="video" class="form-control border rounded w-full py-2 px-3 text-gray-700" />
                                    <br/><br/>

                                <label>Gallerie d'images</label><br/>
                                <input type="file" multiple name="listes_url_image[]" class="form-control border rounded w-full py-2 px-3 text-gray-700" /><br/>
                        </div>
                    </div>
                    <div class="row text-center">
                        @csrf
                        <input type="submit" value="Enregistrer" class="btn btn-dark bg-green-800 text-white font-bold py-2 px-4" />
                    </div>
            </form>
        </div>

        <hr/>
        <hr/>
        <div class="container">
            <div class="row py-10">
                <table class="table table-bordered min-w-full bg-white border-separate border border-gray-800">
                    <thead class="bg-gray-800 text-white">
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Superficie</th>
                    <th>Adresse</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($liste_proprietes as $item_propriete )
                        <tr>
                            <td class="text-center w-1/5 text-left py-3 px-4 border border-gray-600">{{$item_propriete['titre']}}</td>
                            <td class="text-center w-1/5 text-left py-3 px-4 border border-gray-600">{{$item_propriete->categorie->nom}}</td>
                            <td class="text-center w-1/5 text-left py-3 px-4 border border-gray-600">{{$item_propriete['superficie']}}</td>
                            <td class="text-center w-1/5 text-left py-3 px-4 border border-gray-600">{{$item_propriete['adresse']}}</td>
                            <td class="text-center w-1/3 text-left py-3 px-4 border border-gray-600">
                                <a type="submit" class="btn btn-warning bg-blue-500 hover:bg-blue-700
                                    text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                   href="{{ route('editer_proprietes',[$item_propriete['id']] ) }} "> Modifier </a>

                                <button class="btn btn-danger bg-red-500 text-white font-bold py-2 px-4" onclick="ouvrir_ou_fermer({{$item_categorie->id}})">Supprimer</button>
                                <div  class="garde_fou py-2 px-4 text-center" id="garde_fou_{{$item_categorie->id}}" >
                                    <a class="bg-red-500 py-2 px-4" href="{{route('supprimer_proprietes',[$item_propriete['id']])}}" >Oui</a>
                                    <button class="text-white bg-gray-800 py-2 px-4" onclick="ouvrir_ou_fermer({{$item_categorie->id}})" >Non</button>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
