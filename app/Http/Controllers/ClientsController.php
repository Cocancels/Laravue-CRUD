<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $clients = Client::all();
        $projets = Projet::all();
        $clients_projets = [];
        $projets_number = 0;



        foreach ($clients as $client){
            foreach ($projets as $projet){
                if($client->id === $projet->client_id){
                    $projets_number ++;
                }
            }
            $client_projet = new \stdClass();
            $client_projet->id = $client->id;
            $client_projet->client_projet_number = $projets_number;
            array_push($clients_projets, $client_projet);
            $projets_number = 0;
        }



        return Inertia::render('Clients/Index', compact('clients', 'projets', 'clients_projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Clients/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->description_client = $request->input('description_client');
        $client->raison_sociale_client = $request->input('raison_sociale_client');
        $client->statut_juridique_client = $request->input('statut_juridique_client');
        $client->capital_client = $request->input('capital_client');
        $client->siret_numero_client = $request->input('siret_numero_client');
        $client->naf_code_client = $request->input('naf_code_client');
        $client->pays_siege_client = $request->input('pays_siege_client');
        $client->adresse_siege_client = $request->input('adresse_siege_client');
        $client->code_postal_siege_client = $request->input('code_postal_siege_client');
        $client->ville_siege_client = $request->input('ville_siege_client');
        $client->save();

        return redirect()->route('clients.index');
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
        $client = Client::findorfail($id);
        return Inertia::render('Clients/Edit', compact("client"));
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
        $client = Client::findorfail($id);

        $client->description_client = $request->input('description_client');
        $client->raison_sociale_client = $request->input('raison_sociale_client');
        $client->statut_juridique_client = $request->input('statut_juridique_client');
        $client->capital_client = $request->input('capital_client');
        $client->siret_numero_client = $request->input('siret_numero_client');
        $client->naf_code_client = $request->input('naf_code_client');
        $client->pays_siege_client = $request->input('pays_siege_client');
        $client->adresse_siege_client = $request->input('adresse_siege_client');
        $client->code_postal_siege_client = $request->input('code_postal_siege_client');
        $client->ville_siege_client = $request->input('ville_siege_client');
        $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $client = Client::findorfail($id);
        $client->delete();

        return redirect()->route('clients.index');

    }
}
