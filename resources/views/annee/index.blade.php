<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight basis-1/4">
                {{ __('Année Scolaire / Gestion') }}
            </h2>
            <div class="basis-1/6">
                <a class="bg-gray-800 text-white py-1 px-4 rounded" href="{{route('annees.create')}}">Nouvel enregistrement</a>
            </div>
        </div>
    </x-slot>
    @php
        $compteur = 1;
        $classe = "";
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
                                    <th class="py-2 px-4 border">Date début</th>
                                    <th class="py-2 px-4 border">Date fin</th>
                                    <th class="py-2 px-4 border">Statut</th>
                                    <th class="py-2 px-4 border">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anneeScolaires as $anneeScolaire)
                                    <tr class="hover:bg-gray-100 text-center">
                                        <td class="py-2 px-4 border"> {{$compteur++}} </td>
                                        <td class="py-2 px-4 border"> {{$anneeScolaire->debut}} </td>
                                        <td class="py-2 px-4 border">{{$anneeScolaire->fin}}</td>
                                        @php
                                            if($anneeScolaire->statut == "FERME")
                                                $classe = "red";
                                            if($anneeScolaire->statut == "OUVERT")
                                                $classe = "green";
                                            if($anneeScolaire->statut == "DESACTIVE")
                                                $classe = "yellow";
                                        @endphp
                                        <td class="py-2 px-4 border text-{{$classe}}-600">{{$anneeScolaire->statut}}</td>
                                        <td class="py-2 px-4 border mt-4 text-center">
                                            <a class="bg-blue-500 text-white py-1 px-4 rounded" href="{{route('annees.edit', $anneeScolaire->id)}}">Modifier</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <p class="text-red-500 text-center">Aucune année scolaire enregistrée</p>
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