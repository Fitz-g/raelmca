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
     * @return Pays[]|Collection
     */
    public function index()
    {
        return Pays::all(); 
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
            $pays = Pays::create($data);
            return response()->json(ApiResponse::getRessourceSuccess(200, $pays));
        } catch (\Exception $e) {
            return response()->json(ApiResponse::error(500, $e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pays = Pays::find($id);
            if ($pays) {
                return response()->json(ApiResponse::getRessourceSuccess(200, $pays));
            } 
        } catch(\Exception $e) {
            return response()->json(ApiResponse::error(404, 'Une erreur est survenu ' . $e->getMessage()));
        }
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
        $data = $request->validate([
            'name' => 'required|min:3|unique:pays',
            'alpha3' => 'required|max:3|unique:pays'
        ]);

        try {
            $pays = Pays::find($id);
            if ($pays) {
                $pays->name = $data['name'];
                $pays->alpha3 = $data['alpha3'];

                return response()->json(ApiResponse::getRessourceSuccess(200, $pays));
            } else {
                return response()->json(ApiResponse::error(404, "Aucun élément trouver avec cet Identifiant"));
            }            
        } catch (\Exception $e) {
            return response()->json(ApiResponse::error(500, $e->getMessage()));
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
            $pays = Pays::find($id);
            $pays->delete();

            return response()->json(ApiResponse::DELETESUCCESS);
        } catch (\Exception $e) {
            return response()->json(ApiResponse::error(500, $e->getMessage()));
        }
    }
}
