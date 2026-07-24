<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'prix' => 'required|numeric',
            'etat' => 'required',
            'disponibilite' => 'required|boolean',
            'date_debut_location' => 'nullable|date|required_with:date_fin_location',
            'date_fin_location' => 'nullable|date|after_or_equal:date_debut_location',
        ]);

        $data = $request->all();

        if ($data['disponibilite'] == "1") {
            $data['date_debut_location'] = null;
            $data['date_fin_location'] = null;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($data);
        return redirect()->route('admin.cars.index')->with('success', 'La voiture a été ajoutée avec succès!');
    }
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'marque' => 'required',
            'prix' => 'required|numeric',
            'etat' => 'required',
            'disponibilite' => 'required|boolean',
            'date_debut_location' => 'nullable|date|required_with:date_fin_location',
            'date_fin_location' => 'nullable|date|after_or_equal:date_debut_location',
        ]);

        $data = $request->all();

        if ($data['disponibilite'] == "1") {
            $data['date_debut_location'] = null;
            $data['date_fin_location'] = null;
        }

        if ($request->hasFile('image')) {
            if ($car->image) Storage::disk('public')->delete($car->image);
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($data);
        return redirect()->route('admin.cars.index')->with('success', 'La voiture a été modifiée avec succès!');
    }

    public function destroy(Car $car)
    {
        if ($car->image) Storage::disk('public')->delete($car->image);
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'La voiture a été supprimer!');
    }
}
