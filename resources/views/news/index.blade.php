@extends('layouts.app')

@section('title', 'Haberler & Denizcilik Duyuruları | NAVEXMAR')

@php
$newsFallbackImages = [
    'images/news_rules.jpg',
    'images/news_limits.jpg',
    'images/news_green.jpg',
];
@endphp

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-newspaper"></i> {{ __t('Sirkülerler & Duyurular', 'Circulars & Bulletins') }}</div>
        <h1>{{ __t('Denizcilik Haberleri & Liman Sirkülerleri', 'Maritime News & Port Circulars') }}</h1>
        <p>{{ __t('Türk Boğazları mevzuat güncellemeleri, liman başkanlığı duyuruları ve denizcilik sektör haberleri.', 'Turkish Straits regulation updates, port authority circulars, and maritime industry news.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container">
        <div class="news-grid">
            @forelse($newsList as $index => $item)
            @php
                $nImg = null;
                if (!empty($item->image)) {
                    $nImg = asset(ltrim($item->image, '/'));
                } elseif (!empty($item->image_path)) {
                    $nImg = Storage::url($item->image_path);
                } else {
                    $nImg = asset($newsFallbackImages[$index % count($newsFallbackImages)]);
                }
            @endphp
            <div class="news-card">
                <div class="news-card-img">
                    <img src="{{ $nImg }}" alt="{{ $item->title }}" loading="lazy">
                </div>
                <div class="news-body">
                    <span class="news-cat">{{ $item->category ?? 'Haber' }}</span>
                    <a href="{{ route('news.show', $item->slug) }}" class="news-title">{{ $item->title }}</a>
                    <p class="news-excerpt">{{ Str::limit($item->short_description ?? $item->summary ?? $item->content, 110) }}</p>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-top:auto; padding-top:12px; border-top:1px solid var(--border);">
                        <span class="news-date"><i class="fa-regular fa-calendar" style="margin-right:4px;"></i>{{ $item->created_at->format('d M Y') }}</span>
                        <a href="{{ route('news.show', $item->slug) }}" style="font-size:0.78rem; font-weight:700; color:var(--blue);">{{ __t('Devamını Oku', 'Read More') }} →</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px; color: var(--muted);">
                <i class="fa-solid fa-newspaper" style="font-size: 2.5rem; margin-bottom: 14px; display: block; color: var(--blue); opacity: 0.4;"></i>
                <p>{{ __t('Kayıtlı duyuru bulunamadı.', 'No announcements found.') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
