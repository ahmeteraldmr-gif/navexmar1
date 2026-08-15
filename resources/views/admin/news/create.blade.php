@extends('layouts.admin')

@section('title', 'Yeni Duyuru Ekle - NAVEXMAR Admin')
@section('header_title', 'Yeni Haber & Sirküler Ekle')

@section('content')

    <div style="background: var(--admin-card); padding: 30px; border-radius: 12px; border: 1px solid var(--admin-border); max-width: 800px;">
        <form action="{{ route('admin.news.store') }}" method="POST">
            @csrf
            
            <div class="admin-form-group">
                <label class="admin-form-label">Başlık</label>
                <input type="text" name="title" class="admin-form-control" required placeholder="Haber veya sirküler başlığı">
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
                    <input type="text" name="author" class="admin-form-control" value="NAVEXMAR Mevzuat Departmanı">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Özet Metin</label>
                <textarea name="summary" class="admin-form-control" rows="2" required></textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Detaylı İçerik</label>
                <textarea name="content" class="admin-form-control" rows="8" required></textarea>
            </div>

            <div class="admin-form-group" style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_published" id="is_published" value="1" checked style="width: auto;">
                <label for="is_published" style="margin: 0; cursor: pointer;">Hemen Yayınla</label>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-paper-plane"></i> Yayınla</button>
                <a href="{{ route('admin.news.index') }}" style="background: rgba(255,255,255,0.05); color: #FFF; padding: 12px 20px; border-radius: 8px; text-decoration: none;">İptal</a>
            </div>
        </form>
    </div>

@endsection
