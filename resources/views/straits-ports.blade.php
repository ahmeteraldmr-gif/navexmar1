@extends('layouts.app')

@section('title', 'Türk Boğazları & Türkiye Limanları Rehberi - NAVEXMAR')

@section('content')

    <!-- Header Banner -->
    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-compass"></i> Kılavuz & Rehber</div>
            <h1 class="section-heading" style="font-size: 2.8rem; color: #FFF;">Türk Boğazları & Liman Operasyon Rehberi</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">İstanbul ve Çanakkale Boğazı transit geçiş prosedürleri, SP bildirim kuralları ve Türkiye'nin ana liman teknik spesifikasyonları.</p>
        </div>
    </div>

    <div class="container" style="padding: 80px 0;">
        
        <!-- Turkish Straits Section -->
        <div style="margin-bottom: 80px;">
            <div style="text-align: center; margin-bottom: 40px;">
                <div class="section-title-badge"><i class="fa-solid fa-water-ladder"></i> Transit Geçiş Kuralları</div>
                <h2 class="section-heading">İstanbul & Çanakkale Boğazı SP Bildirimleri</h2>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div class="white-card">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                        <div style="width: 40px; height: 40px; background: var(--accent-soft-blue); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); font-weight: 800;">1</div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-navy);">SP-1 Raporu (24 Saat Önce)</h3>
                    </div>
                    <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 16px;">
                        Türk Boğazları'ndan geçiş yapacak olan tüm gemiler (LBP 150m üzeri veya tehlikeli yük taşıyanlar), Marmara Denizi girişinden en az 24 saat önce elektronik SP-1 raporunu VTS merkezine iletmek zorundadır.
                    </p>
                    <ul style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.8; padding-left: 20px;">
                        <li>Gemi Adı, Bayrağı, IMO No, Çağrı Adı</li>
                        <li>Tam Boy (LOA), En (Beam), Max Su Çekimi (Draft)</li>
                        <li>Tehlikeli Yük Sınıfı (IMDG Code) & Miktarı</li>
                        <li>Varış Limanı & Tahmini Giriş Saati (ETA)</li>
                    </ul>
                </div>

                <div class="white-card">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                        <div style="width: 40px; height: 40px; background: var(--accent-soft-blue); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); font-weight: 800;">2</div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-navy);">SP-2 Raporu (2 Saat Önce)</h3>
                    </div>
                    <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 16px;">
                        Boğaz girişine 2 deniz mili kala (İstanbul için Türkeli/Ahırkapı, Çanakkale için Mehmetçik/Kumkale), VHF Kanal 16/11 üzerinden VTS sektörüne verilen nihai durumsal bildirimdir.
                    </p>
                    <ul style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.8; padding-left: 20px;">
                        <li>Dümen, Makine ve Navigasyon Ekipman Kontrolü</li>
                        <li>Kılavuz Kaptan (Pilot) alma durumu</li>
                        <li>Geminin anlık mevkii ve rota bilgisi</li>
                        <li>Boğaz geçiş sıra numarası onayı</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Major Ports Table Section -->
        <div>
            <div style="text-align: center; margin-bottom: 40px;">
                <div class="section-title-badge"><i class="fa-solid fa-ship"></i> Liman Özellikleri</div>
                <h2 class="section-heading">Türkiye Ana Ticari Limanları & Spesifikasyonları</h2>
                <p class="section-description" style="margin: 0 auto;">NAVEXMAR acentelik ağında yer alan ana liman kompleksleri ve teknik kapasiteleri.</p>
            </div>

            <div style="background: #FFFFFF; border: 1px solid var(--border-color); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-sm);">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #F1F5F9; border-bottom: 1px solid var(--border-color);">
                            <th style="padding: 16px 20px; color: var(--primary-navy); font-weight: 700;">Liman Kompleksi</th>
                            <th style="padding: 16px 20px; color: var(--primary-navy); font-weight: 700;">Bölge</th>
                            <th style="padding: 16px 20px; color: var(--primary-navy); font-weight: 700;">Max Su Çekimi (Draft)</th>
                            <th style="padding: 16px 20px; color: var(--primary-navy); font-weight: 700;">Ana Yük Tipleri</th>
                            <th style="padding: 16px 20px; color: var(--primary-navy); font-weight: 700;">NAVEXMAR Servisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 16px 20px; font-weight: 700; color: var(--primary-navy);">
                                <i class="fa-solid fa-anchor" style="color: var(--primary-blue); margin-right: 8px;"></i> Ambarlı Liman Kompleksi (Marport/Kumport)
                            </td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">İstanbul / Marmara</td>
                            <td style="padding: 16px 20px; color: var(--primary-blue); font-weight: 700;">16.5 Metre</td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Konteyner, Ro-Ro, Sıvı Yük</td>
                            <td style="padding: 16px 20px;"><span style="background: #DCFCE7; color: #15803D; padding: 4px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 700;">7/24 Tam Acentelik</span></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 16px 20px; font-weight: 700; color: var(--primary-navy);">
                                <i class="fa-solid fa-anchor" style="color: var(--primary-blue); margin-right: 8px;"></i> İzmit Körfez Limanları (Yılport/Evyap/DP World)
                            </td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Kocaeli / Marmara</td>
                            <td style="padding: 16px 20px; color: var(--primary-blue); font-weight: 700;">17.5 Metre</td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Konteyner, Genel Kargo, Araç (Ro-Ro)</td>
                            <td style="padding: 16px 20px;"><span style="background: #DCFCE7; color: #15803D; padding: 4px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 700;">7/24 Tam Acentelik</span></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 16px 20px; font-weight: 700; color: var(--primary-navy);">
                                <i class="fa-solid fa-anchor" style="color: var(--primary-blue); margin-right: 8px;"></i> Aliağa Limanlar Bölgesi (Nemrut Bay)
                            </td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">İzmir / Ege</td>
                            <td style="padding: 16px 20px; color: var(--primary-blue); font-weight: 700;">19.0 Metre</td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Ham Petrol, LPG, Hurda Demir, Dökme Yük</td>
                            <td style="padding: 16px 20px;"><span style="background: #DCFCE7; color: #15803D; padding: 4px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 700;">7/24 Tam Acentelik</span></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 16px 20px; font-weight: 700; color: var(--primary-navy);">
                                <i class="fa-solid fa-anchor" style="color: var(--primary-blue); margin-right: 8px;"></i> Mersin Uluslararası Limanı (MIP)
                            </td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Mersin / Doğu Akdeniz</td>
                            <td style="padding: 16px 20px; color: var(--primary-blue); font-weight: 700;">15.8 Metre</td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Konteyner, Reefer, Proje Yük, Tahıl</td>
                            <td style="padding: 16px 20px;"><span style="background: #DCFCE7; color: #15803D; padding: 4px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 700;">7/24 Tam Acentelik</span></td>
                        </tr>
                        <tr>
                            <td style="padding: 16px 20px; font-weight: 700; color: var(--primary-navy);">
                                <i class="fa-solid fa-anchor" style="color: var(--primary-blue); margin-right: 8px;"></i> Gemlik Limanlar Bölgesi (Borusan/Gemport)
                            </td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Bursa / Marmara</td>
                            <td style="padding: 16px 20px; color: var(--primary-blue); font-weight: 700;">14.5 Metre</td>
                            <td style="padding: 16px 20px; color: var(--text-muted);">Otomotiv, Rulo Sac, Konteyner</td>
                            <td style="padding: 16px 20px;"><span style="background: #DCFCE7; color: #15803D; padding: 4px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 700;">7/24 Tam Acentelik</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="margin-top: 50px; text-align: center;">
            <a href="{{ route('contact') }}#quote-section" class="btn-quote" style="font-size: 1rem; padding: 14px 32px;">
                <i class="fa-solid fa-calculator"></i> Liman & Boğaz Maliyet Hesaplaması İsteyin
            </a>
        </div>

    </div>

@endsection
