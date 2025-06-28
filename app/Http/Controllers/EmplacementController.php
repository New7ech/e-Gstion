<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmplacementRequest;
use App\Http\Requests\UpdateEmplacementRequest;
use App\Models\Emplacement;

class EmplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('emplacements.index', [
            'emplacements' => Emplacement::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emplacements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmplacementRequest $request)
    {
        $request->validate(['name' => 'required|unique:categories',
            'description' => 'nullable|string|max:255', // Validation pour la description
        ]);

        Emplacement::create(['name' => $request->name,
            'description' => $request->description]);

        return redirect()->route('emplacements.index')
            ->with('success', 'categorie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emplacement $emplacement)
    {
        return view('emplacements.show', compact('emplacement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emplacement $emplacement)
    {
        return view('emplacements.edit', compact('emplacement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmplacementRequest $request, Emplacement $emplacement)
    {
        $request->validate(['name' => 'required|unique:categories,name,' . $emplacement->id,
            'description' => 'nullable|string|max:255',
        ]);

        $emplacement->update(['name' => $request->name,
            'description' => $request->description]);

        return redirect()->route('emplacements.index')
            ->with('success', 'categorie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emplacement $emplacement)
    {
        $emplacement->delete();

        return redirect()->route('emplacements.index')
            ->with('success', 'categorie deleted successfully.');
    }
}
