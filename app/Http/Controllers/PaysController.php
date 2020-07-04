<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Pays;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pays = Pays::orderByDesc('created_at')->get();

        return view('admin.pays.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|unique:pays',
            'alpha3' => 'required|max:3|unique:pays'
        ]);

        try {
            $countries = Pays::create($data);

            return redirect()->route('pays.index', compact('countries'))
                ->with('success', 'Le pays a été créé avec succès.');
        } catch (\Exception $e) {
            return 'Une erreur est survenu ' . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function show($id)
    {
        try {
            $country = Pays::find($id);
            if ($country) {
                return redirect()->route('pays.show', compact('country'));
            }
        } catch(\Exception $e) {
            return 'Une erreur est survenu ' . $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $pays = Pays::findOrFail($id);

        return view('admin.pays.edit', compact('pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'alpha3' => 'required|max:3'
        ]);

        try {
            $pays = Pays::findOrFail($id);
            if ($pays) {
                $pays->name = $data['name'];
                $pays->alpha3 = $data['alpha3'];
                $pays->updated_at = NOW();
                $pays->save();

                return redirect()->route('pays.index')->with('success', 'Pays modifié avec succès.');
            } else {
                return redirect()->back()->with('danger', 'Aucun pays trouvé avec cet identifiant.');
            }
        } catch (\Exception $e) {
            return 'Une erreur est survenu' . $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        try {
            $pays = Pays::find($id);
            if($pays) {
                $pays->delete();
            }

            return redirect()->route('pays.index')->with('success', 'Le pays a été supprimé.');
        } catch (\Exception $e) {
            dump('Une erreur est survenu ' . $e->getMessage());
        }
    }
}
