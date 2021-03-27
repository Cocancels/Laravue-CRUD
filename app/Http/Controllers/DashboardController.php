<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projet;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    function index(){
        $clients = Client::all();
        $projets = Projet::all();
        $numberClients = 0;
        $numberProjets = 0;
        $actualProjet = 0;
        $pourcentage = 0;

        $date = Carbon::now()->toArray();

        foreach($clients as $client){
            $actualClient = $client->created_at->toArray();
            if($date['year'] === $actualClient['year'] && $date['month'] === $actualClient['month'] && $date['day'] === $actualClient['day']){
                $numberClients ++;
            }
        }

        foreach($projets as $projet){
            $actualProjet = $projet->created_at->toArray();
            if($date['year'] === $actualProjet['year'] && $date['month'] === $actualProjet['month'] && $date['day'] === $actualProjet['day']){
                $numberProjets ++ ;
            }
        }
        if($actualProjet!=0){
            $pourcentage = ($numberProjets * 100) / count($projets);
        }
        return Inertia::render('Dashboard', compact('numberClients', 'pourcentage', 'clients', 'projets'));
    }
}
