<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xxl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __("Information de l'école") }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __($ecole->id ? "Modifier les informations":"Enregistrez une nouvelle école") }}
                        </p>
                    </header>
                
                    <form method="post" action="{{ $ecole->id ? route('ecoles.update', $ecole->id):route('ecoles.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method($ecole->id ? 'put':'post') 
                        <div class="mb-4">
                            <label for="denomination" class="block text-gray-700 text-sm font-bold mb-2">Dénomination de l'école</label>
                            <select id="denomination" name="denomination" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                <option></option>
                                <option value="ECOLE PRIMAIRE" @selected(old('denomination', $ecole->denomination)=="ECOLE PRIMAIRE")>ECOLE PRIMAIRE</option>
                                <option value="COLLEGE" @selected(old('denomination', $ecole->denomination)=="COLLEGE")>COLLEGE</option>
                                <option value="LYCEE" @selected(old('denomination', $ecole->denomination)=="LYCEE")>LYCEE</option>
                                <option value="INSTITUT" @selected(old('denomination', $ecole->denomination)=="INSTITUT")>INSTITUT</option>
                                <option value="COMPLEXE SCOLAIRE" @selected(old('denomination', $ecole->denomination)=="COMPLEXE SCOLAIRE")>COMPLEXE SCOLAIRE</option>
                                <option value="GROUPE SCOLAIRE" @selected(old('denomination', $ecole->denomination)=="GROUPE SCOLAIRE")>GROUPE SCOLAIRE</option>
                            </select>
                        </div>               
                        <div>
                            <x-input-label for="nom" :value="__('Nom de l\'ecole')" />
                            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $ecole->nom)" required autofocus autocomplete="nom" />
                            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type de l'école</label>
                            <select id="type" name="type" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                <option></option>
                                <option value="PUBLIC" @selected(old('type', $ecole->type)=="PUBLIC")>PUBLIQUE</option>
                                <option value="PRIVEE" @selected(old('type', $ecole->type)=="PRIVEE")>PRIVEE</option>
                            </select>
                        </div>
                        <div>
                            <x-input-label for="adresse" :value="__('Adresse de l\'ecole')" />
                            <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" :value="old('adresse', $ecole->adresse)" required autofocus autocomplete="adresse" />
                            <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
                        </div>
                        <div class="mb-4">
                            <label for="directeur_id" class="block text-gray-700 text-sm font-bold mb-2">Attachez le directeur de l'école</label>
                            <select id="directeur_id" name="directeur_id" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                <option></option>
                                @foreach ($directeurs as $directeur)
                                    <option value="{{$directeur->id}}" @selected(old('directeur_id', $directeur->id)=="$ecole->directeur_id")> {{strtoupper($directeur->nom.' '.$directeur->prenom)}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __($ecole->id?'Enregistrer les modifications':'Enregistrer') }}</x-primary-button>
                
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
