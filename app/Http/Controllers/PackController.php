<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $packs = Pack::all();
    return view('list_packs', compact('packs'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajouter_pack');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric'
        ]);

        $pack = Pack::create($validatedData);

        return redirect()->route('packs.index')->with('success', 'Le pack a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        return view('packs.details_pack', compact('pack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pack = Pack::findOrFail($id);
        return view('modifier_pack', compact('pack'));
    }
    public function update(Request $request, Pack $pack)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
        ]);

        $pack->nom = $validatedData['nom'];
        $pack->description = $validatedData['description'];
        $pack->prix = $validatedData['prix'];
        $pack->save();

        return redirect()->route('packs.index')->with('success', 'Pack modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack $pack)
{
    $pack->delete();

    return redirect()->route('packs.index')->with('success', 'Pack deleted successfully');
}
}
