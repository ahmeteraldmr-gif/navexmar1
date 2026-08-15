@extends('layouts.admin')

@section('title', 'Gemi Düzenle - NAVEXMAR Admin')
@section('header_title', 'Gemi Kaydı Düzenle: ' . $vessel->name)

@section('content')

    <div style="background: var(--admin-card); padding: 30px; border-radius: 12px; border: 1px solid var(--admin-border); max-width: 800px;">
        <form action="{{ route('admin.vessels.update', $vessel->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Gemi Adı</label>
                    <input type="text" name="name" class="admin-form-control" value="{{ old('name', $vessel->name) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Gemi Tipi</label>
                    <input type="text" name="vessel_type" class="admin-form-control" value="{{ old('vessel_type', $vessel->vessel_type) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Bayrak (Ülke)</label>
                    <input type="text" name="flag" class="admin-form-control" value="{{ old('flag', $vessel->flag) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">IMO Numarası</label>
                    <input type="number" name="imo_number" class="admin-form-control" value="{{ old('imo_number', $vessel->imo_number) }}" required>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Gross Tonnage (GRT)</label>
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
                    <label class="admin-form-label">Operasyon Tipi</label>
                    <input type="text" name="operation_type" class="admin-form-control" value="{{ old('operation_type', $vessel->operation_type) }}" required>
                </div>
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

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Güncelle</button>
                <a href="{{ route('admin.vessels.index') }}" style="background: rgba(255,255,255,0.05); color: #FFF; padding: 12px 20px; border-radius: 8px; text-decoration: none;">İptal</a>
            </div>
        </form>
    </div>

@endsection
