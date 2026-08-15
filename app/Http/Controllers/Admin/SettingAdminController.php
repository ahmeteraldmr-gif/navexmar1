<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingAdminController extends Controller
{
    public function index()
    {
        $settings = [
            'phone' => SiteSetting::get('phone'),
            'mobile' => SiteSetting::get('mobile'),
            'email' => SiteSetting::get('email'),
            'address' => SiteSetting::get('address'),
            'working_hours' => SiteSetting::get('working_hours'),
            'facebook' => SiteSetting::get('facebook'),
            'linkedin' => SiteSetting::get('linkedin'),
            'instagram' => SiteSetting::get('instagram'),
            'about_short' => SiteSetting::get('about_short'),
        ];
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = ['phone', 'mobile', 'email', 'address', 'working_hours', 'facebook', 'linkedin', 'instagram', 'about_short'];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field));
            }
        }

        return redirect()->back()->with('success', 'Site ayarları güncellendi.');
    }
}
