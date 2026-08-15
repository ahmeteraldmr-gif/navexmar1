@extends('layouts.admin')

@section('title', 'Yeni Hizmet Ekle - NAVEXMAR Admin')
@section('header_title', 'Yeni Hizmet Ekle')

@section('content')

    <div style="background: var(--admin-card); padding: 30px; border-radius: 12px; border: 1px solid var(--admin-border); max-width: 800px;">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="admin-form-group">
                <label class="admin-form-label">Hizmet Başlığı</label>
                <input type="text" name="title" class="admin-form-control" required placeholder="Örn: Türk Boğazları Geçiş Acenteliği">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">FontAwesome Icon Sınıfı</label>
                    <input type="text" name="icon" class="admin-form-control" value="fa-ship" required placeholder="fa-ship, fa-compass vb.">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Sıralama</label>
                    <input type="number" name="sort_order" class="admin-form-control" value="0">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Kısa Özet (Kartlarda Görünür)</label>
                <textarea name="summary" class="admin-form-control" rows="2" required></textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Detaylı Açıklama (Detay Sayfası Metni)</label>
                <textarea name="description" class="admin-form-control" rows="6" required></textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Özellikler (Her satıra bir özellik yazın)</label>
                <textarea name="features" class="admin-form-control" rows="4" placeholder="7/24 Kesintisiz Hizmet&#10;SP-1 Bildirimi&#10;Kılavuz Kaptan Tedariği"></textarea>
            </div>

            <div class="admin-form-group" style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked style="width: auto;">
                <label for="is_active" style="margin: 0; cursor: pointer;">Yayında Olsun</label>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 30px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Kaydet</button>
                <a href="{{ route('admin.services.index') }}" style="background: rgba(255,255,255,0.05); color: #FFF; padding: 12px 20px; border-radius: 8px; text-decoration: none;">İptal</a>
            </div>
        </form>
    </div>

@endsection
