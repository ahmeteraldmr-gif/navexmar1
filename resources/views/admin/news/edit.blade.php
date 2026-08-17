@extends('layouts.admin')

@section('title', 'Haber Düzenle - NAVEXMAR Admin')
@section('header_title', 'Duyuru / Haber Düzenle')

@section('content')

    <div class="admin-card" style="max-width: 850px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--adm-border);">
            <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">{{ $news->title }}</h3>
            <a href="{{ route('admin.news.index') }}" style="color: var(--adm-muted); font-size: 0.85rem; font-weight: 600; text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> Listeye Dön</a>
        </div>

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="admin-form-group">
                <label class="admin-form-label">Duyuru / Haber Başlığı *</label>
                <input type="text" name="title" class="admin-form-control" value="{{ old('title', $news->title) }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Kategori</label>
                    <select name="category" class="admin-form-control">
                        <option value="Denizcilik Sirküleri" {{ $news->category == 'Denizcilik Sirküleri' ? 'selected' : '' }}>Denizcilik Sirküleri</option>
                        <option value="Liman Duyurusu" {{ $news->category == 'Liman Duyurusu' ? 'selected' : '' }}>Liman Duyurusu</option>
                        <option value="Mevzuat Güncellemesi" {{ $news->category == 'Mevzuat Güncellemesi' ? 'selected' : '' }}>Mevzuat Güncellemesi</option>
                        <option value="Kurumsal Haber" {{ $news->category == 'Kurumsal Haber' ? 'selected' : '' }}>Kurumsal Haber</option>
                    </select>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Yazar / Departman</label>
                    <input type="text" name="author" class="admin-form-control" value="{{ old('author', $news->author) }}">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Kapak Görseli</label>
                @if($news->image_path)
                    <div style="margin-bottom: 10px; display: flex; align-items: center; gap: 14px; background: #F8FAFC; padding: 10px; border-radius: 8px; border: 1px solid var(--adm-border);">
                        <img src="{{ Storage::url($news->image_path) }}" alt="{{ $news->title }}" style="width: 90px; height: 50px; object-fit: cover; border-radius: 6px;">
                        <span style="font-size: 0.8rem; color: var(--adm-muted);">Mevcut Görsel Yüklü</span>
                    </div>
                @endif
                <input type="file" name="image" class="admin-form-control" accept="image/*">
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Özet Metin *</label>
                <textarea name="summary" class="admin-form-control" rows="2" required>{{ old('summary', $news->summary) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Detaylı İçerik *</label>
                <textarea name="content" class="admin-form-control" rows="8" required>{{ old('content', $news->content) }}</textarea>
            </div>

            <div class="admin-form-group" style="display: flex; align-items: center; gap: 10px; background: #F8FAFC; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <input type="checkbox" name="is_published" id="is_published" value="1" {{ $news->is_published ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--adm-primary); cursor: pointer;">
                <label for="is_published" style="margin: 0; cursor: pointer; font-weight: 600; color: var(--adm-text);">Sitede Yayında Olsun</label>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Güncelle ve Kaydet</button>
                <a href="{{ route('admin.news.index') }}" style="background: #F1F5F9; color: #475569; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem;">İptal</a>
            </div>
        </form>
    </div>

@endsection
