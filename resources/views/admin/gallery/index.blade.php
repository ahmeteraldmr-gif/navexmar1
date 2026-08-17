@extends('layouts.admin')

@section('title', 'Görsel Galerisi - NAVEXMAR Admin')
@section('header_title', 'Medya & Görsel Galerisi Yönetimi')

@section('content')

{{-- Görsel Yükleme Kartı --}}
<div class="admin-card" style="margin-bottom: 30px;">
    <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin-bottom: 14px;">
        <i class="fa-solid fa-cloud-arrow-up"></i> Yeni Görsel Yükle
    </h4>
    <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
        @csrf
        <input type="file" name="image" class="admin-form-control" style="flex: 1; min-width: 250px;" required accept="image/*">
        <button type="submit" class="btn-submit"><i class="fa-solid fa-upload"></i> Yükle</button>
    </form>
</div>

{{-- Görseller Grid --}}
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px;">
    @forelse($files as $file)
    <div class="admin-card" style="padding: 0; overflow: hidden;">
        <div style="aspect-ratio: 16/9; overflow: hidden; background: #F1F5F9; position: relative;">
            <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="padding: 14px;">
            <div style="font-size: 0.82rem; font-weight: 700; color: var(--adm-text); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $file['name'] }}">
                {{ $file['name'] }}
            </div>
            <div style="font-size: 0.74rem; color: var(--adm-muted); margin-top: 4px; display: flex; justify-content: space-between;">
                <span>{{ $file['size'] }}</span>
                <span>{{ $file['time'] }}</span>
            </div>
            <div style="margin-top: 12px; display: flex; gap: 8px;">
                <a href="{{ $file['url'] }}" target="_blank" class="btn-action btn-view" style="flex: 1; justify-content: center;">Görüntüle</a>
                <form action="{{ route('admin.gallery.destroy', $file['name']) }}" method="POST" onsubmit="return confirm('Bu görseli silmek istediğinize emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete"><i class="fa-solid fa-trash"></i> Sil</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="admin-card" style="grid-column: 1/-1; text-align: center; padding: 40px; color: var(--adm-muted);">
        Henüz galeride görsel bulunmuyor.
    </div>
    @endforelse
</div>

@endsection
