@extends('layouts.app')

@section('title', 'Haberler & Denizcilik Duyuruları - NAVEXMAR')

@section('content')

    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-newspaper"></i> Sirkülerler & Duyurular</div>
            <h1 class="section-heading" style="font-size: 2.8rem; color: #FFF;">Denizcilik Haberleri & Liman Sirkülerleri</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">Türk Boğazları mevzuat güncellemeleri, liman duyuruları ve denizcilik sektör haberleri.</p>
        </div>
    </div>

    <div class="container" style="padding: 80px 0;">
        <div class="services-grid">
            @foreach($newsList as $item)
            <div class="white-card" style="padding: 0; overflow: hidden;">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" style="width: 100%; height: 210px; object-fit: cover;">
                <div style="padding: 24px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span style="background: var(--accent-soft-blue); color: var(--primary-blue); font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 4px;">
                            {{ $item->category }}
                        </span>
                        <span style="font-size: 0.8rem; color: var(--text-light);">{{ $item->published_at ? $item->published_at->format('d.m.Y') : '' }}</span>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 12px;">{{ $item->title }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 20px;">{{ Str::limit($item->summary, 120) }}</p>
                    <a href="{{ route('news.show', $item->slug) }}" style="color: var(--primary-blue); font-weight: 700; font-size: 0.9rem;">
                        Devamını Oku <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top: 40px;">
            {{ $newsList->links() }}
        </div>
    </div>

@endsection
