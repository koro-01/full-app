<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Seminaire;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('membre', 'seminaire')->paginate(10);
        return view('Events.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $membres = Membre::all();
        $seminaires = Seminaire::all();
        return view('Events.reservations.create', compact('membres', 'seminaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'membre_id' => 'required|exists:membres,id',
            'seminaire_id' => 'required|exists:seminaires,id',
            'date_reservation' => 'required|date',
            'status' => 'required|string',
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $membres = Membre::all();
        $seminaires = Seminaire::all();
        return view('Events.reservations.edit', compact('reservation', 'membres', 'seminaires'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'membre_id' => 'required|exists:membres,id',
            'seminaire_id' => 'required|exists:seminaires,id',
            'date_reservation' => 'required|date',
            'status' => 'required|string',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('reservations.index');
    }

    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();
        return redirect()->route('reservations.index');
    }
}
