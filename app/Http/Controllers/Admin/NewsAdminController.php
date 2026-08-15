<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsAdminController extends Controller
{
    public function index()
    {
        $newsList = News::latest()->paginate(10);
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'summary' => 'required|string',
            'content' => 'required|string',
            'author' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = now();
        $validated['author'] = $request->author ?? 'NAVEXMAR Editör';
        $validated['image'] = '/images/strait_transit.jpg';

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Haber / Duyuru başarıyla yayınlandı.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'summary' => 'required|string',
            'content' => 'required|string',
            'author' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['is_published'] = $request->has('is_published');

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Haber / Duyuru güncellendi.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Haber silindi.');
    }
}
