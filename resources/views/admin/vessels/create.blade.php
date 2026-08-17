@extends('layouts.admin')

@section('title', 'Yeni Gemi Ekle - NAVEXMAR Admin')
@section('header_title', 'Yeni Gemi Kaydı Ekle')

@section('content')

    <div class="admin-card" style="max-width: 850px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--adm-border);">
            <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">Yeni Gemi Formu</h3>
            <a href="{{ route('admin.vessels.index') }}" style="color: var(--adm-muted); font-size: 0.85rem; font-weight: 600; text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> Listeye Dön</a>
        </div>

        <form action="{{ route('admin.vessels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Gemi Adı *</label>
                    <input type="text" name="name" class="admin-form-control" value="{{ old('name') }}" placeholder="ör. MV ATLAS STAR" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Gemi Tipi *</label>
                    <input type="text" name="vessel_type" class="admin-form-control" value="{{ old('vessel_type') }}" placeholder="ör. Konteyner Gemisi / Tanker" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Bayrak (Ülke) *</label>
                    <input type="text" name="flag" class="admin-form-control" value="{{ old('flag') }}" placeholder="ör. Marshall Islands / Türkiye" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">IMO Numarası *</label>
                    <input type="number" name="imo_number" class="admin-form-control" value="{{ old('imo_number') }}" placeholder="ör. 9845123" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Gross Tonnage (GRT) *</label>
                    <input type="number" name="grt" class="admin-form-control" value="{{ old('grt') }}" placeholder="ör. 45200" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Deadweight (DWT)</label>
                    <input type="number" name="dwt" class="admin-form-control" value="{{ old('dwt') }}" placeholder="ör. 65000">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Son Liman / Mevkii</label>
                    <input type="text" name="last_port" class="admin-form-control" value="{{ old('last_port') }}" placeholder="ör. Ambarlı Limanı">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Operasyon Tipi *</label>
                    <input type="text" name="operation_type" class="admin-form-control" value="{{ old('operation_type') }}" placeholder="ör. Liman İkmali & Acentelik" required>
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Gemi Fotoğrafı</label>
                <input type="file" name="image" class="admin-form-control" accept="image/*">
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Durum</label>
                <select name="status" class="admin-form-control">
                    <option value="Devam Ediyor">Devam Ediyor</option>
                    <option value="Tamamlandı">Tamamlandı</option>
                    <option value="Beklemede">Beklemede</option>
                </select>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Operasyon Detayları / Notlar</label>
                <textarea name="details" class="admin-form-control" rows="3" placeholder="Operasyon notlarını ekleyin...">{{ old('details') }}</textarea>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-plus-circle"></i> Gemiyi Kaydet</button>
                <a href="{{ route('admin.vessels.index') }}" style="background: #F1F5F9; color: #475569; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem;">İptal</a>
            </div>
        </form>
    </div>

@endsection
