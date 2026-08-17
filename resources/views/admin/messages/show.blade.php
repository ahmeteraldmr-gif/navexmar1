@extends('layouts.admin')

@section('title', 'Mesaj Detayı - NAVEXMAR Admin')
@section('header_title', 'İletişim Mesajı')

@section('content')

    <div class="admin-card" style="max-width: 850px;">
        <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--adm-text); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--adm-border);">
            {{ $message->subject }}
        </h3>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px; background: #F8FAFC; padding: 18px; border-radius: 8px; border: 1px solid var(--adm-border);">
            <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Gönderen Ad Soyad</span> <strong style="color:var(--adm-text);">{{ $message->name }}</strong></div>
            <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">E-Posta Adresi</span> <strong style="color:var(--adm-primary);">{{ $message->email }}</strong></div>
            <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Telefon</span> <strong style="color:var(--adm-text);">{{ $message->phone ?? 'Girilmedi' }}</strong></div>
            <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Gönderim Tarihi</span> <strong style="color:var(--adm-text);">{{ $message->created_at->format('d.m.Y H:i') }}</strong></div>
        </div>

        <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-text); margin-bottom: 10px;">Mesaj İçeriği</h4>
        <div style="background: #F8FAFC; padding: 20px; border-radius: 8px; border: 1px solid var(--adm-border); color: var(--adm-text); line-height: 1.7; margin-bottom: 28px; white-space: pre-line; font-size: 0.92rem;">
            {{ $message->message }}
        </div>

        <div style="display: flex; gap: 12px;">
            <a href="{{ route('admin.messages.index') }}" style="background: #F1F5F9; color: #475569; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 6px;">
                <i class="fa-solid fa-arrow-left"></i> Listeye Dön
            </a>
            <a href="mailto:{{ $message->email }}" class="btn-submit">
                <i class="fa-solid fa-reply"></i> E-Posta ile Yanıtla
            </a>
        </div>
    </div>

@endsection
