@extends('layouts.admin')

@section('title', 'Yeni Haber Ekle - NAVEXMAR Admin')
@section('header_title', 'Yeni Duyuru / Haber Oluştur')

@section('content')

    <div class="admin-card" style="max-width: 850px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--adm-border);">
            <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">Yeni Duyuru / Haber Formu</h3>
            <a href="{{ route('admin.news.index') }}" style="color: var(--adm-muted); font-size: 0.85rem; font-weight: 600; text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> Listeye Dön</a>
        </div>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="admin-form-group">
                <label class="admin-form-label">Duyuru / Haber Başlığı *</label>
                <input type="text" name="title" class="admin-form-control" value="{{ old('title') }}" placeholder="ör. Ambarlı Liman Başkanlığı Su Çekimi Limitleri" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Kategori</label>
                    <select name="category" class="admin-form-control">
                        <option value="Denizcilik Sirküleri">Denizcilik Sirküleri</option>
                        <option value="Liman Duyurusu">Liman Duyurusu</option>
                        <option value="Mevzuat Güncellemesi">Mevzuat Güncellemesi</option>
                        <option value="Kurumsal Haber">Kurumsal Haber</option>
                    </select>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Yazar / Departman</label>
                    <input type="text" name="author" class="admin-form-control" value="{{ old('author', 'NAVEXMAR Operasyon') }}">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Kapak Görseli</label>
                <input type="file" name="image" class="admin-form-control" accept="image/*">
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Özet Metin *</label>
                <textarea name="summary" class="admin-form-control" rows="2" placeholder="Haberin kısa özeti..." required>{{ old('summary') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Detaylı İçerik *</label>
                <textarea name="content" class="admin-form-control" rows="8" placeholder="Duyuru veya haber içeriğini giriniz..." required>{{ old('content') }}</textarea>
            </div>

            <div class="admin-form-group" style="display: flex; align-items: center; gap: 10px; background: #F8FAFC; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <input type="checkbox" name="is_published" id="is_published" value="1" checked style="width: 18px; height: 18px; accent-color: var(--adm-primary); cursor: pointer;">
                <label for="is_published" style="margin: 0; cursor: pointer; font-weight: 600; color: var(--adm-text);">Hemen Yayında Olsun</label>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-plus-circle"></i> Haberi Yayınla</button>
                <a href="{{ route('admin.news.index') }}" style="background: #F1F5F9; color: #475569; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem;">İptal</a>
            </div>
        </form>
    </div>

@endsection
