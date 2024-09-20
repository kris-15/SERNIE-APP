<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Section / Update info') }}
        </h2>
    </x-slot>
    @include('section.form')
</x-app-layout>