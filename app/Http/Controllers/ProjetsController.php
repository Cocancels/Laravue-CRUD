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

        return Inertia::render('Projets/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $client = new Projet;
        $client->client_id = $request->input('client_id');
        $client->nom_responsable_projet = $request->input('nom_responsable_projet');
        $client->prenom_responsable_projet = $request->input('prenom_responsable_projet');
        $client->telephone_responsable_projet = $request->input('telephone_responsable_projet');
        $client->mail_responsable_projet = $request->input('mail_responsable_projet');
        $client->titre_projet = $request->input('titre_projet');
        $client->description_projet = $request->input('description_projet');
        $client->debut_projet = $request->input('debut_projet');
        $client->fin_projet = $request->input('fin_projet');
        $client->status_projet = "En cours";
        $client->jours_vendus_projet = $request->input('jours_vendus_projet');
        $client->save();

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
