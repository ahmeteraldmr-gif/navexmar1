@extends('layouts.app')

@section('title', ($news->title ?? 'Haber Detayı') . ' | NAVEXMAR')

@php
$newsFallbackImages = [
    'turk-bogazlari-deniz-trafik-duzeni-tuzugu-guncellendi' => 'images/news_rules.jpg',
    'ambarli-liman-baskanligi-su-cekimi-draft-limitleri'   => 'images/news_limits.jpg',
    'navexmar-yesil-denizcilik-ve-karbon-emisyon-danismanligi' => 'images/news_green.jpg',
];

$nImg = null;
if (!empty($news->image)) {
    $nImg = asset(ltrim($news->image, '/'));
} elseif (!empty($news->image_path)) {
    $nImg = Storage::url($news->image_path);
} elseif (isset($newsFallbackImages[$news->slug])) {
    $nImg = asset($newsFallbackImages[$news->slug]);
} else {
    $nImg = asset('images/news_rules.jpg');
}
@endphp

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-newspaper"></i> {{ $news->category ?? 'Haber & Duyuru' }}</div>
        <h1>{{ $news->title }}</h1>
        <p><i class="fa-regular fa-user" style="margin-right:4px;"></i> {{ $news->author ?? 'NAVEXMAR Operasyon' }} &nbsp;·&nbsp; <i class="fa-regular fa-calendar" style="margin-right:4px;"></i> {{ $news->created_at->format('d M Y') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto; background: white; border: 1px solid var(--border); border-radius: var(--r); padding: 36px; box-shadow: var(--shadow);">
            
            <div style="border-radius: var(--r); overflow: hidden; aspect-ratio: 16/9; margin-bottom: 28px; border: 1px solid var(--border);">
                <img src="{{ $nImg }}" alt="{{ $news->title }}" style="width:100%; height:100%; object-fit:cover;" loading="lazy">
            </div>
            
            @if($news->summary ?? $news->short_description)
            <div style="font-size: 1rem; font-weight: 600; color: var(--navy); margin-bottom: 24px; line-height: 1.65; padding-bottom: 20px; border-bottom: 1px solid var(--border);">
                {{ $news->summary ?? $news->short_description }}
            </div>
            @endif

            <div style="color: var(--muted); font-size: 0.94rem; line-height: 1.8; white-space: pre-line;">
                {{ $news->content }}
            </div>

            <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('news.index') }}" class="btn-outline"><i class="fa-solid fa-arrow-left"></i> {{ __t('Tüm Haberler', 'All News') }}</a>
                <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-envelope"></i> {{ __t('İletişime Geç', 'Contact Us') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
