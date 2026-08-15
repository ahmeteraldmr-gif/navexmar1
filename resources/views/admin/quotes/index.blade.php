@extends('layouts.admin')

@section('title', 'Teklif Talepleri - NAVEXMAR Admin')
@section('header_title', 'Acentelik Teklif Talepleri')

@section('content')

    <div style="display: flex; gap: 10px; margin-bottom: 24px;">
        <a href="{{ route('admin.quotes.index') }}" class="btn-action" style="{{ !request('status') ? 'background: var(--admin-accent); color: #050B14;' : 'background: rgba(255,255,255,0.05); color: #FFF;' }}">Tümü</a>
        <a href="{{ route('admin.quotes.index', ['status' => 'Yeni']) }}" class="btn-action" style="{{ request('status') == 'Yeni' ? 'background: var(--admin-accent); color: #050B14;' : 'background: rgba(255,255,255,0.05); color: #FFF;' }}">Yeni</a>
        <a href="{{ route('admin.quotes.index', ['status' => 'İnceleniyor']) }}" class="btn-action" style="{{ request('status') == 'İnceleniyor' ? 'background: var(--admin-accent); color: #050B14;' : 'background: rgba(255,255,255,0.05); color: #FFF;' }}">İnceleniyor</a>
        <a href="{{ route('admin.quotes.index', ['status' => 'Cevaplandı']) }}" class="btn-action" style="{{ request('status') == 'Cevaplandı' ? 'background: var(--admin-accent); color: #050B14;' : 'background: rgba(255,255,255,0.05); color: #FFF;' }}">Cevaplandı</a>
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
                @foreach($quotes as $quote)
                <tr>
                    <td>#{{ $quote->id }}</td>
                    <td><strong style="color:#FFF;">{{ $quote->company_name }}</strong><br><span style="font-size:0.8rem; color:var(--admin-muted);">{{ $quote->contact_person }}</span></td>
                    <td>{{ $quote->email }}<br><span style="font-size:0.8rem; color:var(--admin-muted);">{{ $quote->phone }}</span></td>
                    <td>{{ $quote->vessel_name }} <br><span style="font-size:0.8rem; color:var(--admin-muted);">{{ $quote->vessel_type }}</span></td>
                    <td><span style="color:var(--admin-accent); font-weight:600;">{{ $quote->port_or_strait }}</span></td>
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
                        <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn-action btn-view">Detay</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $quotes->links() }}
    </div>

@endsection
