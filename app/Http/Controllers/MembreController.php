<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Seminaire;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::with('seminaire')->paginate(10);
        return view('Events.membres.index', compact('membres'));
    }


    public function search(Request $request)
{
    // Get the search query
    $search = $request->input('search');

    // Build the query to search across multiple fields
    $query = Membre::query();

    if ($search) {
        // Search for all fields
        $query->where('nom', 'like', '%' . $search . '%')
              ->orWhere('prenom', 'like', '%' . $search . '%')
              ->orWhere('sexe', 'like', '%' . $search . '%')
              ->orWhere('telephone', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%');
    }

    // Get the results with pagination
    $membres = $query->paginate(10);

    // Return the results to the view
    return view('Events.membres.search', compact('membres'));
}



    public function create()
    {
        $seminaires = Seminaire::all();
        return view('Events.membres.create', compact('seminaires'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'telephone' => 'required|string|max:15',
            'email' => 'required|email|unique:membres,email',
            'seminaire_id' => 'required|exists:seminaires,id',
        ]);

        Membre::create($validatedData);

        return redirect()->route('membres.index')->with('success', 'Membre created successfully.');
    }

    public function edit($id)
    {
        $membre = Membre::findOrFail($id);
        $seminaires = Seminaire::all();
        return view('Events.membres.edit', compact('membre', 'seminaires'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'telephone' => 'required|string|max:15',
            'email' => 'required|email|unique:membres,email,' . $id,
            'seminaire_id' => 'required|exists:seminaires,id',
        ]);

        $membre = Membre::findOrFail($id);
        $membre->update($validatedData);

        return redirect()->route('membres.index')->with('success', 'Membre updated successfully.');
    }

    public function destroy($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->delete();

        return redirect()->route('membres.index')->with('success', 'Membre deleted successfully.');
    }
}
