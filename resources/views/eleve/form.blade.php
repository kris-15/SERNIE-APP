<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xxl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __("Information de l'élève") }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __($eleve->id ? "Modifier les informations":"Enregistrez un nouvel élève") }}
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
                
                    <form method="post" action="{{ $eleve->id ? route('eleves.update', $eleve->id):route('eleves.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method($eleve->id ? 'put':'post') 
                        <div class="mb-4">
                            <label for="classe_id" class="block text-gray-700 text-sm font-bold mb-2">Choisir la classe</label>
                            <select id="classe_id" name="classe_id" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                <option></option>
                                @foreach ($classes as $classe)
                                    <option value="{{$classe->id}}" @selected(old('classe_id', $classe->id)=="$eleve->classe_id")> {{strtoupper($classe->salle.' '.$classe->cycle .' '.$classe->section->nom??"")}} </option>
                                @endforeach
                            </select>
                        </div>              
                        <div>
                            <x-input-label for="nom" :value="__('Nom de l\'élève')" />
                            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $eleve->nom)" required  />
                            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                        </div>
                        <div>
                            <x-input-label for="postnom" :value="__('Post-nom de l\'élève')" />
                            <x-text-input id="postnom" name="postnom" type="text" class="mt-1 block w-full" :value="old('postnom', $eleve->postnom)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('postnom')" />
                        </div>
                        <div>
                            <x-input-label for="prenom" :value="__('Prenom de l\'élève')" />
                            <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $eleve->prenom)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                        </div>
                        <div class="mb-4">
                            <label for="sexe" class="block text-gray-700 text-sm font-bold mb-2">Sexe</label>
                            <select id="sexe" name="sexe" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                <option></option>
                                <option value="MASCULIN" @selected(old('sexe', $eleve->sexe)=="MASCULIN")>MASCULIN</option>
                                <option value="FEMININ" @selected(old('sexe', $eleve->sexe)=="FEMININ")>FEMININ</option>
                            </select>
                        </div>
                        <div>
                            <x-input-label for="lieu" :value="__('Lieu de naissance de l\'élève')" />
                            <x-text-input id="lieu" name="lieu" type="text" class="mt-1 block w-full" :value="old('lieu', $eleve->lieu)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('lieu')" />
                        </div>
                        <div>
                            <x-input-label for="date_naissance" :value="__('Date de naissance de l\'élève')" />
                            <x-text-input id="date_naissance" name="date_naissance" type="date" class="mt-1 block w-full" :value="old('date_naissance', $eleve->date_naissance)" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('date_naissance')" />
                        </div>
                        <div>
                            <x-input-label for="adresse" :value="__('Adresse de l\'élève')" />
                            <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" :value="old('adresse', $eleve->adresse)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
                        </div>
                        <div>
                            <x-input-label for="matricule" :value="__('Matricule de l\'élève')" />
                            <x-text-input id="matricule" name="matricule" type="text" class="mt-1 block w-full" :value="old('matricule', $eleve->matricule)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('matricule')" />
                        </div>
                        <input type="hidden" name="annee_scolaire_id" value="1">
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __($eleve->id?'Enregistrer les modifications':'Enregistrer') }}</x-primary-button>
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
