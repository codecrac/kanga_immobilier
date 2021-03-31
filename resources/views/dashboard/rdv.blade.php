<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demandes de rendez vous') }}
        </h2>
    </x-slot>

    {!! Session::get('notification','') !!}

    <div class="py-12">
        <table class="min-w-full bg-white border-separate border border-gray-800">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Personne</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Objet</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Telephone</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Adresse</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Heure</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Statut</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($liste_rdv as $item_rdv)
                    <tr>
                        <td class="w-1/12 text-left py-3 px-4 border border-gray-600">{{$item_rdv->nom_complet}}</td>
                        <td class="w-1/12 text-left py-3 px-4 border border-gray-600">{{$item_rdv->objet}}</td>
                        <td class="w-1/10 text-left py-3 px-4 border border-gray-600">{{$item_rdv->telephone}}</td>
                        <td class="w-1/10 text-left py-3 px-4 border border-gray-600">{{$item_rdv->adresse}}</td>
                        <td class="w-1/10 text-left py-3 px-4 border border-gray-600">{{$item_rdv->date}}</td>
                        <td class="w-1/10 text-left py-3 px-4 border border-gray-600">{{$item_rdv->heure}}</td>

                        <td class="w-1/10 text-left py-3 px-4 border border-gray-600">
                            @if($item_rdv->statut =='attente')
                                <div class="py-2 px-2 text-white bg-yellow-600">{{$item_rdv->statut}}</div>
                            @elseif($item_rdv->statut =='effectuer')
                                <div class="py-2 px-2 text-white bg-green-900">{{$item_rdv->statut}}</div>
                            @elseif($item_rdv->statut =='annuler')
                                <div class="py-2 px-2 text-white bg-red-700">{{$item_rdv->statut}}</div>
                            @endif
                        </td>

                        <td class="w-1/2 text-left py-3 px-4 border border-gray-600">
                            @if($item_rdv->statut== "attente")
                                <button href="{{route('changer_statut_rdv',[$item_rdv->id,"effectuer"])}}"
                                    onclick="ouvrir_ou_fermer('statut_{{$item_rdv->id}}')"
                                   class="btn btn-succes bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-2 mx-4 rounded"
                                    >Effectuer</button>
                            <div class="container garde_fou bg-blue-400 px-2" id="garde_fou_statut_{{$item_rdv->id}}">
                                <div class="alert-danger text-center text-white px-2 py-2">Marquer comme effectuer</div>
                                <div class="row ">
                                    <a class="text-d bg-white py-2 px-4"  href="{{route('changer_statut_rdv',[$item_rdv->id,"effectuer"])}}" class="btn btn-succes">Oui</a>
                                    <button class="text-white bg-gray-800 py-2 px-4"  onclick="ouvrir_ou_fermer('statut_{{$item_rdv->id}}')">Non</button>
                                </div>
                            </div>

                                <button href="{{route('changer_statut_rdv',[$item_rdv->id,"annuler"])}}"
                                    onclick="ouvrir_ou_fermer('modif_{{$item_rdv->id}}')"
                                   class="btn btn-warning bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 my-2 mx-4 rounded"
                                        >Annuler</button>
                                <div class="container garde_fou bg-gray-700 px-2" id="garde_fou_modif_{{$item_rdv->id}}">
                                    <div class="alert-warning text-center text-white px-2 py-2">Le rendez a ete annuler</div>
                                    <div class="row ">
                                        <a class="text-d bg-white py-2 px-4" href="{{route('changer_statut_rdv',[$item_rdv->id,"annuler"])}}" class="btn btn-succes">Oui</a>
                                        <button class="text-white bg-gray-800 py-2 px-4"  onclick="ouvrir_ou_fermer('modif_{{$item_rdv->id}}')">Non</button>
                                    </div>
                                </div>
                            @endif

                            <button
                                onclick="ouvrir_ou_fermer('suppr_{{$item_rdv->id}}')"
                                class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 my-2 mx-4 rounded"
                            >Supprimer</button>

                                <div class="container garde_fou bg-red-300 px-2"  id="garde_fou_suppr_{{$item_rdv->id}}" >
                                    <div class="alert-danger px-2 py-2 text-center">Etes vous sur de vouloir supprimer ? </div>
                                    <div class="row ">
                                        <a class="text-d bg-white py-2 px-4" href="{{route('changer_statut_rdv',[$item_rdv->id,"supprimer"])}}" class="btn btn-succes">Oui</a>
                                        <button class="text-white bg-gray-800 py-2 px-4"  onclick="ouvrir_ou_fermer('suppr_{{$item_rdv->id}}')">Non</button>
                                    </div>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
