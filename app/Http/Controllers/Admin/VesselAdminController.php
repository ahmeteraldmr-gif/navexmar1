<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselAdminController extends Controller
{
    public function index()
    {
        $vessels = Vessel::latest()->paginate(10);
        return view('admin.vessels.index', compact('vessels'));
    }

    public function create()
    {
        return view('admin.vessels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'vessel_type' => 'required|string|max:255',
            'flag' => 'required|string|max:100',
            'imo_number' => 'required|integer|unique:vessels,imo_number',
            'grt' => 'required|integer',
            'dwt' => 'nullable|integer',
            'last_port' => 'nullable|string',
            'operation_type' => 'required|string',
            'status' => 'required|string',
            'details' => 'nullable|string',
        ]);

        $validated['image'] = '/images/hero_ship.jpg'; // default visual asset

        Vessel::create($validated);

        return redirect()->route('admin.vessels.index')->with('success', 'Gemi kaydı başarıyla oluşturuldu.');
    }

    public function edit(Vessel $vessel)
    {
        return view('admin.vessels.edit', compact('vessel'));
    }

    public function update(Request $request, Vessel $vessel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'vessel_type' => 'required|string|max:255',
            'flag' => 'required|string|max:100',
            'imo_number' => 'required|integer|unique:vessels,imo_number,' . $vessel->id,
            'grt' => 'required|integer',
            'dwt' => 'nullable|integer',
            'last_port' => 'nullable|string',
            'operation_type' => 'required|string',
            'status' => 'required|string',
            'details' => 'nullable|string',
        ]);

        $vessel->update($validated);

        return redirect()->route('admin.vessels.index')->with('success', 'Gemi kaydı güncellendi.');
    }

    public function destroy(Vessel $vessel)
    {
        $vessel->delete();
        return redirect()->route('admin.vessels.index')->with('success', 'Gemi kaydı silindi.');
    }
}
