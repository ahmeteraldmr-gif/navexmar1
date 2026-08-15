@extends('layouts.admin')

@section('title', 'Dashboard - NAVEXMAR Admin Panel')
@section('header_title', 'Genel Bakış & İstatistikler')

@section('content')

    <!-- Stats Cards Grid -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
        <div style="background: var(--admin-card); padding: 24px; border-radius: 12px; border: 1px solid var(--admin-border);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--admin-muted); font-weight: 600; font-size: 0.85rem;">Teklif Talepleri</span>
                <i class="fa-solid fa-calculator" style="color: var(--admin-accent); font-size: 1.5rem;"></i>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: #FFF;">{{ $stats['total_quotes'] }}</div>
            <div style="font-size: 0.8rem; color: #34D399; margin-top: 4px;">{{ $stats['new_quotes'] }} yeni cevap bekliyor</div>
        </div>

        <div style="background: var(--admin-card); padding: 24px; border-radius: 12px; border: 1px solid var(--admin-border);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--admin-muted); font-weight: 600; font-size: 0.85rem;">Gelen Mesajlar</span>
                <i class="fa-solid fa-envelope" style="color: #38BDF8; font-size: 1.5rem;"></i>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: #FFF;">{{ $stats['total_messages'] }}</div>
            <div style="font-size: 0.8rem; color: #F59E0B; margin-top: 4px;">{{ $stats['unread_messages'] }} okunmamış mesaj</div>
        </div>

        <div style="background: var(--admin-card); padding: 24px; border-radius: 12px; border: 1px solid var(--admin-border);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--admin-muted); font-weight: 600; font-size: 0.85rem;">Aktif Hizmetler</span>
                <i class="fa-solid fa-ship" style="color: #E0A96D; font-size: 1.5rem;"></i>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: #FFF;">{{ $stats['total_services'] }}</div>
            <div style="font-size: 0.8rem; color: var(--admin-muted); margin-top: 4px;">Aktif yayında</div>
        </div>

        <div style="background: var(--admin-card); padding: 24px; border-radius: 12px; border: 1px solid var(--admin-border);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--admin-muted); font-weight: 600; font-size: 0.85rem;">Filo Kayıtları</span>
                <i class="fa-solid fa-water-ladder" style="color: #A78BFA; font-size: 1.5rem;"></i>
            </div>
            <div style="font-size: 2rem; font-weight: 800; color: #FFF;">{{ $stats['total_vessels'] }}</div>
            <div style="font-size: 0.8rem; color: var(--admin-muted); margin-top: 4px;">Portföyde kayıtlı</div>
        </div>
    </div>

    <!-- Recent Quotes Table -->
    <div style="margin-bottom: 40px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: #FFF;">Son Gelen Teklif Talepleri</h3>
            <a href="{{ route('admin.quotes.index') }}" style="color: var(--admin-accent); font-weight: 600; font-size: 0.85rem;">Tümünü Gör <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Firma / Kişi</th>
                        <th>Gemi Adı & Tipi</th>
                        <th>Liman / Boğaz</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentQuotes as $quote)
                    <tr>
                        <td>
                            <strong style="color:#FFF;">{{ $quote->company_name }}</strong><br>
                            <span style="font-size:0.8rem; color:var(--admin-muted);">{{ $quote->contact_person }} ({{ $quote->phone }})</span>
                        </td>
                        <td>{{ $quote->vessel_name }} <span style="font-size:0.8rem; color:var(--admin-muted);">({{ $quote->vessel_type }})</span></td>
                        <td>{{ $quote->port_or_strait }}</td>
                        <td>
                            @if($quote->status == 'Yeni')
                                <span style="background:rgba(239,68,68,0.2); color:#F87171; padding:4px 10px; border-radius:12px; font-weight:700; font-size:0.75rem;">Yeni</span>
                            @elseif($quote->status == 'İnceleniyor')
                                <span style="background:rgba(245,158,11,0.2); color:#FBBF24; padding:4px 10px; border-radius:12px; font-weight:700; font-size:0.75rem;">İnceleniyor</span>
                            @else
                                <span style="background:rgba(16,185,129,0.2); color:#34D399; padding:4px 10px; border-radius:12px; font-weight:700; font-size:0.75rem;">Cevaplandı</span>
                            @endif
                        </td>
                        <td>{{ $quote->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn-action btn-view">Incele</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:var(--admin-muted);">Henüz teklif talebi bulunmuyor.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
