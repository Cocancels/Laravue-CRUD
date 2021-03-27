<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()

    {
        $projets = Projet::all();
        $clients = Client::all();

        return Inertia::render('Projets/Index', compact('projets', 'clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $clients = Client::all();

        return Inertia::render('Projets/Create', compact('clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $projet = new Projet;
        $client_name = $request->input('client_id');
        $new_client_id = Client::where("raison_sociale_client", $client_name)->get();

        $request->validate([
            'client_id' => 'required',
            'nom_responsable_projet' => 'required|max:30',
            'prenom_responsable_projet' => 'required|max:30',
            'telephone_responsable_projet' => 'required|max:11',
            'mail_responsable_projet' => 'required|max:30',
            'titre_projet' => 'required|max:30',
            'description_projet' => 'required',
            'debut_projet' => 'required',
            'fin_projet' => 'required',
            'status_projet' => 'required',
            'jours_vendus_projet' => 'required',
        ]);

        $projet ->client_id = $new_client_id[0]->id;
        $projet ->nom_responsable_projet = $request->input('nom_responsable_projet');
        $projet ->prenom_responsable_projet = $request->input('prenom_responsable_projet');
        $projet ->telephone_responsable_projet = $request->input('telephone_responsable_projet');
        $projet ->mail_responsable_projet = $request->input('mail_responsable_projet');
        $projet ->titre_projet = $request->input('titre_projet');
        $projet ->description_projet = $request->input('description_projet');
        $projet ->debut_projet = $request->input('debut_projet');
        $projet ->fin_projet = $request->input('fin_projet');
        $projet ->status_projet = $request->input('status_projet');
        $projet ->jours_vendus_projet = $request->input('jours_vendus_projet');
        $projet ->save();

        return redirect()->route('projets.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $projet = Projet::findorfail($id);
        $actualClient = Client::where("id", $projet->client_id)->get();
        $clients = Client::all();
        return Inertia::render('Projets/Edit', compact("projet", 'actualClient', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $projet = Projet::findorfail($id);
        $client_name = $request->input('client_id');
        $new_client_id = Client::where("raison_sociale_client", $client_name)->get();

        $request->validate([
            'client_id' => 'required',
            'nom_responsable_projet' => 'required|max:30',
            'prenom_responsable_projet' => 'required|max:30',
            'telephone_responsable_projet' => 'required|max:11',
            'mail_responsable_projet' => 'required|max:30',
            'titre_projet' => 'required|max:30',
            'description_projet' => 'required',
            'debut_projet' => 'required',
            'fin_projet' => 'required',
            'status_projet' => 'required',
            'jours_vendus_projet' => 'required',
        ]);

        $projet->client_id = $new_client_id[0]->id;
        $projet->nom_responsable_projet = $request->input('nom_responsable_projet');
        $projet->prenom_responsable_projet = $request->input('prenom_responsable_projet');
        $projet->telephone_responsable_projet = $request->input('telephone_responsable_projet');
        $projet->mail_responsable_projet = $request->input('mail_responsable_projet');
        $projet->titre_projet = $request->input('titre_projet');
        $projet->description_projet = $request->input('description_projet');
        $projet->debut_projet = $request->input('debut_projet');
        $projet->fin_projet = $request->input('fin_projet');

        if($request->input('status_projet') === "En cours"){
            $projet->status_projet = "En cours";
        } else if($request->input('status_projet') === "Terminé"){
            $projet->status_projet = "Terminé";
        } else if($request->input('status_projet') === "Annulé"){
            $projet->status_projet = "Annulé";
        }

        $projet->jours_vendus_projet = $request->input('jours_vendus_projet');
        $projet->save();

        return redirect()->route('projets.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $projet = Projet::findorfail($id);
        $projet->delete();

        return redirect()->route('projets.index');
    }
}
