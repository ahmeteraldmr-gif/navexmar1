<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\Vessel;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_quotes' => QuoteRequest::count(),
            'new_quotes' => QuoteRequest::where('status', 'Yeni')->count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'total_services' => Service::count(),
            'total_vessels' => Vessel::count(),
            'total_news' => News::count(),
        ];

        $recentQuotes = QuoteRequest::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentQuotes', 'recentMessages'));
    }
}
