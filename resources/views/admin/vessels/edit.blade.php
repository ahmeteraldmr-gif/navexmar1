@extends('layouts.admin')

@section('title', 'Gemi Düzenle - NAVEXMAR Admin')
@section('header_title', 'Gemi Kaydı Düzenle')

@section('content')

    <div class="admin-card" style="max-width: 850px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--adm-border);">
            <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">{{ $vessel->name }}</h3>
            <a href="{{ route('admin.vessels.index') }}" style="color: var(--adm-muted); font-size: 0.85rem; font-weight: 600; text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> Listeye Dön</a>
        </div>

        <form action="{{ route('admin.vessels.update', $vessel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Gemi Adı *</label>
                    <input type="text" name="name" class="admin-form-control" value="{{ old('name', $vessel->name) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Gemi Tipi *</label>
                    <input type="text" name="vessel_type" class="admin-form-control" value="{{ old('vessel_type', $vessel->type ?? $vessel->vessel_type) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Bayrak (Ülke) *</label>
                    <input type="text" name="flag" class="admin-form-control" value="{{ old('flag', $vessel->flag) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">IMO Numarası *</label>
                    <input type="number" name="imo_number" class="admin-form-control" value="{{ old('imo_number', $vessel->imo_number) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Gross Tonnage (GRT) *</label>
                    <input type="number" name="grt" class="admin-form-control" value="{{ old('grt', $vessel->grt) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Deadweight (DWT)</label>
                    <input type="number" name="dwt" class="admin-form-control" value="{{ old('dwt', $vessel->dwt) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Son Liman / Mevkii</label>
                    <input type="text" name="last_port" class="admin-form-control" value="{{ old('last_port', $vessel->last_port) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Operasyon Tipi *</label>
                    <input type="text" name="operation_type" class="admin-form-control" value="{{ old('operation_type', $vessel->operation_type) }}" required>
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Gemi Fotoğrafı</label>
                @if($vessel->image_path)
                    <div style="margin-bottom: 10px; display: flex; align-items: center; gap: 14px; background: #F8FAFC; padding: 10px; border-radius: 8px; border: 1px solid var(--adm-border);">
                        <img src="{{ Storage::url($vessel->image_path) }}" alt="{{ $vessel->name }}" style="width: 90px; height: 50px; object-fit: cover; border-radius: 6px;">
                        <span style="font-size: 0.8rem; color: var(--adm-muted);">Mevcut Görsel Yüklü</span>
                    </div>
                @endif
                <input type="file" name="image" class="admin-form-control" accept="image/*">
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Durum</label>
                <select name="status" class="admin-form-control">
                    <option value="Tamamlandı" {{ $vessel->status == 'Tamamlandı' ? 'selected' : '' }}>Tamamlandı</option>
                    <option value="Devam Ediyor" {{ $vessel->status == 'Devam Ediyor' ? 'selected' : '' }}>Devam Ediyor</option>
                    <option value="Beklemede" {{ $vessel->status == 'Beklemede' ? 'selected' : '' }}>Beklemede</option>
                </select>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Operasyon Detayları / Notlar</label>
                <textarea name="details" class="admin-form-control" rows="3">{{ old('details', $vessel->details) }}</textarea>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Güncelle ve Kaydet</button>
                <a href="{{ route('admin.vessels.index') }}" style="background: #F1F5F9; color: #475569; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem;">İptal</a>
            </div>
        </form>
    </div>

@endsection
