<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assure que seuls les utilisateurs connectés y accèdent
    }

    // Dans DashboardController.php
public function index()
{
    return view('dashboard.index', [
        'createMaterielRoute' => route('materiels.create'),
        'createAgentRoute' => route('agents.create')
    ]);
}
}