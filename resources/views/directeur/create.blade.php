<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chef d\'établissement') }}
        </h2>
    </x-slot>
    @include('directeur.form')
</x-app-layout>