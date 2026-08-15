<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vessel;
use App\Models\News;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $vessels = Vessel::latest()->take(4)->get();
        $news = News::where('is_published', true)->latest('published_at')->take(3)->get();

        $stats = [
            'vessels_handled' => 1450,
            'strait_passages' => 3800,
            'bunkering_tons' => '250.000+',
            'years_experience' => 18,
        ];

        return view('home', compact('services', 'vessels', 'news', 'stats'));
    }

    public function about()
    {
        return view('about');
    }

    public function straitsAndPorts()
    {
        return view('straits-ports');
    }
}
