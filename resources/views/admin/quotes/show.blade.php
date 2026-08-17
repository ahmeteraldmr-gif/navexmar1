@extends('layouts.admin')

@section('title', 'Teklif Detayı - NAVEXMAR Admin')
@section('header_title', 'Teklif Talepleri')

@section('content')

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; max-width: 1050px;">
        <div class="admin-card">
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--adm-text); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--adm-border);">
                Teklif Talepleri #{{ $quote->id }} — {{ $quote->company_name }}
            </h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 28px; background: #F8FAFC; padding: 20px; border-radius: 8px; border: 1px solid var(--adm-border);">
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Firma Adı</span> <strong style="color:var(--adm-text);">{{ $quote->company_name }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Yetkili Kişi</span> <strong style="color:var(--adm-text);">{{ $quote->contact_person }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">E-Posta</span> <strong style="color:var(--adm-primary);">{{ $quote->email }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Telefon</span> <strong style="color:var(--adm-text);">{{ $quote->phone }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Gemi Adı</span> <strong style="color:var(--adm-text);">{{ $quote->vessel_name }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Gemi Tipi</span> <strong style="color:var(--adm-text);">{{ $quote->vessel_type }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Liman / Boğaz</span> <strong style="color:var(--adm-primary);">{{ $quote->port_or_strait }}</strong></div>
                <div><span style="font-size:0.78rem; color:var(--adm-muted); display:block;">Tahmini Varış (ETA)</span> <strong style="color:var(--adm-text);">{{ $quote->eta_date ?? 'Belirtilmedi' }}</strong></div>
            </div>

            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-text); margin-bottom: 10px;">Müşteri Notları & Özel İkmal Talepleri</h4>
            <div style="background: #F8FAFC; padding: 16px; border-radius: 8px; border: 1px solid var(--adm-border); color: var(--adm-text); line-height: 1.6; margin-bottom: 28px; font-size: 0.9rem;">
                {{ $quote->notes ?? 'Ek bir not girilmedi.' }}
            </div>

            <div>
                <a href="{{ route('admin.quotes.index') }}" style="background: #F1F5F9; color: #475569; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-arrow-left"></i> Listeye Dön
                </a>
            </div>
        </div>

        <div>
            <div class="admin-card">
                <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-text); margin-bottom: 16px;">Durum Güncelle</h4>
                
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

                    <button type="submit" class="btn-submit" style="width: 100%; justify-content: center;">Durumu Kaydet</button>
                </form>
            </div>
        </div>
    </div>

@endsection
