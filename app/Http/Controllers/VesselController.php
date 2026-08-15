<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselController extends Controller
{
    public function index(Request $request)
    {
        $query = Vessel::query();

        if ($request->has('type') && $request->type != 'all') {
            $query->where('vessel_type', $request->type);
        }

        $vessels = $query->latest()->paginate(9);
        $vesselTypes = Vessel::select('vessel_type')->distinct()->pluck('vessel_type');

        return view('vessels.index', compact('vessels', 'vesselTypes'));
    }
}
