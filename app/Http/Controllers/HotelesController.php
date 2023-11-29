<?php


namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
       // aqui ponen la ruta de la vista ejmeplo 
       return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'nit' => 'required|max:20',
            'address' => 'required|max:50',
            'num_rooms' => 'required|integer',
        ]);

        Hotel::create($request->all());

        return redirect()->route('hotels.index')->with('success', 'Hotel creado exitosamente.');
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|max:50',
            'nit' => 'required|max:20',
            'address' => 'required|max:50',
            'num_rooms' => 'required|integer',
        ]);

        $hotel->update($request->all());

        return redirect()->route('hotels.index')->with('success', 'Hotel actualizado exitosamente.');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Hotel eliminado exitosamente.');
    }
}
