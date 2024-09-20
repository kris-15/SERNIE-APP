<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirecteurLoginRequest;
use App\Http\Requests\DirecteurRequest;
use App\Http\Requests\UpdateDirecteurRequest;
use App\Models\AnneeScolaire;
use App\Models\dipro;
use App\Models\Directeur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directeurs = Directeur::all();
        return view('directeur.index', compact('directeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directeur = new Directeur();
        return view('directeur.create', compact('directeur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DirecteurRequest $request)
    {
        $directeur = new Directeur();
        $created = $directeur->create($request->all());
        return redirect()->route('directeurs.create')->with('success', "Nouveau directeur enregistré avec succès");
        dd($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Directeur $directeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directeur $directeur)
    {
        return view('directeur.update', compact('directeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirecteurRequest $request, Directeur $directeur)
    {
        $directeur->update($request->all());
        return redirect()->route('directeurs.edit', $directeur->id)->with('success', 'Mise à jour des informations effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directeur $directeur)
    {
        $directeur->delete();
        return redirect()->route('directeurs.index');
    }
    public function login_view(){
        return view('directeur.login');
    }
    public function login(DirecteurLoginRequest $request){
        $directeur = Directeur::where('username', $request->username)->where('code', $request->code)->first();
        if($directeur == null)
            return redirect()->route('directeur.login')->with('error', 'Username ou mot de passe incorrect');
        session(['nom_directeur'=>$directeur->nom, 'id'=>$directeur->id]);
        return redirect()->route('directeur.dashboard');
            dd($directeur);
    }
    public function dashboard(){
        if($this->check_session() == false)
            return redirect()->route('directeur.login')->with('error', 'Veuillez vous connecter');
        if(session('annee_id')==null)
            return redirect()->route('directeur.annee');
        $anneeScolaire = session('annee');
        return view('directeur.dashboard', compact('anneeScolaire'));
    }
    public function logout($id){
        // $directeur = Directeur::findOrFail($id);
        // if($directeur){
        //     session()->flush();
        //     return redirect()->route('directeur.login');
        // }
        // return redirect()->route('directeur.dashboard');
    }
    public function annee_scolaire(){
        $anneeScolaires = AnneeScolaire::all();
        return view('directeur.annee', compact('anneeScolaires'));
    }
    public function choix_annee($id){
        $anneeScolaire = AnneeScolaire::findOrFail($id);
        session(["annee_id"=>$anneeScolaire->id, "annee"=>Carbon::parse($anneeScolaire->debut)->format('Y').'-'.Carbon::parse($anneeScolaire->fin)->format('Y')]);
        return redirect()->route('directeur.dashboard');
        dd($anneeScolaire);
    }
    public function check_session(){
        if(session('id') == null)
            return false;
        return true;
    }
}
