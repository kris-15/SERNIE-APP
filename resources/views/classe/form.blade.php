<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xxl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __("Information de la salle") }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __($classe->id ? "Modifier les informations":"Enregistrez une nouvelle salle") }}
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
                
                    <form method="post" action="{{ $classe->id ? route('classes.update', $classe->id):route('classes.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method($classe->id ? 'put':'post') 
                        <div class="mb-4">
                            <label for="cycle" class="block text-gray-700 text-sm font-bold mb-2">Choisir le cycle</label>
                            <select id="cycle" name="cycle" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full" onchange="toggleNomField()">
                                <option></option>
                                <option value="MATERNEL" @selected(old('cycle', $classe->cycle)=="MATERNEL")>MATERNEL</option>
                                <option value="PRIMAIRE" @selected(old('cycle', $classe->cycle)=="PRIMAIRE")>PRIMAIRE</option>
                                <option value="SECONDAIRE" @selected(old('cycle', $classe->cycle)=="SECONDAIRE")>EDUCATION DE BASE</option>
                                <option value="HUMANITE" @selected(old('cycle', $classe->cycle)=="HUMANITE")>HUMANITE</option>
                            </select>
                        </div>               
                        <div id="maternel" style="display: none;">
                            <div class="mb-4">
                                <label for="salle_maternel" class="block text-gray-700 text-sm font-bold mb-2">Choisir la salle</label>
                                <select id="salle_maternel" name="salle_maternel" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option></option>
                                    <option value="PREMIERE" @selected(old('salle_maternel', $classe->salle)=="PREMIERE")>PREMIERE</option>
                                    <option value="DEUXIEME" @selected(old('salle_maternel', $classe->salle)=="DEUXIEME")>DEUXIEME</option>
                                    <option value="TROISIEME" @selected(old('salle_maternel', $classe->salle)=="TROISIEME")>TROISIEME</option>
                                </select>
                            </div>
                            <a href="" id="lien"></a>
                            <div>
                                <x-input-label for="niveau_maternel" :value="__('Ecrire le niveau en chiffre')" />
                                <x-text-input id="niveau_maternel" name="niveau_maternel" type="number" class="mt-1 block w-full" min=1 max=3 :value="old('niveau_maternel', $classe->niveau)"/>
                                <x-input-error class="mt-2" :messages="$errors->get('niveau_maternel')" />
                            </div>
                        </div>
                        <div id="primaire" style="display: none;">
                            <div class="mb-4">
                                <label for="salle_primaire" class="block text-gray-700 text-sm font-bold mb-2">Choisir le degré de la salle</label>
                                <select id="salle_primaire" name="salle_primaire" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option></option>
                                    <option value="PREMIERE" @selected(old('salle_primaire', $classe->salle)=="PREMIERE")>PREMIERE</option>
                                    <option value="DEUXIEME" @selected(old('salle_primaire', $classe->salle)=="DEUXIEME")>DEUXIEME</option>
                                    <option value="TROISIEME" @selected(old('salle_primaire', $classe->salle)=="TROISIEME")>TROISIEME</option>
                                    <option value="QUATRIEME" @selected(old('salle_primaire', $classe->salle)=="QUATRIEME")>QUATRIEME</option>
                                    <option value="CINQUIEME" @selected(old('salle_primaire', $classe->salle)=="CINQUIEME")>CINQUIEME</option>
                                    <option value="SIXIEME" @selected(old('salle_primaire', $classe->salle)=="SIXIEME")>SIXIEME</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="niveau_primaire" :value="__('Ecrire le niveau en chiffre')" />
                                <x-text-input id="niveau_primaire" name="niveau_primaire" type="number" class="mt-1 block w-full" min=1 max=6 :value="old('niveau_primaire', $classe->niveau)" autofocus autocomplete="niveau" />
                                <x-input-error class="mt-2" :messages="$errors->get('niveau_primaire')" />
                            </div>
                            <div class="mb-4">
                                <label for="indice_primaire" class="block text-gray-700 text-sm font-bold mb-2">Choisir l'indice de la salle</label>
                                <select id="indice_primaire" name="indice_primaire" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option value="">AUCUN</option>
                                    <option value="A" @selected(old('indice_primaire', $classe->indice)=="A")>A</option>
                                    <option value="B" @selected(old('indice_primaire', $classe->indice)=="B")>B</option>
                                    <option value="C" @selected(old('indice_primaire', $classe->indice)=="C")>C</option>
                                    <option value="D" @selected(old('indice_primaire', $classe->indice)=="D")>D</option>
                                    <option value="E" @selected(old('indice_primaire', $classe->indice)=="E")>E</option>
                                    <option value="F" @selected(old('indice_primaire', $classe->indice)=="F")>F</option>
                                </select>
                            </div>
                        </div>
                        <div id="secondaire" style="display: none;">
                            <div class="mb-4">
                                <label for="salle_secondaire" class="block text-gray-700 text-sm font-bold mb-2">Choisir le degré de la salle</label>
                                <select id="salle_secondaire" name="salle_secondaire" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option></option>
                                    <option value="SEPTIEME" @selected(old('salle_secondaire', $classe->salle)=="SEPTIEME")>SEPTIEME</option>
                                    <option value="HUITIEME" @selected(old('salle_secondaire', $classe->salle)=="HUITIEME")>HUITIEME</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="niveau_secondaire" :value="__('Ecrire le niveau en chiffre')" />
                                <x-text-input id="niveau_secondaire" name="niveau_secondaire" type="number" class="mt-1 block w-full" min=7 max=8 :value="old('niveau', $classe->niveau)" autofocus autocomplete="niveau" />
                                <x-input-error class="mt-2" :messages="$errors->get('niveau_secondaire')" />
                            </div>
                            <div class="mb-4">
                                <label for="indice_secondaire" class="block text-gray-700 text-sm font-bold mb-2">indice de l'école</label>
                                <select id="indice_secondaire" name="indice_secondaire" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option value="">AUCUN</option>
                                    <option value="A" @selected(old('indice_secondaire', $classe->indice)=="A")>A</option>
                                    <option value="B" @selected(old('indice_secondaire', $classe->indice)=="B")>B</option>
                                    <option value="C" @selected(old('indice_secondaire', $classe->indice)=="C")>C</option>
                                    <option value="D" @selected(old('indice_secondaire', $classe->indice)=="D")>D</option>
                                    <option value="E" @selected(old('indice_secondaire', $classe->indice)=="E")>E</option>
                                    <option value="F" @selected(old('indice_secondaire', $classe->indice)=="F")>F</option>
                                </select>
                            </div>
                        </div>
                        <div id="humanite" style="display: none;">
                            <div class="mb-4">
                                <label for="salle_humanite" class="block text-gray-700 text-sm font-bold mb-2">Choisir le degré de la salle</label>
                                <select id="salle_humanite" name="salle_humanite" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option value=""></option>
                                    <option value="PREMIERE" @selected(old('salle_humanite', $classe->salle)=="PREMIERE")>PREMIERE</option>
                                    <option value="DEUXIEME" @selected(old('salle_humanite', $classe->salle)=="DEUXIEME")>DEUXIEME</option>
                                    <option value="TROISIEME" @selected(old('salle_humanite', $classe->salle)=="TROISIEME")>TROISIEME</option>
                                    <option value="QUATRIEME" @selected(old('salle_humanite', $classe->salle)=="QUATRIEME")>QUATRIEME</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="niveau_humanite" :value="__('Ecrire le niveau en chiffre')" />
                                <x-text-input id="niveau_humanite" name="niveau_humanite" type="number" class="mt-1 block w-full" min=1 max=4 :value="old('niveau', $classe->niveau)" />
                                <x-input-error class="mt-2" :messages="$errors->get('niveau_humanite')" />
                            </div>
                            <div class="mb-4">
                                <label for="section_id" class="block text-gray-700 text-sm font-bold mb-2">Choisir la section</label>
                                <select id="section_id" name="section_id" class="block appearance-none border border-gray-300 rounded py-2 px-4 pr-8 bg-white text-gray-700 focus:outline-none focus:border-blue-500  w-full">
                                    <option value="">AUCUN</option>
                                    @foreach ($sections as $section)
                                        <option value="{{$section->id}}" @selected(old('section_id', $section->id)=="$classe->section_id")> {{strtoupper($section->nom)}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="ecole_id" value="1">
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __($classe->id?'Enregistrer les modifications':'Enregistrer') }}</x-primary-button>
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
<script>
    function toggleNomField(){
        const cycleSelect = document.getElementById('cycle');
        const maternel = document.getElementById('maternel');
        const primaire = document.getElementById('primaire');
        const secondaire = document.getElementById('secondaire');
        const humanite = document.getElementById('humanite');
        maternel.style.display = 'none';
        primaire.style.display = 'none';
        secondaire.style.display = 'none';
        humanite.style.display = 'none';
        switch (cycleSelect.value) {
            case 'MATERNEL':
                maternel.style.display = 'block';
                break;
            case 'PRIMAIRE':
                primaire.style.display = 'block';
                break;
            case 'SECONDAIRE':
                secondaire.style.display = 'block';
                break;
            case 'HUMANITE':
                humanite.style.display = 'block';
                break;

        }
    }
    document.addEventListener('DOMContentLoaded', toggleNomField)
</script>
