<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryAdminController extends Controller
{
    public function index()
    {
        $path = public_path('images');
        $files = [];

        if (File::exists($path)) {
            $allFiles = File::files($path);
            foreach ($allFiles as $file) {
                $ext = strtolower($file->getExtension());
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'svg'])) {
                    $files[] = [
                        'name' => $file->getFilename(),
                        'url'  => asset('images/' . $file->getFilename()),
                        'size' => round($file->getSize() / 1024, 1) . ' KB',
                        'time' => date('d.m.Y H:i', $file->getMTime()),
                    ];
                }
            }
        }

        return view('admin.gallery.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $file = $request->file('image');
        $name = time() . '_' . str_replace(' ', '_', strtolower($file->getClientOriginalName()));
        $file->move(public_path('images'), $name);

        return redirect()->back()->with('success', 'Görsel başarıyla yüklendi: ' . $name);
    }

    public function destroy($filename)
    {
        $filePath = public_path('images/' . $filename);

        if (File::exists($filePath)) {
            File::delete($filePath);
            return redirect()->back()->with('success', 'Görsel silindi: ' . $filename);
        }

        return redirect()->back()->withErrors(['file' => 'Görsel bulunamadı.']);
    }
}
