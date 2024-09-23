<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elève') }}
        </h2>
    </x-slot>
    @include('eleve.form')
</x-app-layout>