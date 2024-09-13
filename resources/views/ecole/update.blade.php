<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ecole / Update info') }}
        </h2>
    </x-slot>
    @include('ecole.form')
</x-app-layout>