<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceAdminController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string',
            'summary' => 'required|string',
            'description' => 'required|string',
            'features' => 'nullable|string', // comma or newline separated
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->sort_order ?? 0;

        if ($request->filled('features')) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $request->features)));
            $validated['features'] = array_values($featuresArray);
        } else {
            $validated['features'] = [];
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Hizmet başarıyla eklendi.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string',
            'summary' => 'required|string',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->sort_order ?? 0;

        if ($request->filled('features')) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $request->features)));
            $validated['features'] = array_values($featuresArray);
        } else {
            $validated['features'] = [];
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Hizmet başarıyla güncellendi.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Hizmet silindi.');
    }
}
