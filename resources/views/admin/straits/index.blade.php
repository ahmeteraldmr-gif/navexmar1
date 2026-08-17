@extends('layouts.admin')

@section('title', 'Boğazlar & Limanlar Yönetimi - NAVEXMAR Admin')
@section('header_title', 'Türk Boğazları & Liman Teknik Verileri')

@section('content')

<div class="admin-card" style="max-width: 950px;">
    <form action="{{ route('admin.straits.update') }}" method="POST">
        @csrf

        {{-- İstanbul Boğazı --}}
        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin-bottom: 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
            <i class="fa-solid fa-water"></i> İstanbul Boğazı Teknik Özellikleri
        </h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="admin-form-group">
                <label class="admin-form-label">Toplam Uzunluk</label>
                <input type="text" name="ist_len" class="admin-form-control" value="{{ old('ist_len', $settings['ist_len']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">En Dar Nokta</label>
                <input type="text" name="ist_narrow" class="admin-form-control" value="{{ old('ist_narrow', $settings['ist_narrow']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Minimum Derinlik</label>
                <input type="text" name="ist_depth" class="admin-form-control" value="{{ old('ist_depth', $settings['ist_depth']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Maksimum Draft</label>
                <input type="text" name="ist_draft" class="admin-form-control" value="{{ old('ist_draft', $settings['ist_draft']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Maksimum LOA</label>
                <input type="text" name="ist_loa" class="admin-form-control" value="{{ old('ist_loa', $settings['ist_loa']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Akıntı Hızı</label>
                <input type="text" name="ist_current" class="admin-form-control" value="{{ old('ist_current', $settings['ist_current']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">VTS Kanalları</label>
                <input type="text" name="ist_vts" class="admin-form-control" value="{{ old('ist_vts', $settings['ist_vts']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Ön Bildirim Süresi</label>
                <input type="text" name="ist_notice" class="admin-form-control" value="{{ old('ist_notice', $settings['ist_notice']) }}">
            </div>
        </div>

        {{-- Çanakkale Boğazı --}}
        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 32px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
            <i class="fa-solid fa-compass"></i> Çanakkale Boğazı Teknik Özellikleri
        </h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="admin-form-group">
                <label class="admin-form-label">Toplam Uzunluk</label>
                <input type="text" name="cnk_len" class="admin-form-control" value="{{ old('cnk_len', $settings['cnk_len']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">En Dar Nokta</label>
                <input type="text" name="cnk_narrow" class="admin-form-control" value="{{ old('cnk_narrow', $settings['cnk_narrow']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Minimum Derinlik</label>
                <input type="text" name="cnk_depth" class="admin-form-control" value="{{ old('cnk_depth', $settings['cnk_depth']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Maksimum Draft</label>
                <input type="text" name="cnk_draft" class="admin-form-control" value="{{ old('cnk_draft', $settings['cnk_draft']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Maksimum LOA</label>
                <input type="text" name="cnk_loa" class="admin-form-control" value="{{ old('cnk_loa', $settings['cnk_loa']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Akıntı Hızı</label>
                <input type="text" name="cnk_current" class="admin-form-control" value="{{ old('cnk_current', $settings['cnk_current']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">VTS Kanalları</label>
                <input type="text" name="cnk_vts" class="admin-form-control" value="{{ old('cnk_vts', $settings['cnk_vts']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Ön Bildirim Süresi</label>
                <input type="text" name="cnk_notice" class="admin-form-control" value="{{ old('cnk_notice', $settings['cnk_notice']) }}">
            </div>
        </div>

        <div style="margin-top: 28px;">
            <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Boğaz Teknik Verilerini Kaydet</button>
        </div>
    </form>
</div>

@endsection
