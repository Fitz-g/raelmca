<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\StoreMemberRequest;
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
        $members = Member::orderBy('created_at', 'desc')->get();

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
     * @param StoreMemberRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();

        $cv = $data['cv'];
        $photo = $data['photo'];
        $data['phone1'] = trim(str_replace(' ', '', $data['phone1']));
        $data['phone2'] = trim(str_replace(' ', '', $data['phone2']));

        if (!is_null($data['cv'])) {
            $cv = Helpers::addFile($cv, 'cv');
        }
        if (!is_null($data['photo'])) {
            $photo = Helpers::addFile($photo, 'photos');
        }

        try {
            $data['cv'] = $cv['fileName'];
            $data['photo'] = $photo['fileName'];

            $adherent = Member::create($data);

            // Ajout dans une structure si existe.
            if(!is_null($data['structure_id'])) {
                $adherent->structures()->sync($data['structure_id']);
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

        return view('', compact('members'));
    }

    public function update(StoreMemberRequest $request, $id)
    {
        $data = $request->validated();
        
        $cv = $data['cv'];
        $photo = $data['photo'];
        $data['phone1'] = trim(str_replace(' ', '', $data['phone1']));
        $data['phone2'] = trim(str_replace(' ', '', $data['phone2']));

        if (!is_null($data['cv'])) {
            $cv = Helpers::addFile($cv, 'cv');
        }
        if (!is_null($data['photo'])) {
            $photo = Helpers::addFile($photo, 'photos');
        }
        $data['cv'] = $cv['fileName'];
        $data['photo'] = $photo['fileName'];

        try {
            $member = Member::findOrFail($id);

            $member->update($data);
        } catch (\Exception $e) {
            dump($e->getMessage());
            die();
        }
    }
}
