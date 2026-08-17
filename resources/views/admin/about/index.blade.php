@extends('layouts.admin')

@section('title', 'Hakkımızda Yönetimi - NAVEXMAR Admin')
@section('header_title', 'Hakkımızda Sayfası İçerikleri')

@section('content')

<div class="admin-card" style="max-width: 950px;">
    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf

        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin-bottom: 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">Header & Misyon</h4>
        
        <div class="admin-form-group">
            <label class="admin-form-label">Sayfa Hero Başlığı</label>
            <input type="text" name="about_hero_title" class="admin-form-control" value="{{ old('about_hero_title', $settings['about_hero_title']) }}">
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Sayfa Hero Açıklaması</label>
            <input type="text" name="about_hero_desc" class="admin-form-control" value="{{ old('about_hero_desc', $settings['about_hero_desc']) }}">
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Misyon Paragrafı 1</label>
            <textarea name="about_mission" class="admin-form-control" rows="3">{{ old('about_mission', $settings['about_mission']) }}</textarea>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Misyon Paragrafı 2</label>
            <textarea name="about_mission_2" class="admin-form-control" rows="3">{{ old('about_mission_2', $settings['about_mission_2']) }}</textarea>
        </div>

        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">İstatistik Sayıları</h4>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
            <div class="admin-form-group">
                <label class="admin-form-label">Deneyim Yılı</label>
                <input type="text" name="about_exp_years" class="admin-form-control" value="{{ old('about_exp_years', $settings['about_exp_years']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Gemi Çağrısı</label>
                <input type="text" name="about_calls_cnt" class="admin-form-control" value="{{ old('about_calls_cnt', $settings['about_calls_cnt']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Liman Sayısı</label>
                <input type="text" name="about_ports_cnt" class="admin-form-control" value="{{ old('about_ports_cnt', $settings['about_ports_cnt']) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Nöbet Saatleri</label>
                <input type="text" name="about_watch_cnt" class="admin-form-control" value="{{ old('about_watch_cnt', $settings['about_watch_cnt']) }}">
            </div>
        </div>

        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">Tarihçe (Zaman Çizelgesi)</h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="admin-form-group">
                <label class="admin-form-label">2006 — Başlık & Açıklama</label>
                <input type="text" name="tl_2006_title" class="admin-form-control" value="{{ old('tl_2006_title', $settings['tl_2006_title']) }}" style="margin-bottom:6px;">
                <textarea name="tl_2006_desc" class="admin-form-control" rows="2">{{ old('tl_2006_desc', $settings['tl_2006_desc']) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">2009 — Başlık & Açıklama</label>
                <input type="text" name="tl_2009_title" class="admin-form-control" value="{{ old('tl_2009_title', $settings['tl_2009_title']) }}" style="margin-bottom:6px;">
                <textarea name="tl_2009_desc" class="admin-form-control" rows="2">{{ old('tl_2009_desc', $settings['tl_2009_desc']) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">2012 — Başlık & Açıklama</label>
                <input type="text" name="tl_2012_title" class="admin-form-control" value="{{ old('tl_2012_title', $settings['tl_2012_title']) }}" style="margin-bottom:6px;">
                <textarea name="tl_2012_desc" class="admin-form-control" rows="2">{{ old('tl_2012_desc', $settings['tl_2012_desc']) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">2016 — Başlık & Açıklama</label>
                <input type="text" name="tl_2016_title" class="admin-form-control" value="{{ old('tl_2016_title', $settings['tl_2016_title']) }}" style="margin-bottom:6px;">
                <textarea name="tl_2016_desc" class="admin-form-control" rows="2">{{ old('tl_2016_desc', $settings['tl_2016_desc']) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">2021 — Başlık & Açıklama</label>
                <input type="text" name="tl_2021_title" class="admin-form-control" value="{{ old('tl_2021_title', $settings['tl_2021_title']) }}" style="margin-bottom:6px;">
                <textarea name="tl_2021_desc" class="admin-form-control" rows="2">{{ old('tl_2021_desc', $settings['tl_2021_desc']) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">2024 — Başlık & Açıklama</label>
                <input type="text" name="tl_2024_title" class="admin-form-control" value="{{ old('tl_2024_title', $settings['tl_2024_title']) }}" style="margin-bottom:6px;">
                <textarea name="tl_2024_desc" class="admin-form-control" rows="2">{{ old('tl_2024_desc', $settings['tl_2024_desc']) }}</textarea>
            </div>
        </div>

        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">Yönetim Kadrosu</h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
            <div style="background: #F8FAFC; padding: 16px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <div class="admin-form-group">
                    <label class="admin-form-label">Üye 1 Ad Soyad</label>
                    <input type="text" name="team_1_name" class="admin-form-control" value="{{ old('team_1_name', $settings['team_1_name']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Unvan</label>
                    <input type="text" name="team_1_role" class="admin-form-control" value="{{ old('team_1_role', $settings['team_1_role']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Biyografi</label>
                    <textarea name="team_1_bio" class="admin-form-control" rows="3">{{ old('team_1_bio', $settings['team_1_bio']) }}</textarea>
                </div>
            </div>

            <div style="background: #F8FAFC; padding: 16px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <div class="admin-form-group">
                    <label class="admin-form-label">Üye 2 Ad Soyad</label>
                    <input type="text" name="team_2_name" class="admin-form-control" value="{{ old('team_2_name', $settings['team_2_name']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Unvan</label>
                    <input type="text" name="team_2_role" class="admin-form-control" value="{{ old('team_2_role', $settings['team_2_role']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Biyografi</label>
                    <textarea name="team_2_bio" class="admin-form-control" rows="3">{{ old('team_2_bio', $settings['team_2_bio']) }}</textarea>
                </div>
            </div>

            <div style="background: #F8FAFC; padding: 16px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <div class="admin-form-group">
                    <label class="admin-form-label">Üye 3 Ad Soyad</label>
                    <input type="text" name="team_3_name" class="admin-form-control" value="{{ old('team_3_name', $settings['team_3_name']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Unvan</label>
                    <input type="text" name="team_3_role" class="admin-form-control" value="{{ old('team_3_role', $settings['team_3_role']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Biyografi</label>
                    <textarea name="team_3_bio" class="admin-form-control" rows="3">{{ old('team_3_bio', $settings['team_3_bio']) }}</textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 28px;">
            <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Hakkımızda İçeriklerini Kaydet</button>
        </div>
    </form>
</div>

@endsection
