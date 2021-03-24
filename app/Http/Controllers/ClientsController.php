<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
        return Inertia::render('Clients/Index', compact('clients'));
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
