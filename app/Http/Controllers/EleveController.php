<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Http\Requests\StoreEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Models\Classe;
use App\Models\Directeur;
use App\Models\EleveClasseAnnee;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if($this->check_session() == false)
            return redirect()->route('directeur.login')->with('error', 'Veuillez vous connecter');
        $directeur = Directeur::findOrFail(session('id'));
        $eleves = EleveClasseAnnee::all();
        return view('directeur.classe_eleves', compact('eleves', 'directeur'));
        dd($eleves);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        $eleve = new Eleve();
        return view('eleve.create', compact('classes', 'eleve'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEleveRequest $request)
    {
        $eleveExiste = Eleve::where('nom', $request->nom)
            ->where('postnom', $request->postnom)
            ->where('prenom', $request->prenom)
            ->where('sexe', $request->sexe)
            ->where('lieu', $request->lieu)
            ->where('date_naissance', $request->date_naissance)
            ->where('matricule', $request->matricule)
            ->first()
        ;
        $anneeEleve = EleveClasseAnnee::where('annee_scolaire_id', $request->annee_scolaire_id)->first();
        if($eleveExiste && $anneeEleve)
            return redirect()->route('eleves.create')->with('error', 'Eleve déjà enregistré pour cette année scolaire');
        if($eleveExiste){
            $created = EleveClasseAnnee::create([
                'eleve_id'=>$eleveExiste->id,
                'classe_id'=>$request->classe_id,
                'annee_scolaire_id'=>$request->annee_scolaire_id,
            ]);
        }else{
            $eleve = Eleve::create($request->all());
            $created = EleveClasseAnnee::create([
                'eleve_id'=>$eleve->id,
                'classe_id'=>$request->classe_id,
                'annee_scolaire_id'=>$request->annee_scolaire_id,
            ]);
        }
        if($created)
            return redirect()->route('eleves.create')->with('success', 'Enregistrement effectué avec succès');
        dd(false);
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEleveRequest $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
    public function check_session(){
        if(session('id') == null)
            return false;
        return true;
    }
    public function eleves_by_classe($id_classe){
        if($this->check_session() == false)
            return redirect()->route('directeur.login')->with('error', 'Veuillez vous connecter');
        $directeur = Directeur::findOrFail(session('id'));
        $classe = Classe::findOrFail($id_classe);
        if($classe->ecole_id == $directeur->ecole->id){
            $eleves = EleveClasseAnnee::where('classe_id', $classe->id)->get();
            return view('directeur.classe_eleves', compact('eleves', 'directeur'));
        }
        return redirect()->route('classes.index');
    }
}
