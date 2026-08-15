@extends('layouts.app')

@section('title', 'İletişim & Acentelik Teklifi Al - NAVEXMAR')

@section('content')

    <!-- Header Banner -->
    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-headset"></i> 7/24 İletişim & Teklif</div>
            <h1 class="section-heading" style="font-size: 2.8rem; color: #FFF;">Bize Ulaşın & Teklif İsteyin</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">Nöbetçi acente masamız 7 gün 24 saat tüm sorularınız ve acil operasyon talepleriniz için hazırdır.</p>
        </div>
    </div>

    <div class="container" style="padding: 80px 0;">
        
        <!-- Contact Cards Grid -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 60px;">
            <div class="white-card" style="text-align: center;">
                <i class="fa-solid fa-location-dot" style="font-size: 2.2rem; color: var(--primary-blue); margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 8px;">Genel Merkez</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">{{ \App\Models\SiteSetting::get('address') }}</p>
            </div>
            <div class="white-card" style="text-align: center;">
                <i class="fa-solid fa-phone-volume" style="font-size: 2.2rem; color: var(--primary-blue); margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 8px;">Santral & 7/24 Nöbetçi</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Tel: {{ \App\Models\SiteSetting::get('phone') }}</p>
                <p style="color: var(--primary-blue); font-weight: 700; font-size: 0.9rem; margin-top: 4px;">Acil: {{ \App\Models\SiteSetting::get('mobile') }}</p>
            </div>
            <div class="white-card" style="text-align: center;">
                <i class="fa-solid fa-envelope-open-text" style="font-size: 2.2rem; color: var(--primary-blue); margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 8px;">E-Posta & VHF</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">{{ \App\Models\SiteSetting::get('email') }}</p>
                <p style="color: var(--text-light); font-size: 0.85rem; margin-top: 4px;">VHF Ch 16 / Ch 71 (Istanbul Traffic)</p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            
            <!-- Standard Contact Form -->
            <div class="white-card">
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 20px;"><i class="fa-solid fa-paper-plane" style="color: var(--primary-blue);"></i> İletişim Formu</h3>
                
                @if(session('success'))
                    <div style="background: #DCFCE7; border: 1px solid #86EFAC; color: #15803D; padding: 14px; border-radius: 8px; margin-bottom: 20px; font-weight: 600;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; color: var(--text-main); font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Ad Soyad</label>
                        <input type="text" name="name" required style="width: 100%; padding: 12px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; color: var(--text-main);">
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; color: var(--text-main); font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">E-Posta Adresi</label>
                        <input type="email" name="email" required style="width: 100%; padding: 12px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; color: var(--text-main);">
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; color: var(--text-main); font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Telefon</label>
                        <input type="text" name="phone" style="width: 100%; padding: 12px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; color: var(--text-main);">
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; color: var(--text-main); font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Konu</label>
                        <input type="text" name="subject" required style="width: 100%; padding: 12px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; color: var(--text-main);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; color: var(--text-main); font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Mesajınız</label>
                        <textarea name="message" rows="4" required style="width: 100%; padding: 12px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; color: var(--text-main);"></textarea>
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                        <i class="fa-solid fa-paper-plane"></i> Mesajı Gönder
                    </button>
                </form>
            </div>

            <!-- Quote Request Form CTA -->
            <div id="quote-section" class="white-card" style="border-color: #BFDBFE; background: #F8FAFC;">
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 10px;"><i class="fa-solid fa-calculator" style="color: var(--primary-blue);"></i> Acentelik / Proforma Maliyet Talebi</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 20px;">Geminiz Türk Boğazları geçişi veya liman yanaşması öncesinde proforma harç cetvelini anında talep edin.</p>

                @if(session('quote_success'))
                    <div style="background: #DCFCE7; border: 1px solid #86EFAC; color: #15803D; padding: 14px; border-radius: 8px; margin-bottom: 20px; font-weight: 600;">
                        {{ session('quote_success') }}
                    </div>
                @endif

                <form action="{{ route('quote.send') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 12px;">
                        <input type="text" name="company_name" placeholder="Firma / Armatör Adı" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 12px;">
                        <input type="text" name="contact_person" placeholder="Yetkili İsim" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                        <input type="email" name="email" placeholder="E-Posta" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 12px;">
                        <input type="text" name="phone" placeholder="Telefon" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                        <input type="text" name="vessel_name" placeholder="Gemi Adı" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 12px;">
                        <select name="vessel_type" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                            <option value="Konteyner Gemisi">Konteyner Gemisi</option>
                            <option value="Ham Petrol / Ürün Tankeri">Tanker</option>
                            <option value="Dökme Yük (Bulk Carrier)">Dökme Yük</option>
                            <option value="Ro-Ro">Ro-Ro</option>
                        </select>
                        <select name="port_or_strait" required style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);">
                            <option value="İstanbul Boğazı Transit">İstanbul Boğazı</option>
                            <option value="Çanakkale Boğazı Transit">Çanakkale Boğazı</option>
                            <option value="Ambarlı Limanı">Ambarlı Limanı</option>
                            <option value="İzmit Körfezi">İzmit Körfezi</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <textarea name="notes" rows="2" placeholder="Özel talepler (Bunkering, Crew Change, vb.)..." style="width: 100%; padding: 10px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 6px; color: var(--text-main);"></textarea>
                    </div>
                    <button type="submit" class="btn-quote" style="width: 100%; justify-content: center;">
                        <i class="fa-solid fa-calculator"></i> Proforma İste
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
