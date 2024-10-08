<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Http\Requests\StoreEcoleRequest;
use App\Http\Requests\UpdateEcoleRequest;
use App\Models\Classe;
use App\Models\Directeur;
use App\Models\EleveClasseAnnee;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all();
        return view('ecole.index', compact('ecoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecole = new Ecole();
        $directeurs = Directeur::all();
        return view('ecole.create', compact('ecole', 'directeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEcoleRequest $request)
    {
        $ecole = new Ecole();
        $ecole->create($request->all());
        return redirect()->route('ecoles.create')->with('success', 'Enregistrement de la nouvelle école effectué avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ecole $ecole)
    {
        $classes = Classe::where('ecole_id', $ecole->id)->get();
        return view('ecole.classes', compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ecole $ecole)
    {
        $directeurs = Directeur::all();
        return view('ecole.update', compact('ecole', 'directeurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEcoleRequest $request, Ecole $ecole)
    {
        $ecole->update($request->all());
        return redirect()->route('ecoles.edit', $ecole->id)->with('success', 'Mise à jour des informations effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ecole $ecole)
    {
        //
    }
    public function eleves_by_classe($id_ecole, $id_classe){
        $ecole = Ecole::findOrFail($id_ecole);
        $classe = Classe::findOrFail($id_classe);
        if($classe->ecole_id == $ecole->id){
            $eleves = EleveClasseAnnee::where('classe_id', $classe->id)->get();
            return view('ecole.classe_eleves', compact('eleves', 'ecole'));
        }
        return redirect()->route('ecoles.show', $id_ecole);
    }
}
