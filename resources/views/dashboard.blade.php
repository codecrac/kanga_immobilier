<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kanga immobilier') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="container">
        <div class="grid grid-flow-col">
            <div class="bg-gray-800 m-5 p-10 rounded text-center text-white grid grid-flow-col  auto-cols-auto">
                <div>
                    <h1>Categories</h1>
                </div>
                <div>
                    <span class="bg-white p-5 text-gray-700 ronded">{{sizeof($liste_categorie)}}</span>
                </div>
            </div>
            <div class="bg-gray-800 m-5 p-10 rounded text-center text-white grid grid-flow-col  auto-cols-auto">
                <div>
                    <h1>Proprietes</h1>
                </div>
                <div>
                    <span class="bg-white p-5 text-gray-700 ronded">{{$nb_propriete}}</span>
                </div>
            </div>
            <div class="bg-gray-800 m-5 p-10 rounded text-center text-white grid grid-flow-col  auto-cols-auto">
                <div>
                    <h1>Rendez vous en Attente</h1>
                </div>
                <div>
                    <span class="bg-white p-5 text-gray-700 ronded"> {{$rdv_en_attente}} </span>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
