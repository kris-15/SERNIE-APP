<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight basis-1/3">
                {{ __($ecole->denomination.' '.$ecole->nom.' / Liste des élèves') }}
            </h2>
        </div>
    </x-slot>
    @php
        $compteur = 1;
    @endphp
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xxl">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-2 px-4 border">#</th>
                                    <th class="py-2 px-4 border">Nom</th>
                                    <th class="py-2 px-4 border">Post-nom</th>
                                    <th class="py-2 px-4 border">Prenom</th>
                                    <th class="py-2 px-4 border">Sexe</th>
                                    <th class="py-2 px-4 border">Matricule</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($eleves as $eleve)
                                    <tr class="hover:bg-gray-100 text-center">
                                        <td class="py-2 px-4 border"> {{$compteur++}} </td>
                                        <td class="py-2 px-4 border"> {{$eleve->eleves->nom}} </td>
                                        <td class="py-2 px-4 border">{{$eleve->eleves->postnom}}</td>
                                        <td class="py-2 px-4 border">{{$eleve->eleves->prenom}}</td>
                                        <td class="py-2 px-4 border">{{strtoupper($eleve->eleves->sexe)}}</td>
                                        <td class="py-2 px-4 border">{{strtoupper($eleve->eleves->matricule)}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <p class="text-red-500 text-center">Aucune élève enregistré pour cette classe</p>
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