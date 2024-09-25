<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight basis-1/4">
                {{ __('Directeurs / Gestion') }}
            </h2>
            <div class="basis-1/6">
                <a class="bg-gray-800 text-white py-1 px-4 rounded" href="{{route('directeurs.create')}}">Nouvel enregistrement</a>
            </div>
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
                                    <th class="py-2 px-4 border">Prénom</th>
                                    <th class="py-2 px-4 border">Téléphone</th>
                                    <th class="py-2 px-4 border">Code</th>
                                    <th class="py-2 px-4 border">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($directeurs as $directeur)
                                    <tr class="hover:bg-gray-100 text-center">
                                        <td class="py-2 px-4 border"> {{$compteur++}} </td>
                                        <td class="py-2 px-4 border"> {{$directeur->nom}} </td>
                                        <td class="py-2 px-4 border">{{$directeur->prenom}}</td>
                                        <td class="py-2 px-4 border">{{$directeur->telephone}}</td>
                                        <td class="py-2 px-4 border">{{$directeur->code}}</td>
                                        <td class="py-2 px-4 border mt-4 text-center">
                                            <a class="bg-blue-500 text-white py-1 px-4 rounded" href="{{route('directeurs.edit', $directeur->id)}}">Modifier</a>
                                            <a class="bg-red-500 text-white py-1 px-4 rounded" href="{{route('directeurs.destroy', $directeur->id)}}" method="delete">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>