<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    {!! Session::get('notification','') !!}

    <div class="py-12">
        <div class="container">
            <div class="row  md:auto-cols-min">
                <div class="col-md-6 py-10 px-10 border">
                    <h3 style="">Modifiez la categorie</h3>
                    <form method="POST" action="{{route('modifier_categorie_proprietes')}}">
                        <input type="text" name="nom_categorie" value="{{$la_categorie['nom']}}"
                               class="form-control border rounded w-1/5 py-2 px-3 text-gray-700 leading-tight" />
                        <br/><br/>
                        @csrf
                        <input type="hidden" name="id_categorie" value="{{$la_categorie['id']}}" class="form-control" />
                        <input type="submit" value="Enregistrer" class="btn btn-dark bg-blue-400  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
