<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projet;
use DateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    function index(){
        $clients = Client::all();
        $projets = Projet::all();

        $dt = new DateTime();

        return Inertia::render('Dashboard');

    }
}
