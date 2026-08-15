<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = QuoteRequest::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $quotes = $query->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(QuoteRequest $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, QuoteRequest $quote)
    {
        $request->validate([
            'status' => 'required|string|in:Yeni,İnceleniyor,Cevaplandı,Arşivlendi',
        ]);

        $quote->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Teklif durumu başarıyla güncellendi.');
    }

    public function destroy(QuoteRequest $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Teklif talebi silindi.');
    }
}
