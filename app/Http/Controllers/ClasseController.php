<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Section;
use App\Models\Directeur;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if($this->check_session() == false)
            return redirect()->route('directeur.login')->with('error', 'Veuillez vous connecter');
        $classe = new Classe();
        $sections = Section::all();
        $directeur = Directeur::findOrFail(session('id'));
        $ecole_id = $directeur->ecole->id;
        return view('classe.create', compact('sections', 'classe', 'ecole_id'));
    }
    public function check_session(){
        if(session('id') == null)
            return false;
        return true;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClasseRequest $request)
    {
        $tableau = $request->toArray();
        $tableauClasse = [];
        $suffix = "";
        foreach ($tableau as $cle => $valeur){
            switch($request->cycle){
                case 'MATERNEL':
                    $suffix = '_maternel';
                    if(str_ends_with($cle,'primaire') || str_ends_with($cle,'secondaire') || str_ends_with($cle,'humanite'))
                        unset($tableau[$cle]);
                    break;
                case 'PRIMAIRE':
                    $suffix = '_primaire';
                    if(str_ends_with($cle,'maternel') || str_ends_with($cle,'secondaire') || str_ends_with($cle,'humanite'))
                        unset($tableau[$cle]);
                    break;
                case 'SECONDAIRE':
                    $suffix = '_secondaire';
                    if(str_ends_with($cle,'maternel') || str_ends_with($cle,'primaire') || str_ends_with($cle,'humanite'))
                        unset($tableau[$cle]);
                    break;
                case 'HUMANITE':
                    $suffix = '_humanite';
                    if(str_ends_with($cle,'maternel') || str_ends_with($cle,'primaire') || str_ends_with($cle,'secondaire'))
                        unset($tableau[$cle]);
                    break;
            }
        }
        foreach($tableau as $cle => $valeur){
            if(str_ends_with($cle, $suffix)){
                $nouvelleCle = substr($cle, 0, -strlen($suffix));
                $tableauClasse[$nouvelleCle] = $valeur;
            }else{
                $tableauClasse[$cle] = $valeur;
            }
        }
        if($tableauClasse['cycle'] == "SECONDAIRE" || $tableauClasse['cycle'] == "PRIMAIRE"){
            $classeExiste = Classe::where('cycle', $tableauClasse['cycle'])
                ->where('niveau', $tableauClasse['niveau'])
                ->where('ecole_id', $tableauClasse['ecole_id'])
                ->where('salle', $tableauClasse['salle'])
                ->where('indice', $tableauClasse['indice'])
                ->first()
            ;
        }
        if($tableauClasse['cycle'] == "MATERNEL"){
            $classeExiste = Classe::where('cycle', $tableauClasse['cycle'])
                ->where('niveau', $tableauClasse['niveau'])
                ->where('ecole_id', $tableauClasse['ecole_id'])
                ->where('salle', $tableauClasse['salle'])
                ->first()
            ;
        }
        if($tableauClasse['cycle'] == "HUMANITE"){
            $classeExiste = Classe::where('cycle', $tableauClasse['cycle'])
                ->where('niveau', $tableauClasse['niveau'])
                ->where('ecole_id', $tableauClasse['ecole_id'])
                ->where('salle', $tableauClasse['salle'])
                ->where('section_id', $tableauClasse['section_id'])
                ->first()
            ;
        }
        if($classeExiste){
            return redirect()->route('classes.create')->with('error', "Classe déjà enregistrée");
        }

        $classe = new Classe();
        $classe->create($tableauClasse);
        return redirect()->route('classes.create')->with('success', 'Enregistrement effectué avec succès');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreClasseRequest $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
