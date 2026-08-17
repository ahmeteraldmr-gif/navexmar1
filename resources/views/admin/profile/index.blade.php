@extends('layouts.admin')

@section('title', 'Profil & Şifre - NAVEXMAR Admin')
@section('header_title', 'Yönetici Profili & Şifre Değiştirme')

@section('content')

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 950px;">
    
    {{-- Profil Bilgileri --}}
    <div class="admin-card">
        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin-bottom: 20px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
            <i class="fa-solid fa-user-gear"></i> Profil Bilgileri
        </h4>
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="admin-form-group">
                <label class="admin-form-label">Ad Soyad</label>
                <input type="text" name="name" class="admin-form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">E-Posta Adresi</label>
                <input type="email" name="email" class="admin-form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            <div style="margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Profili Güncelle</button>
            </div>
        </form>
    </div>

    {{-- Şifre Değiştirme --}}
    <div class="admin-card">
        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin-bottom: 20px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
            <i class="fa-solid fa-key"></i> Şifre Değiştir
        </h4>
        <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            <div class="admin-form-group">
                <label class="admin-form-label">Mevcut Şifre</label>
                <input type="password" name="current_password" class="admin-form-control" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Yeni Şifre</label>
                <input type="password" name="new_password" class="admin-form-control" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Yeni Şifre (Tekrar)</label>
                <input type="password" name="new_password_confirmation" class="admin-form-control" required>
            </div>
            <div style="margin-top: 24px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-lock"></i> Şifreyi Güncelle</button>
            </div>
        </form>
    </div>

</div>

@endsection
