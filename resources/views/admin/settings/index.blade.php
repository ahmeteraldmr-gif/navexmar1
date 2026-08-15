@extends('layouts.admin')

@section('title', 'Site Ayarları - NAVEXMAR Admin')
@section('header_title', 'Site Ayarları & İletişim Bilgileri')

@section('content')

    <div style="background: var(--admin-card); padding: 30px; border-radius: 12px; border: 1px solid var(--admin-border); max-width: 800px;">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Santral Telefonu</label>
                    <input type="text" name="phone" class="admin-form-control" value="{{ old('phone', $settings['phone']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">7/24 Nöbetçi Telefon / WhatsApp</label>
                    <input type="text" name="mobile" class="admin-form-control" value="{{ old('mobile', $settings['mobile']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Kurumsal E-Posta</label>
                    <input type="email" name="email" class="admin-form-control" value="{{ old('email', $settings['email']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Çalışma Saatleri Metni</label>
                    <input type="text" name="working_hours" class="admin-form-control" value="{{ old('working_hours', $settings['working_hours']) }}">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Genel Merkez Adresi</label>
                <textarea name="address" class="admin-form-control" rows="2">{{ old('address', $settings['address']) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Kısa Kurumsal Özet (Footer Metni)</label>
                <textarea name="about_short" class="admin-form-control" rows="3">{{ old('about_short', $settings['about_short']) }}</textarea>
            </div>

            <h4 style="font-size: 1.1rem; font-weight: 700; color: #FFF; margin: 24px 0 16px;">Sosyal Medya Bağlantıları</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">LinkedIn URL</label>
                    <input type="text" name="linkedin" class="admin-form-control" value="{{ old('linkedin', $settings['linkedin']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Facebook URL</label>
                    <input type="text" name="facebook" class="admin-form-control" value="{{ old('facebook', $settings['facebook']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Instagram URL</label>
                    <input type="text" name="instagram" class="admin-form-control" value="{{ old('instagram', $settings['instagram']) }}">
                </div>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Tüm Ayarları Kaydet</button>
            </div>
        </form>
    </div>

@endsection
