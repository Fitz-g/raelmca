<?php

namespace App\Http\Controllers;

use App\Models\Adherant;
use App\Models\Structure;
use App\Models\Pays;
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
        $countries = Pays::all();

        return view('admin.adherents.create', compact('structures', 'countries'));
    }

    /**
     * Enregistrement d'un nouvel adhérent
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|min:3|max:60',
            'prenoms' => 'required|string|min:3|max:200',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:adherants',
            'fonction' => 'required|string',
            'phone1' => 'required|string',
            'phone2' => 'string',
            'pays_id' => 'required|integer',
            'cv' => 'mimes:docx,pdf',
            'photo' => 'mimes:jpeg,bmp,png|image',
            'structure_id' => 'array',
        ]);
        dd($data);

        try {
            $adherent = Adherant::create($data);
            $adherent->structures()->attach($data['structure_id']);


            return redirect()->route('adherents.index')->with('success', 'Nouvel adhérent créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Une erreur est survenu ' . $e->getMessage());
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'structure_id' => 'Structure',
            'phone1' => 'Numéro de téléphone 1',
            'phone2' => 'Numéro de téléphone 2',
            'pays_id' => 'Pays',
        ];
    }
}
