<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Seminaire;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{

    // Show the list of all activites
    public function index()
    {
        // Retrieve all activites, with pagination (optional)
        $activites = Activite::with('seminaire')->paginate(10);

        // Return the view with the activites data
        return view('Events.activites.index', compact('activites'));
    }



    // Show the form to create a new activite
    public function create()
    {
        // Get all seminars for the dropdown list
        $seminaires = Seminaire::all();

        return view('Events.activites.create', compact('seminaires'));
    }

    // Store a newly created activite in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'seminaire_id' => 'required|exists:seminaires,id',  // Ensuring that the selected seminar exists
        ]);

        // Create a new activite
        Activite::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'seminaire_id' => $request->seminaire_id,
        ]);

        // Redirect to the activites index page with a success message
        return redirect()->route('activites.index')->with('success', 'Activite created successfully!');
    }

    // Show the form to edit the specified activite
    public function edit(Activite $activite)
    {
        // Get all seminars for the dropdown list
        $seminaires = Seminaire::all();

        return view('Events.activites.edit', compact('activite', 'seminaires'));
    }

    // Update the specified activite in storage
    public function update(Request $request, Activite $activite)
    {
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'seminaire_id' => 'required|exists:seminaires,id',
        ]);

        // Update the activite with the new data
        $activite->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'seminaire_id' => $request->seminaire_id,
        ]);

        // Redirect to the activites index page with a success message
        return redirect()->route('activites.index')->with('success', 'Activite updated successfully!');
    }

    // Remove the specified activite from storage
    public function destroy(Activite $activite)
    {
        // Delete the activite
        $activite->delete();

        // Redirect to the activites index page with a success message
        return redirect()->route('activites.index')->with('success', 'Activite deleted successfully!');
    }
}
