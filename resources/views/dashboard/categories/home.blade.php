<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    {!! Session::get('notification','') !!}

    <div class="py-12">
        <div class="container">
            <div class="grid grid-flow-col auto-cols-auto">
                <div class="text-left py-10 px-10">
                    <label>Nouvelle categorie</label>
                        <br/>
                    <form method="POST" action="{{route('enregistrer_categorie_proprietes')}}">
                        <input type="text" name="nom_categorie" placeholder="Entrer le nom de la categorie"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" />
                        <br/><br/>
                        @csrf
                        <input type="submit" value="Enregistrer" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
                    </form>
                </div>

                <div class="col-md-6 block px-8 pt-6 pb-8 mb-4">
                    <table class="table table-bordered min-w-full bg-white border-separate border border-gray-800">
                        <thead class="bg-gray-800 text-white">
                            <th>Nom</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($liste_categorie as $item_categorie )
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">{{$item_categorie['nom']}}</td>

                                    <td class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">
                                        <a type="submit" class="btn btn-warning bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('editer_categorie_proprietes',[$item_categorie['id']] ) }} "> Modifier </a>

                                        <button class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2
                                                    px-4 rounded"
                                                onclick="ouvrir_ou_fermer({{$item_categorie->id}})">Supprimer</button>

                                        <div class="garde_fou py-2 px-4 text-center" id="garde_fou_{{$item_categorie->id}}" >
                                            <a class="bg-red-500 py-2 px-4" href="{{route('supprimer_categorie_proprietes',[$item_categorie['id']])}}" >Oui</a>
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
    </div>
</x-app-layout>

