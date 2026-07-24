<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('admin.marques.index', compact('marques'));
    }
    public function create()
    {
        return view('admin.marques.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('marques', 'public');

        Marque::create([
            'name' => $request->name,
            'image' => $path
        ]);

        return redirect()->route('admin.marques.index')->with('success', 'La marque a été ajoutée avec succès!');
    }

    public function edit($id)
    {
        $marque = Marque::findOrFail($id);
        return view('admin.marques.edit', compact('marque'));
    }

    public function update(Request $request, $id)
    {
        $marque = Marque::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($marque->image)) {
                Storage::disk('public')->delete($marque->image);
            }
            $path = $request->file('image')->store('marques', 'public');
            $marque->image = $path;
        }

        $marque->name = $request->name;
        $marque->save();

        return redirect()->route('admin.marques.index')->with('success', 'La marque a été modifiée avec succès!');
    }
    public function destroy($id)
    {
        $marque = Marque::findOrFail($id);
        Storage::disk('public')->delete($marque->image);
        $marque->delete();

        return back()->with('success', 'La marque a été supprimer!');
    }
}
