@extends('layouts.admin')

@section('title', 'Dashboard - NAVEXMAR Admin Panel')
@section('header_title', __t('Genel Bakış & İstatistikler', 'Overview & Analytics'))

@section('content')

    <!-- Quick Actions Grid -->
    <div style="margin-bottom: 28px;">
        <h4 style="font-size: 0.8rem; font-weight: 700; color: var(--adm-muted); text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 14px;">{{ __t('Hızlı Yönetim Erişimi', 'Quick Management Access') }}</h4>
        <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px;">
            <a href="{{ route('admin.services.create') }}" style="background: var(--adm-card); border: 1px solid var(--adm-border); border-radius: var(--adm-radius); padding: 16px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.15s ease; box-shadow: var(--adm-shadow);" onmouseover="this.style.borderColor='var(--adm-primary)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--adm-border)'; this.style.transform='none'">
                <i class="fa-solid fa-plus-circle" style="color: var(--adm-primary); font-size: 1.4rem;"></i>
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--adm-text); text-align: center;">{{ __t('Yeni Hizmet', 'Add Service') }}</span>
            </a>
            <a href="{{ route('admin.vessels.create') }}" style="background: var(--adm-card); border: 1px solid var(--adm-border); border-radius: var(--adm-radius); padding: 16px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.15s ease; box-shadow: var(--adm-shadow);" onmouseover="this.style.borderColor='#0284C7'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--adm-border)'; this.style.transform='none'">
                <i class="fa-solid fa-ship" style="color: #0284C7; font-size: 1.4rem;"></i>
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--adm-text); text-align: center;">{{ __t('Gemi Ekle', 'Add Vessel') }}</span>
            </a>
            <a href="{{ route('admin.news.create') }}" style="background: var(--adm-card); border: 1px solid var(--adm-border); border-radius: var(--adm-radius); padding: 16px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.15s ease; box-shadow: var(--adm-shadow);" onmouseover="this.style.borderColor='#D97706'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--adm-border)'; this.style.transform='none'">
                <i class="fa-solid fa-newspaper" style="color: #D97706; font-size: 1.4rem;"></i>
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--adm-text); text-align: center;">{{ __t('Haber Ekle', 'Add News') }}</span>
            </a>
            <a href="{{ route('admin.about.index') }}" style="background: var(--adm-card); border: 1px solid var(--adm-border); border-radius: var(--adm-radius); padding: 16px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.15s ease; box-shadow: var(--adm-shadow);" onmouseover="this.style.borderColor='#059669'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--adm-border)'; this.style.transform='none'">
                <i class="fa-solid fa-building" style="color: #059669; font-size: 1.4rem;"></i>
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--adm-text); text-align: center;">{{ __t('Hakkımızda', 'About Us') }}</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" style="background: var(--adm-card); border: 1px solid var(--adm-border); border-radius: var(--adm-radius); padding: 16px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.15s ease; box-shadow: var(--adm-shadow);" onmouseover="this.style.borderColor='#7C3AED'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--adm-border)'; this.style.transform='none'">
                <i class="fa-solid fa-images" style="color: #7C3AED; font-size: 1.4rem;"></i>
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--adm-text); text-align: center;">{{ __t('Galeriyi Aç', 'Media Gallery') }}</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" style="background: var(--adm-card); border: 1px solid var(--adm-border); border-radius: var(--adm-radius); padding: 16px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.15s ease; box-shadow: var(--adm-shadow);" onmouseover="this.style.borderColor='#DC2626'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--adm-border)'; this.style.transform='none'">
                <i class="fa-solid fa-gears" style="color: #DC2626; font-size: 1.4rem;"></i>
                <span style="font-size: 0.8rem; font-weight: 700; color: var(--adm-text); text-align: center;">{{ __t('Site Ayarları', 'Site Settings') }}</span>
            </a>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 32px;">
        <div class="admin-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--adm-muted); font-weight: 600; font-size: 0.85rem;">{{ __t('Teklif Talepleri', 'Quote Requests') }}</span>
                <div style="width: 40px; height: 40px; background: #EFF6FF; border-radius: 8px; display: grid; place-items: center; color: var(--adm-primary);">
                    <i class="fa-solid fa-calculator" style="font-size: 1.2rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 800; color: var(--adm-text); line-height: 1.1;">{{ $stats['total_quotes'] }}</div>
            <div style="font-size: 0.8rem; color: #059669; margin-top: 6px; font-weight: 600;">{{ $stats['new_quotes'] }} {{ __t('yeni cevap bekliyor', 'pending response') }}</div>
        </div>

        <div class="admin-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--adm-muted); font-weight: 600; font-size: 0.85rem;">{{ __t('Gelen Mesajlar', 'Inbox Messages') }}</span>
                <div style="width: 40px; height: 40px; background: #F0F9FF; border-radius: 8px; display: grid; place-items: center; color: #0284C7;">
                    <i class="fa-solid fa-envelope" style="font-size: 1.2rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 800; color: var(--adm-text); line-height: 1.1;">{{ $stats['total_messages'] }}</div>
            <div style="font-size: 0.8rem; color: #D97706; margin-top: 6px; font-weight: 600;">{{ $stats['unread_messages'] }} {{ __t('okunmamış mesaj', 'unread message') }}</div>
        </div>

        <div class="admin-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--adm-muted); font-weight: 600; font-size: 0.85rem;">{{ __t('Aktif Hizmetler', 'Active Services') }}</span>
                <div style="width: 40px; height: 40px; background: #FEF3C7; border-radius: 8px; display: grid; place-items: center; color: #D97706;">
                    <i class="fa-solid fa-anchor" style="font-size: 1.2rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 800; color: var(--adm-text); line-height: 1.1;">{{ $stats['total_services'] }}</div>
            <div style="font-size: 0.8rem; color: var(--adm-muted); margin-top: 6px;">{{ __t('Aktif yayında', 'Currently active') }}</div>
        </div>

        <div class="admin-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="color: var(--adm-muted); font-weight: 600; font-size: 0.85rem;">{{ __t('Filo Kayıtları', 'Fleet Records') }}</span>
                <div style="width: 40px; height: 40px; background: #F3E8FF; border-radius: 8px; display: grid; place-items: center; color: #7C3AED;">
                    <i class="fa-solid fa-ship" style="font-size: 1.2rem;"></i>
                </div>
            </div>
            <div style="font-size: 2.2rem; font-weight: 800; color: var(--adm-text); line-height: 1.1;">{{ $stats['total_vessels'] }}</div>
            <div style="font-size: 0.8rem; color: var(--adm-muted); margin-top: 6px;">{{ __t('Portföyde kayıtlı', 'Registered in fleet') }}</div>
        </div>
    </div>

    <!-- Recent Quotes Table -->
    <div style="margin-bottom: 40px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">{{ __t('Son Gelen Teklif Talepleri', 'Recent Quote Requests') }}</h3>
            <a href="{{ route('admin.quotes.index') }}" style="color: var(--adm-primary); font-weight: 600; font-size: 0.85rem; text-decoration: none;">{{ __t('Tümünü Gör', 'View All') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>{{ __t('Firma / Kişi', 'Company / Contact') }}</th>
                        <th>{{ __t('Gemi Adı & Tipi', 'Vessel & Type') }}</th>
                        <th>{{ __t('Liman / Boğaz', 'Port / Strait') }}</th>
                        <th>{{ __t('Durum', 'Status') }}</th>
                        <th>{{ __t('Tarih', 'Date') }}</th>
                        <th>{{ __t('İşlem', 'Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentQuotes as $quote)
                    <tr>
                        <td>
                            <strong style="color: var(--adm-text);">{{ $quote->company_name }}</strong><br>
                            <span style="font-size:0.8rem; color: var(--adm-muted);">{{ $quote->contact_person }} ({{ $quote->phone }})</span>
                        </td>
                        <td>{{ $quote->vessel_name }} <span style="font-size:0.8rem; color: var(--adm-muted);">({{ $quote->vessel_type }})</span></td>
                        <td>{{ $quote->port_or_strait }}</td>
                        <td>
                            @if($quote->status == 'Yeni')
                                <span style="background: #FEF2F2; color: #EF4444; border: 1px solid #FECACA; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">{{ __t('Yeni', 'New') }}</span>
                            @elseif($quote->status == 'İnceleniyor')
                                <span style="background: #FEF3C7; color: #D97706; border: 1px solid #FDE68A; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">{{ __t('İnceleniyor', 'Pending') }}</span>
                            @else
                                <span style="background: #ECFDF5; color: #10B981; border: 1px solid #A7F3D0; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">{{ __t('Cevaplandı', 'Answered') }}</span>
                            @endif
                        </td>
                        <td>{{ $quote->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn-action btn-view">{{ __t('İncele', 'View') }}</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color: var(--adm-muted); padding: 32px;">{{ __t('Henüz teklif talebi bulunmuyor.', 'No quote requests yet.') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
