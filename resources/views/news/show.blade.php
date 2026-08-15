@extends('layouts.app')

@section('title', $news->title . ' - NAVEXMAR News')

@section('content')

    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-newspaper"></i> {{ $news->category }}</div>
            <h1 class="section-heading" style="font-size: 2.5rem; max-width: 900px; margin: 0 auto 16px; color: #FFF;">{{ $news->title }}</h1>
            <div style="color: #E2E8F0; font-size: 0.9rem;">Yayınlayan: {{ $news->author }} • {{ $news->published_at ? $news->published_at->format('d.m.Y H:i') : '' }}</div>
        </div>
    </div>

    <div class="container" style="padding: 80px 0;">
        <div style="max-width: 860px; margin: 0 auto;" class="white-card">
            <img src="{{ $news->image }}" alt="{{ $news->title }}" style="width: 100%; height: 380px; object-fit: cover; border-radius: var(--radius-md); margin-bottom: 30px;">
            
            <div style="font-size: 1.15rem; font-weight: 600; color: var(--primary-blue); margin-bottom: 24px; line-height: 1.6; padding-bottom: 20px; border-bottom: 1px solid var(--border-color);">
                {{ $news->summary }}
            </div>

            <div style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; white-space: pre-line;">
                {{ $news->content }}
            </div>

            <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('news.index') }}" style="color: var(--text-muted); font-weight: 600;"><i class="fa-solid fa-arrow-left"></i> Tüm Duyurulara Dön</a>
                <div>
                    <span style="color: var(--text-light); font-size: 0.85rem; margin-right: 10px;">Paylaş:</span>
                    <a href="#" style="color: var(--primary-blue); margin-right: 8px;"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#" style="color: var(--accent-blue);"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

@endsection
