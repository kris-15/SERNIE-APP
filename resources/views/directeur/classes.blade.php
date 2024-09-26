<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight basis-1/4">
                {{ __('Ecoles / Gestion des classes') }}
            </h2>
            <div class="basis-1/6">
                <a class="bg-gray-800 text-white py-1 px-4 rounded" href="{{route('classes.create')}}">Ajouter une classe</a>
            </div>
        </div>
    </x-slot>
    @php
        $compteur = 1;
    @endphp
    
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($classes as $classe)
            <div class="bg-white rounded-lg shadow p-4 flex items-center">
                <span class="bg-teal-500 text-white rounded-full p-2 mr-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16z" />
                    </svg>
                </span>
                <div>
                    <h3 class="font-bold text-lg">{{$classe->salle.' - '.$classe->indice}}</h3>
                    <p class="mt-2 text-gray-600 text-sm">Cycle : {{$classe->cycle}} </p>
                    <p class="mt-2 text-gray-600 text-sm">Section : {{ $classe->section->nom ?? "N/D."}} </p>
                    <p class="mt-2 text-gray-600 text-sm"><a href="{{route('directeur.classe.eleve', $classe->id)}}" class="font-style-italic">Voir les élèves </a> </p>
                </div>
            </div>
        @empty
            <div class="text-center">
                <p class="bg-white rounded-lg shadow p-4 m-12 text-red-600">Aucune classe enregistrée</p>
            </div>
        @endforelse
    </div>
</x-app-layout>