<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xxl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __("Information de la section") }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __($section->id ? "Modifier les informations":"Enregistrez une nouvelle section") }}
                        </p>
                    </header>
                
                    <form method="post" action="{{ $section->id ? route('sections.update', $section->id):route('sections.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method($section->id ? 'put':'post')               
                        <div>
                            <x-input-label for="nom" :value="__('Nom de la section')" />
                            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $section->nom)" required autofocus autocomplete="nom" />
                            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('Description de la section')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $section->description)" required autofocus autocomplete="description" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __($section->id?'Enregistrer les modifications':'Enregistrer') }}</x-primary-button>
                
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
