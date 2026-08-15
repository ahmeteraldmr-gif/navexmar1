<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('is_published', true);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $newsList = $query->latest('published_at')->paginate(6);
        $categories = News::where('is_published', true)->select('category')->distinct()->pluck('category');

        return view('news.index', compact('newsList', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $recentNews = News::where('is_published', true)->where('id', '!=', $news->id)->latest('published_at')->take(4)->get();
        return view('news.show', compact('news', 'recentNews'));
    }
}
