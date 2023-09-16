<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::limit(10)
            //nomi della relazione(non della identità)
            ->with('type', 'technologies')
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //prendo il post con usando find($id) in modo che se non c'è posso fare il controllo e mandare null con 404.
        $project = Project::with('type', 'technologies')->find($id);

        //condizione nel caso non ci sia il post, non risponde nulla
        if (!$project) return response(null, 404);
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
