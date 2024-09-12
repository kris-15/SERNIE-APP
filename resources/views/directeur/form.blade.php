<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xxl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Information directeur') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __($directeur ? "Modifier les informations":"Enregistrez un nouveau directeur") }}
                        </p>
                    </header>
                
                    <form method="post" action="{{ $directeur->id ? route('directeurs.update', $directeur->id):route('directeurs.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method($directeur->id ? 'put':'post')
                        <x-text-input id="code" name="code" type="hidden" class="mt-1 block w-full" :value=" $directeur->id ?  $directeur->code : strtoupper(\Illuminate\Support\Str::random(6))"/>
                
                        <div>
                            <x-input-label for="nom" :value="__('Nom du directeur')" />
                            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $directeur->nom)" required autofocus autocomplete="nom" />
                            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                        </div>
                        <div>
                            <x-input-label for="prenom" :value="__('Prénom du directeur')" />
                            <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $directeur->prenom)" required autofocus autocomplete="prenom" />
                            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                        </div>
                        <div>
                            <x-input-label for="username" :value="__('Username du directeur')" />
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $directeur->username)" required autofocus autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>
                        <div>
                            <x-input-label for="telephone" :value="__('Téléphone du directeur (+243)')" />
                            <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $directeur->telephone)" required autofocus autocomplete="telephone" />
                            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __($directeur->id?'Enregistrer les modifications':'Enregistrer') }}</x-primary-button>
                
                            @if (session('success') != null)
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-gray-600"
                                >{{ __(session('success')) }}</p>
                            @endif
                        </div>
                    </form>
                </section>                    
            </div>
        </div>
    </div>
</div>
