@extends('layouts.admin')

@section('title', 'Yeni Hizmet Ekle - NAVEXMAR Admin')
@section('header_title', 'Yeni Hizmet Tanımla')

@section('content')

    <div class="admin-card" style="max-width: 850px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--adm-border);">
            <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">Yeni Hizmet Formu</h3>
            <a href="{{ route('admin.services.index') }}" style="color: var(--adm-muted); font-size: 0.85rem; font-weight: 600; text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> Listeye Dön</a>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="admin-form-group">
                <label class="admin-form-label">Hizmet Başlığı *</label>
                <input type="text" name="title" class="admin-form-control" value="{{ old('title') }}" placeholder="ör. Boğaz Transit Geçiş Acenteliği" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">FontAwesome Icon (örn: fa-ship, fa-water)</label>
                    <input type="text" name="icon" class="admin-form-control" value="{{ old('icon', 'fa-anchor') }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Sıralama</label>
                    <input type="number" name="sort_order" class="admin-form-control" value="{{ old('sort_order', 1) }}">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Hizmet Görseli</label>
                <input type="file" name="image" class="admin-form-control" accept="image/*">
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Kısa Özet *</label>
                <textarea name="summary" class="admin-form-control" rows="2" placeholder="Hizmet hakkında kısa özet..." required>{{ old('summary') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Detaylı Açıklama *</label>
                <textarea name="description" class="admin-form-control" rows="6" placeholder="Hizmet detaylarını giriniz..." required>{{ old('description') }}</textarea>
            </div>

            <div class="admin-form-group" style="display: flex; align-items: center; gap: 10px; background: #F8FAFC; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked style="width: 18px; height: 18px; accent-color: var(--adm-primary); cursor: pointer;">
                <label for="is_active" style="margin: 0; cursor: pointer; font-weight: 600; color: var(--adm-text);">Hemen Yayında Olsun</label>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-plus-circle"></i> Hizmeti Kaydet</button>
                <a href="{{ route('admin.services.index') }}" style="background: #F1F5F9; color: #475569; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem;">İptal</a>
            </div>
        </form>
    </div>

@endsection
