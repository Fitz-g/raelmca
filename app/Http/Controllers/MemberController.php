<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Structure;
use App\Models\Pays;

class MemberController extends Controller
{
    /**
     * Liste des adhérents
     */
    public function index()
    {
        $members = Member::orderByDesc('created_at')->get();

        return view('admin.adherents.index', compact('members'));
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
     *
     * @param StoreMemberRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();
        $data['nom'] = strtoupper($data['nom']);
        $data['prenoms'] = strtoupper($data['prenoms']);
        $data['fonction'] = strtoupper($data['fonction']);
        try {
            $data['phone1'] = trim(str_replace(' ', '', $data['phone1']));
            $data['phone2'] = trim(str_replace(' ', '', $data['phone2']));

            if (isset($data['cv'])) {
                $cv = $data['cv'];
                $cv = Helpers::addFile($cv, 'cv');
                $data['cv'] = $cv['fileName'];
            }
            if (isset($data['photo'])) {
                $photo = $data['photo'];
                $photo = Helpers::addFile($photo, 'photos');
                $data['photo'] = $photo['fileName'];
            }

            $adherent = Member::create($data);

            // Ajout dans une structure si existe.
            if(isset($data['structure_id']) && !is_null(($data['structure_id']))) {
                $adherent->structures()->attach($data['structure_id']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Une erreur est survenu ' . $e->getMessage());
        }

        return redirect()->route('members.index')->with('success', 'Nouvel adhérent créé avec succès.');
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

    /**
     * Delete member
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        $member->delete();

        return redirect()->back()->with('success', 'Membre supprimé avec succès.');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.adherents.show', compact('member'));
    }

    public function update(UpdateMemberRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $member = Member::findOrFail($id);

            if (isset($data['cv'])) {
                $cv = $data['cv'];
                $cv = Helpers::addFile($cv, 'cv');
                $data['cv'] = $cv['fileName'];

                $member->cv = $data['cv'];
            }
            if (isset($data['photo'])) {
                $photo = $data['photo'];
                $photo = Helpers::addFile($photo, 'photos');
                $data['photo'] = $photo['fileName'];

                $member->photo = $data['photo'];
            }
            $data['phone1'] = trim(str_replace(' ', '', $data['phone1']));
            $data['phone2'] = trim(str_replace(' ', '', $data['phone2']));

            $member->nom = strtoupper($data['nom']);
            $member->prenoms = strtoupper($data['prenoms']);
            $member->date_naissance = $data['date_naissance'];
            $member->email = $data['email'];
            $member->fonction = strtoupper($data['fonction']);
            $member->phone1 = $data['phone1'];
            $member->phone2 = $data['phone2'];
            $member->pays_id = $data['pays_id'];
            $member->updated_at = NOW();
            $member->structures()->sync($data['structure_id']);

            $member->save();
        } catch (\Exception $e) {
            dump($e->getMessage());
            die();
        }
        return redirect()->route('members.index')->with('success', 'Membre modifié avec succès.');
    }

    public function edit($id)
    {
        try {
            $member = Member::findOrFail($id);
            $countries = Pays::all();
            $structures = Structure::all();
        } catch (\Exception $e) {
            dump($e->getMessage());
            die();
        }
        return view('admin.adherents.edit', compact('member', 'countries', 'structures'));
    }
}
