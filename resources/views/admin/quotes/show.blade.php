@extends('layouts.admin')

@section('title', 'Teklif Detayı - NAVEXMAR Admin')
@section('header_title', 'Teklif Talebi #' . $quote->id . ' - ' . $quote->company_name)

@section('content')

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        <div style="background: var(--admin-card); padding: 30px; border-radius: 12px; border: 1px solid var(--admin-border);">
            <h3 style="font-size: 1.3rem; font-weight: 700; color: #FFF; margin-bottom: 20px;">Gemi & Talep Detayları</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; background: rgba(255,255,255,0.02); padding: 20px; border-radius: 8px;">
                <div><strong>Firma Adı:</strong> <div style="color:#FFF;">{{ $quote->company_name }}</div></div>
                <div><strong>Yetkili Kişi:</strong> <div style="color:#FFF;">{{ $quote->contact_person }}</div></div>
                <div><strong>E-Posta:</strong> <div style="color:var(--admin-accent);">{{ $quote->email }}</div></div>
                <div><strong>Telefon:</strong> <div style="color:#FFF;">{{ $quote->phone }}</div></div>
                <div><strong>Gemi Adı:</strong> <div style="color:#FFF; font-weight:700;">{{ $quote->vessel_name }}</div></div>
                <div><strong>Gemi Tipi:</strong> <div style="color:#FFF;">{{ $quote->vessel_type }}</div></div>
                <div><strong>Liman / Boğaz:</strong> <div style="color:var(--admin-accent); font-weight:700;">{{ $quote->port_or_strait }}</div></div>
                <div><strong>Tahmini Varış (ETA):</strong> <div style="color:#FFF;">{{ $quote->eta_date ?? 'Belirtilmedi' }}</div></div>
            </div>

            <h4 style="font-size: 1.1rem; font-weight: 700; color: #FFF; margin-bottom: 10px;">Müşteri Notları & Özel İkmal Talepleri</h4>
            <div style="background: #070F1A; padding: 16px; border-radius: 8px; color: var(--admin-muted); line-height: 1.6; margin-bottom: 30px;">
                {{ $quote->notes ?? 'Ek bir not girilmedi.' }}
            </div>

            <div style="display: flex; gap: 10px;">
                <a href="{{ route('admin.quotes.index') }}" style="background: rgba(255,255,255,0.05); color: #FFF; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Geri Dön</a>
            </div>
        </div>

        <div>
            <div style="background: var(--admin-card); padding: 24px; border-radius: 12px; border: 1px solid var(--admin-border);">
                <h4 style="font-size: 1.1rem; font-weight: 700; color: #FFF; margin-bottom: 16px;">Durum Güncelle</h4>
                
                <form action="{{ route('admin.quotes.updateStatus', $quote->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="admin-form-group">
                        <select name="status" class="admin-form-control" style="font-weight: 700;">
                            <option value="Yeni" {{ $quote->status == 'Yeni' ? 'selected' : '' }}>Yeni</option>
                            <option value="İnceleniyor" {{ $quote->status == 'İnceleniyor' ? 'selected' : '' }}>İnceleniyor</option>
                            <option value="Cevaplandı" {{ $quote->status == 'Cevaplandı' ? 'selected' : '' }}>Cevaplandı</option>
                            <option value="Arşivlendi" {{ $quote->status == 'Arşivlendi' ? 'selected' : '' }}>Arşivlendi</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit" style="width: 100%;">Durumu Kaydet</button>
                </form>
            </div>
        </div>
    </div>

@endsection
