<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight basis-1/4">
                {{ __('Ecoles / Gestion') }}
            </h2>
            <div class="basis-1/6">
                <a class="bg-gray-800 text-white py-1 px-4 rounded" href="{{route('ecoles.create')}}">Nouvel enregistrement</a>
            </div>
        </div>
    </x-slot>
    @php
        $compteur = 1;
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xxl">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-2 px-4 border">#</th>
                                    <th class="py-2 px-4 border">Dénomination</th>
                                    <th class="py-2 px-4 border">Nom</th>
                                    <th class="py-2 px-4 border">Type</th>
                                    <th class="py-2 px-4 border">Chef d'établissement</th>
                                    <th class="py-2 px-4 border">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ecoles as $ecole)
                                    <tr class="hover:bg-gray-100 text-center">
                                        <td class="py-2 px-4 border"> {{$compteur++}} </td>
                                        <td class="py-2 px-4 border"> {{$ecole->denomination}} </td>
                                        <td class="py-2 px-4 border">{{$ecole->nom}}</td>
                                        <td class="py-2 px-4 border">{{$ecole->type}}</td>
                                        <td class="py-2 px-4 border">{{strtoupper($ecole->directeur->nom.' '.$ecole->directeur->prenom)}}</td>
                                        <td class="py-2 px-4 border mt-4 text-center">
                                            <a class="bg-blue-500 text-white py-1 px-4 rounded" href="{{route('ecoles.edit', $ecole->id)}}">Modifier</a>
                                            <a class="bg-red-500 text-white py-1 px-4 rounded" href="{{route('ecoles.show', $ecole->id)}}">Voir +</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <p class="text-red-500 text-center">Aucune école enregistrée</p>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>