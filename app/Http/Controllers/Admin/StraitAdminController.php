<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class StraitAdminController extends Controller
{
    public function index()
    {
        $settings = [
            // İstanbul
            'ist_len'     => SiteSetting::get('ist_len', '31 km'),
            'ist_narrow'  => SiteSetting::get('ist_narrow', '700 m (Anadoluhisarı)'),
            'ist_depth'   => SiteSetting::get('ist_depth', '36 m'),
            'ist_draft'   => SiteSetting::get('ist_draft', '17,0 m'),
            'ist_loa'     => SiteSetting::get('ist_loa', '330 m'),
            'ist_current' => SiteSetting::get('ist_current', '3–4 knot (K→G)'),
            'ist_vts'     => SiteSetting::get('ist_vts', 'Ch 12 / Ch 11'),
            'ist_notice'  => SiteSetting::get('ist_notice', '24 saat önceden'),

            // Çanakkale
            'cnk_len'     => SiteSetting::get('cnk_len', '61 km'),
            'cnk_narrow'  => SiteSetting::get('cnk_narrow', '1.200 m (Nara Burnu)'),
            'cnk_depth'   => SiteSetting::get('cnk_depth', '55 m'),
            'cnk_draft'   => SiteSetting::get('cnk_draft', '23,0 m'),
            'cnk_loa'     => SiteSetting::get('cnk_loa', '350 m'),
            'cnk_current' => SiteSetting::get('cnk_current', '1–2 knot'),
            'cnk_vts'     => SiteSetting::get('cnk_vts', 'Ch 67 / Ch 14'),
            'cnk_notice'  => SiteSetting::get('cnk_notice', '24 saat önceden'),
        ];

        return view('admin.straits.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Boğaz ve liman teknik verileri güncellendi.');
    }
}
