@extends('layouts.admin')

@section('title', 'Mesaj Detayı - NAVEXMAR Admin')
@section('header_title', 'Mesaj Detayı: ' . $message->subject)

@section('content')

    <div style="background: var(--admin-card); padding: 30px; border-radius: 12px; border: 1px solid var(--admin-border); max-width: 800px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid var(--admin-border);">
            <div><strong>Gönderen:</strong> <div style="color:#FFF;">{{ $message->name }}</div></div>
            <div><strong>E-Posta:</strong> <div style="color:var(--admin-accent);">{{ $message->email }}</div></div>
            <div><strong>Telefon:</strong> <div style="color:#FFF;">{{ $message->phone ?? 'Girilmedi' }}</div></div>
            <div><strong>Tarih:</strong> <div style="color:var(--admin-muted);">{{ $message->created_at->format('d.m.Y H:i') }}</div></div>
        </div>

        <h4 style="font-size: 1.1rem; font-weight: 700; color: #FFF; margin-bottom: 10px;">Konu: {{ $message->subject }}</h4>
        <div style="background: #070F1A; padding: 20px; border-radius: 8px; color: var(--admin-text); line-height: 1.7; margin-bottom: 30px; white-space: pre-line;">
            {{ $message->message }}
        </div>

        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.messages.index') }}" style="background: rgba(255,255,255,0.05); color: #FFF; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Geri Dön</a>
            <a href="mailto:{{ $message->email }}" class="btn-submit" style="text-decoration: none;">
                <i class="fa-solid fa-reply"></i> E-Posta ile Yanıtla
            </a>
        </div>
    </div>

@endsection
