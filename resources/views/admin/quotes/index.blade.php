@extends('layouts.admin')

@section('title', 'Teklif Talepleri - NAVEXMAR Admin')
@section('header_title', 'Acentelik Teklif Talepleri')

@section('content')

    <div style="display: flex; gap: 10px; margin-bottom: 24px;">
        <a href="{{ route('admin.quotes.index') }}" class="btn-action" style="{{ !request('status') ? 'background: var(--adm-primary); color: #FFF;' : 'background: #FFFFFF; color: var(--adm-text); border: 1px solid var(--adm-border);' }}">Tümü</a>
        <a href="{{ route('admin.quotes.index', ['status' => 'Yeni']) }}" class="btn-action" style="{{ request('status') == 'Yeni' ? 'background: var(--adm-primary); color: #FFF;' : 'background: #FFFFFF; color: var(--adm-text); border: 1px solid var(--adm-border);' }}">Yeni</a>
        <a href="{{ route('admin.quotes.index', ['status' => 'İnceleniyor']) }}" class="btn-action" style="{{ request('status') == 'İnceleniyor' ? 'background: var(--adm-primary); color: #FFF;' : 'background: #FFFFFF; color: var(--adm-text); border: 1px solid var(--adm-border);' }}">İnceleniyor</a>
        <a href="{{ route('admin.quotes.index', ['status' => 'Cevaplandı']) }}" class="btn-action" style="{{ request('status') == 'Cevaplandı' ? 'background: var(--adm-primary); color: #FFF;' : 'background: #FFFFFF; color: var(--adm-text); border: 1px solid var(--adm-border);' }}">Cevaplandı</a>
    </div>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firma & Yetkili</th>
                    <th>İletişim</th>
                    <th>Gemi & Tipi</th>
                    <th>Liman / Boğaz</th>
                    <th>Durum</th>
                    <th>Tarih</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quotes as $quote)
                <tr>
                    <td>#{{ $quote->id }}</td>
                    <td><strong style="color: var(--adm-text);">{{ $quote->company_name }}</strong><br><span style="font-size:0.78rem; color: var(--adm-muted);">{{ $quote->contact_person }}</span></td>
                    <td>{{ $quote->email }}<br><span style="font-size:0.78rem; color: var(--adm-muted);">{{ $quote->phone }}</span></td>
                    <td>{{ $quote->vessel_name }} <br><span style="font-size:0.78rem; color: var(--adm-muted);">{{ $quote->vessel_type }}</span></td>
                    <td><span style="color: var(--adm-primary); font-weight:600;">{{ $quote->port_or_strait }}</span></td>
                    <td>
                        @if($quote->status == 'Yeni')
                            <span style="background: #FEF2F2; color: #EF4444; border: 1px solid #FECACA; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">Yeni</span>
                        @elseif($quote->status == 'İnceleniyor')
                            <span style="background: #FEF3C7; color: #D97706; border: 1px solid #FDE68A; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">İnceleniyor</span>
                        @else
                            <span style="background: #ECFDF5; color: #10B981; border: 1px solid #A7F3D0; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">Cevaplandı</span>
                        @endif
                    </td>
                    <td>{{ $quote->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn-action btn-view">Detay</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; color: var(--adm-muted); padding: 32px;">Henüz teklif talebi bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $quotes->links() }}
    </div>

@endsection
