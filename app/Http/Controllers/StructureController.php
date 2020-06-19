<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $structures = Structure::orderByDesc('created_at')->get();

        return view('admin.structures.index', compact('structures'));
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|string'
        ]);

        $structures = Structure::create($data);
        return redirect()->route('structures.index', compact('structures'))->with('success', 'La structure a été créé avec succès.');
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
        try {
            $structure = Structure::findOrFail($id);
            if ($structure) {
                return view('admin.structures.edit', compact('structure'));
            } else {
                return redirect()->back()->with('danger', 'Aucune structure avec cet identifiant.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Une erreur est survenu ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3|unique:structures'
        ]);

        try {
            $structure = Structure::findOrFail($id);
            if ($structure) {
                $structure->name = $data['name'];
                $structure->save();
                
                return redirect()->route('structures.index')->with('success', 'La structure a été modifié avec succès.');
            } else {
                return redirect()->back()->with('danger', 'Auccune structure n\'a été trouvé avec cet identifiant.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Une erreur est survenu ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $structure = Structure::findOrFail($id);

            if ($structure) {
                $structure->delete();
                return redirect()->route('structures.index')->with('success', 'Structure supprimée avec succès.');
            } else {
                return redirect()->back()->with('danger', 'Aucune structure ne correspond à cet identifiant.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Une erreur est survenu ' .$e->getMessage());
        }
    }
}
