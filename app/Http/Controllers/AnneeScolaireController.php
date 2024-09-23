<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Http\Requests\StoreAnneeScolaireRequest;
use Carbon\Carbon;

class AnneeScolaireController extends Controller
{
    public $messageErreurDate = "La date de clôture ne doit pas être inférieure ou égale à la date actuelle pour une année ouverte";
    public $messageErreurAnneeFermee = "La date de clôture ne doit pas être supérieure ou égale à la date actuelle pour une année fermée";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anneeScolaires = AnneeScolaire::all();
        return view('annee.index', compact('anneeScolaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anneeScolaire = new AnneeScolaire();
        return view('annee.create', compact('anneeScolaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnneeScolaireRequest $request)
    {
        $anneeScolaire = new AnneeScolaire();
        if($request->statut == "OUVERT"){
            if($request->fin <= Carbon::now())
                return redirect()->route('annees.create')->with('error', $this->messageErreurDate);
        }
        $anneeScolaire->create($request->all());
        return redirect()->route('annees.create')->with('success', 'Enregistrement effectué avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnneeScolaire $anneeScolaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($anneeScolaire_id)
    {
        $anneeScolaire = AnneeScolaire::findOrFail($anneeScolaire_id);
        return view('annee.update', compact('anneeScolaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAnneeScolaireRequest $request, $anneeScolaire_id)
    {
        $anneeScolaire = AnneeScolaire::findOrFail($anneeScolaire_id);
        /**
         * Apres modification,
         * Si le statut est ouvert, on verifie si la date de fin est superieur à la date actuelle
         * Sinon on renvoit une erreur. Pour un statut ouvert, la date de fin ne doit pas
         * être inférieure à la date actuelle
         */
        switch($request->statut){
            case "OUVERT":
                if($request->fin <= Carbon::now())
                    return redirect()->route('annees.edit', $anneeScolaire->id)->with('error', $this->messageErreurDate);
            case "FERME":
                if($request->fin >= Carbon::now())
                    return redirect()->route('annees.edit', $anneeScolaire->id)->with('error', $this->messageErreurAnneeFermee);
        }
        $anneeScolaire->update($request->all());
        return redirect()->route('annees.edit', $anneeScolaire->id)->with('success', 'Mise à jour effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnneeScolaire $anneeScolaire)
    {
        //
    }
}
