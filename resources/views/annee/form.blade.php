<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xxl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __("Information de l'année scolaire") }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __($anneeScolaire->id ? "Modifier les informations":"Enregistrez une nouvelle année scolaire") }}
                        </p>
                        @if (session('error') != null)
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 5000)"
                                class="text-sm text-red-600"
                            >{{ __(session('error')) }}</p>
                        @endif
                    </header>
                    <form method="post" action="{{ $anneeScolaire->id ? route('annees.update', $anneeScolaire->id):route('annees.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method($anneeScolaire->id ? 'put':'post') 
                        <div class="mb-4">
                            <label for="statut" class="block text-gray-700 text-sm font-bold mb-2">Statut de l'année</label>
                            <select id="statut" name="statut" autofocus class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                <option value="DESACTIVE" @selected(old('statut', $anneeScolaire->statut)=="DESACTIVE")></option>
                                <option value="OUVERT" @selected(old('statut', $anneeScolaire->statut)=="OUVERT")>OUVERT</option>
                                <option value="FERME" @selected(old('statut', $anneeScolaire->statut)=="FERME")>FERME</option>
                            </select>
                        </div>               
                        <div>
                            <x-input-label for="debut" :value="__('Date début')" />
                            <x-text-input id="debut" name="debut" type="date" class="mt-1 block w-full" :value="old('debut', $anneeScolaire->debut)" required autocomplete="debut" />
                            <x-input-error class="mt-2" :messages="$errors->get('debut')" />
                        </div>
                        <div>
                            <x-input-label for="fin" :value="__('Date fin')" />
                            <x-text-input id="fin" name="fin" type="date" class="mt-1 block w-full" :value="old('fin', $anneeScolaire->fin)" required autocomplete="fin" />
                            <x-input-error class="mt-2" :messages="$errors->get('fin')" />
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __($anneeScolaire->id?'Enregistrer les modifications':'Enregistrer') }}</x-primary-button>
                
                            @if (session('success') != null)
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600"
                                >{{ __(session('success')) }}</p>
                            @endif
                        </div>
                    </form>
                </section>                    
            </div>
        </div>
    </div>
</div>
