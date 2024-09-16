<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Année scolaire / Update info') }}
        </h2>
    </x-slot>
    @include('annee.form')
</x-app-layout>