<x-guest-layout>
    
    <form method="POST" action="{{ route('user.search') }}">
        @csrf
        <x-input-error :messages="$errors->get('valeur')" class="mt-2" />
        @if (session('error') != null)
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 5000)"
                class="text-sm text-red-600 text-center font-bold"
            >{{ __(session('error')) }}</p>
        @endif
        <div class="mb-4">
            <label for="champ" class="block text-gray-700 text-sm font-bold mb-2">Cherchez l'élève par :</label>
            <select id="champ" name="champ" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full" onchange="toggleNomField()">
                <option></option>
                <option value="nom">NOM</option>
                <option value="postnom">POSTNOM</option>
                <option value="prenom">PRENOM</option>
            </select>
        </div>
        <div id="valeur" style="display: none;">
            <x-input-label for="valeur" :value="__('Tapez ici')" />
            <x-text-input id="valeur" class="block mt-1 w-full" type="text" name="valeur" :value="old('valeur')" required/>
            <x-input-error :messages="$errors->get('valeur')" class="mt-2" />
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-3">
                {{ __('Rechercher') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function toggleNomField(){
            const champSelect = document.getElementById('champ');
            const valeur = document.getElementById('valeur');
            
            if(champSelect.value == "nom" || champSelect.value == "postnom" || champSelect.value == "prenom"){
                valeur.style.display = "block";
            }else{
                valeur.style.display = 'none';
            }
        }
        document.addEventListener('DOMContentLoaded', toggleNomField)
    </script>
</x-guest-layout>