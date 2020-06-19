<?php

namespace App\Http\Controllers;

use App\Models\Adherant;
use App\Models\Structure;
use Illuminate\Http\Request;

class AdherantController extends Controller
{
    /**
     * Liste des adhérents
     */
    public function index()
    {
        $adherents = Adherant::orderBy('created_at', 'desc')->get();

        return view('admin.adherents.index', compact('adherents'));
    }

    /**
     * Page de création d'un adhérent.
     */
    public function create()
    {
        $structures = Structure::all();

        return view('admin.adherents.create', compact('structures'));
    }

    /**
     * Enregistrement d'un nouvel adhérent
     */
    public function store(Request $resquest)
    {
        dd($request->all());
    }
}
