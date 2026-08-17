@extends('layouts.app')
@section('title', 'Boğazlar & Limanlar | NAVEXMAR — Türk Boğazları Geçiş Rehberi')

@section('styles')
<style>
/* ─── STRAIT CARDS ─── */
.strait-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 48px;
}
.strait-card {
    position: relative;
    border-radius: var(--r);
    overflow: hidden;
    aspect-ratio: 16/9;
}
.strait-card img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}
.strait-card:hover img { transform: scale(1.04); }
.strait-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(11,37,69,0.85) 0%, rgba(11,37,69,0.1) 60%);
}
.strait-body {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 20px 22px; z-index: 2;
}
.strait-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.3);
    color: #fff;
    padding: 3px 12px; border-radius: 99px;
    font-size: 0.7rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.5px;
    margin-bottom: 8px;
}
.strait-title {
    font-size: 1.25rem; font-weight: 700;
    color: white; margin-bottom: 4px; letter-spacing: -0.2px;
}
.strait-sub { font-size: 0.78rem; color: rgba(255,255,255,0.8); }

/* ─── SPEC TABLE ─── */
.spec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
.spec-box {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    overflow: hidden;
}
.spec-box-head {
    background: var(--navy);
    padding: 12px 18px;
    display: flex; align-items: center; gap: 8px;
}
.spec-box-head i { color: #90CAF9; }
.spec-box-head h4 {
    font-size: 0.84rem; font-weight: 700;
    color: white; font-family: 'Inter', sans-serif;
}
.spec-row {
    display: flex; justify-content: space-between;
    padding: 9px 18px;
    border-bottom: 1px solid var(--border);
    font-size: 0.83rem;
}
.spec-row:last-child { border-bottom: none; }
.spec-lbl { color: var(--muted); }
.spec-val { color: var(--navy); font-weight: 600; }

/* ─── PORT CARDS ─── */
.port-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
.port-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    overflow: hidden;
    transition: box-shadow 0.2s, transform 0.2s;
}
.port-card:hover { box-shadow: var(--shadow-lg); transform: translateY(-3px); }
.port-card-head {
    background: var(--sky);
    padding: 14px 16px;
    display: flex; align-items: center; gap: 10px;
    border-bottom: 1px solid var(--border);
}
.port-card-icon {
    width: 36px; height: 36px;
    background: var(--blue); border-radius: 6px;
    display: grid; place-items: center;
    color: white; font-size: 0.85rem; flex-shrink: 0;
}
.port-card-name {
    font-size: 0.9rem; font-weight: 700;
    color: var(--navy);
}
.port-card-loc { font-size: 0.73rem; color: var(--muted); }
.port-body { padding: 12px 16px; }
.port-row {
    display: flex; justify-content: space-between;
    font-size: 0.8rem; padding: 6px 0;
    border-bottom: 1px dashed var(--border);
}
.port-row:last-child { border-bottom: none; }
.port-row-lbl { color: var(--muted); }
.port-row-val { color: var(--navy); font-weight: 600; }

/* ─── REGULATION CARDS ─── */
.reg-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.reg-card {
    background: white;
    border: 1px solid var(--border);
    border-left: 4px solid var(--blue);
    border-radius: var(--r);
    padding: 18px 20px;
}
.reg-card-head {
    display: flex; align-items: center; gap: 8px;
    margin-bottom: 8px;
}
.reg-card-head i { color: var(--blue); }
.reg-card-head h4 {
    font-size: 0.88rem; font-weight: 700;
    color: var(--navy); font-family: 'Inter', sans-serif;
}
.reg-card p { font-size: 0.81rem; color: var(--muted); line-height: 1.65; }
.reg-card p strong { color: var(--navy); }

@media (max-width: 1024px) {
    .strait-grid { grid-template-columns: 1fr; }
    .port-grid { grid-template-columns: 1fr 1fr; }
    .reg-grid { grid-template-columns: 1fr; }
    .spec-grid { grid-template-columns: 1fr; }
}
@media (max-width: 640px) {
    .port-grid { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-compass"></i> {{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</div>
        <h1>{{ __t('Operasyon Coğrafyamız', 'Our Operational Geography') }}</h1>
        <p>{{ __t('İstanbul ve Çanakkale Boğazları ile Türkiye\'nin başlıca limanlarında 7/24 kesintisiz acentelik hizmetleri.', 'Uninterrupted 24/7 shipping agency attendance in Bosphorus, Dardanelles and all ports of Turkey.') }}</p>
    </div>
</div>

{{-- BOĞAZ KARTI --}}
<section class="sec sec-alt">
    <div class="container">
        <div class="sec-label">{{ __t('Türk Boğazları', 'Turkish Straits') }}</div>
        <h2 class="sec-title" style="margin-bottom: 24px;">{{ __t('İki Boğaz, Tek Uzman Acente', 'Two Straits, One Expert Agency') }}</h2>

        <div class="strait-grid">
            <div class="strait-card">
                <img src="{{ asset('images/svc_strait_transit.jpg') }}" alt="İstanbul Boğazı" loading="lazy">
                <div class="strait-overlay"></div>
                <div class="strait-body">
                    <div class="strait-badge"><span style="width:6px;height:6px;background:#4CAF50;border-radius:50%;display:inline-block;"></span> {{ __t('Geçişe Açık', 'Open to Transit') }}</div>
                    <div class="strait-title">{{ __t('İstanbul Boğazı', 'Bosphorus Strait') }}</div>
                    <div class="strait-sub">31 km · {{ __t('En dar', 'Narrowest') }}: 700 m · {{ __t('Maks. draft', 'Max draft') }}: 17 m · VHF Ch 12</div>
                </div>
            </div>
            <div class="strait-card">
                <img src="{{ asset('images/hero_bosphorus.jpg') }}" alt="Çanakkale Boğazı" loading="lazy">
                <div class="strait-overlay"></div>
                <div class="strait-body">
                    <div class="strait-badge"><span style="width:6px;height:6px;background:#4CAF50;border-radius:50%;display:inline-block;"></span> {{ __t('Geçişe Açık', 'Open to Transit') }}</div>
                    <div class="strait-title">{{ __t('Çanakkale Boğazı', 'Dardanelles Strait') }}</div>
                    <div class="strait-sub">61 km · {{ __t('En dar', 'Narrowest') }}: 1.200 m · {{ __t('Maks. draft', 'Max draft') }}: 23 m · VHF Ch 67</div>
                </div>
            </div>
        </div>

        {{-- TEKNİK VERİLER --}}
        <div class="spec-grid">
            <div class="spec-box">
                <div class="spec-box-head">
                    <i class="fa-solid fa-anchor"></i>
                    <h4>{{ __t('İstanbul Boğazı — Teknik Veriler', 'Bosphorus Strait — Technical Specifications') }}</h4>
                </div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Toplam Uzunluk', 'Total Length') }}</span><span class="spec-val">31 km</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('En Dar Nokta', 'Narrowest Point') }}</span><span class="spec-val">700 m (Anadoluhisarı)</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Min. Derinlik', 'Min. Depth') }}</span><span class="spec-val">36 m</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Maks. Draft (Tanker)', 'Max. Draft (Tanker)') }}</span><span class="spec-val">17,0 m</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Maks. LOA', 'Max. LOA') }}</span><span class="spec-val">330 m</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Akıntı Hızı', 'Current Speed') }}</span><span class="spec-val">3–4 knot (N→S)</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('VTS Kanalı', 'VTS Channel') }}</span><span class="spec-val">Ch 12 / Ch 11</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Ön Bildirim', 'Pre-Notice') }}</span><span class="spec-val">{{ __t('24 saat önceden', '24 hours prior') }}</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Pilotaj', 'Pilotage') }}</span><span class="spec-val">{{ __t('500 GRT üstü zorunlu', 'Compulsory >500 GRT') }}</span></div>
            </div>
            <div class="spec-box">
                <div class="spec-box-head">
                    <i class="fa-solid fa-anchor"></i>
                    <h4>{{ __t('Çanakkale Boğazı — Teknik Veriler', 'Dardanelles Strait — Technical Specifications') }}</h4>
                </div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Toplam Uzunluk', 'Total Length') }}</span><span class="spec-val">61 km</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('En Dar Nokta', 'Narrowest Point') }}</span><span class="spec-val">1.200 m (Nara Point)</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Min. Derinlik', 'Min. Depth') }}</span><span class="spec-val">55 m</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Maks. Draft', 'Max. Draft') }}</span><span class="spec-val">23,0 m</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Maks. LOA', 'Max. LOA') }}</span><span class="spec-val">350 m</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Akıntı Hızı', 'Current Speed') }}</span><span class="spec-val">1–2 knot</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('VTS Kanalı', 'VTS Channel') }}</span><span class="spec-val">Ch 67 / Ch 14</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Ön Bildirim', 'Pre-Notice') }}</span><span class="spec-val">{{ __t('24 saat önceden', '24 hours prior') }}</span></div>
                <div class="spec-row"><span class="spec-lbl">{{ __t('Demirleme', 'Anchorage') }}</span><span class="spec-val">{{ __t('Gelibolu açıkları', 'Gelibolu Roads') }}</span></div>
            </div>
        </div>
    </div>
</section>

{{-- LİMANLAR --}}
<section class="sec">
    <div class="container">
        <div class="sec-label">{{ __t('Türkiye Limanları', 'Turkish Ports') }}</div>
        <h2 class="sec-title" style="margin-bottom: 24px;">{{ __t('Hizmet Verdiğimiz Limanlar', 'Ports We Serve') }}</h2>

        <div class="port-grid">
            <div class="port-card">
                <div class="port-card-head">
                    <div class="port-card-icon"><i class="fa-solid fa-ship"></i></div>
                    <div>
                        <div class="port-card-name">{{ __t('Ambarlı Limanı', 'Ambarli Port') }}</div>
                        <div class="port-card-loc">İstanbul, Marmara</div>
                    </div>
                </div>
                <div class="port-body">
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Maks. Draft', 'Max Draft') }}</span><span class="port-row-val">16 m</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Yıllık Kapasite', 'Annual Capacity') }}</span><span class="port-row-val">3,5M TEU</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Terminaller', 'Terminals') }}</span><span class="port-row-val">Marport, ASYAPORT</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Operasyon', 'Operations') }}</span><span class="port-row-val">7/24</span></div>
                </div>
            </div>

            <div class="port-card">
                <div class="port-card-head">
                    <div class="port-card-icon"><i class="fa-solid fa-anchor"></i></div>
                    <div>
                        <div class="port-card-name">{{ __t('Haydarpaşa Limanı', 'Haydarpasa Port') }}</div>
                        <div class="port-card-loc">İstanbul, Asian Side</div>
                    </div>
                </div>
                <div class="port-body">
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Maks. Draft', 'Max Draft') }}</span><span class="port-row-val">12 m</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Rıhtım', 'Berths') }}</span><span class="port-row-val">4 {{ __t('adet', 'berths') }}</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Yük Tipi', 'Cargo Type') }}</span><span class="port-row-val">Genel Kargo, Ro-Ro</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Demiryolu', 'Railway') }}</span><span class="port-row-val">{{ __t('Mevcut', 'Available') }}</span></div>
                </div>
            </div>

            <div class="port-card">
                <div class="port-card-head">
                    <div class="port-card-icon"><i class="fa-solid fa-industry"></i></div>
                    <div>
                        <div class="port-card-name">{{ __t('İzmit Körfezi', 'Gulf of Izmit') }}</div>
                        <div class="port-card-loc">Kocaeli, Marmara East</div>
                    </div>
                </div>
                <div class="port-body">
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Maks. Draft', 'Max Draft') }}</span><span class="port-row-val">14 m</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Terminaller', 'Terminals') }}</span><span class="port-row-val">AKSA, DİLİSKELESİ</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Yük Tipi', 'Cargo Type') }}</span><span class="port-row-val">Oil, LPG, Bulk</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Çevre', 'Environment') }}</span><span class="port-row-val">Gulf sheltered</span></div>
                </div>
            </div>

            <div class="port-card">
                <div class="port-card-head">
                    <div class="port-card-icon"><i class="fa-solid fa-waves"></i></div>
                    <div>
                        <div class="port-card-name">{{ __t('İzmir Limanı', 'Izmir Port') }}</div>
                        <div class="port-card-loc">İzmir, Aegean</div>
                    </div>
                </div>
                <div class="port-body">
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Maks. Draft', 'Max Draft') }}</span><span class="port-row-val">13 m</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Yıllık Kapasite', 'Annual Capacity') }}</span><span class="port-row-val">1,2M TEU</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Terminaller', 'Terminals') }}</span><span class="port-row-val">EGELİMAN, ALSANCAK</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Bölge', 'Region') }}</span><span class="port-row-val">Aegean hub</span></div>
                </div>
            </div>

            <div class="port-card">
                <div class="port-card-head">
                    <div class="port-card-icon"><i class="fa-solid fa-oil-well"></i></div>
                    <div>
                        <div class="port-card-name">{{ __t('Mersin Limanı', 'Mersin Port') }}</div>
                        <div class="port-card-loc">Mersin, Mediterranean</div>
                    </div>
                </div>
                <div class="port-body">
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Maks. Draft', 'Max Draft') }}</span><span class="port-row-val">15 m</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Terminaller', 'Terminals') }}</span><span class="port-row-val">MIP, Petkim Jetty</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Serbest Bölge', 'Free Zone') }}</span><span class="port-row-val">{{ __t('Mevcut', 'Available') }}</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Bölge', 'Region') }}</span><span class="port-row-val">Med hub</span></div>
                </div>
            </div>

            <div class="port-card">
                <div class="port-card-head">
                    <div class="port-card-icon"><i class="fa-solid fa-mountain"></i></div>
                    <div>
                        <div class="port-card-name">{{ __t('Trabzon Limanı', 'Trabzon Port') }}</div>
                        <div class="port-card-loc">Trabzon, Black Sea</div>
                    </div>
                </div>
                <div class="port-body">
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Maks. Draft', 'Max Draft') }}</span><span class="port-row-val">11 m</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Yük Tipi', 'Cargo Type') }}</span><span class="port-row-val">General Cargo, Bulk</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Transit', 'Transit') }}</span><span class="port-row-val">Caucasus corridor</span></div>
                    <div class="port-row"><span class="port-row-lbl">{{ __t('Bölge', 'Region') }}</span><span class="port-row-val">Black Sea East</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MEVZUAT --}}
<section class="sec sec-alt">
    <div class="container">
        <div class="sec-label">{{ __t('Mevzuat', 'Regulations') }}</div>
        <h2 class="sec-title" style="margin-bottom: 24px;">{{ __t('Boğaz Geçişi Yasal Çerçevesi', 'Straits Transit Legal Framework') }}</h2>

        <div class="reg-grid">
            <div class="reg-card">
                <div class="reg-card-head">
                    <i class="fa-solid fa-clock"></i>
                    <h4>{{ __t('Ön Bildirim Zorunluluğu', 'Pre-Notification Requirement') }}</h4>
                </div>
                <p>{{ __t('Her iki boğazdan geçiş yapacak gemilerin en geç 24 saat önce Kıyı Emniyeti Genel Müdürlüğü\'ne bildirimde bulunması zorunludur. Tehlikeli yük taşıyan gemiler için bu süre 48 saattir.', 'Vessels transiting both straits must submit pre-notice to Coastal Safety at least 24 hours prior. For dangerous cargo, pre-notice is 48 hours.') }}</p>
            </div>

            <div class="reg-card">
                <div class="reg-card-head">
                    <i class="fa-solid fa-user-tie"></i>
                    <h4>{{ __t('Pilotaj Gereklilikleri', 'Pilotage Requirements') }}</h4>
                </div>
                <p>{{ __t('İstanbul Boğazı\'nda 500 GRT üstü tüm gemiler için pilotaj zorunludur. Çanakkale Boğazı\'nda büyük tonajlı ve tehlikeli yük taşıyan gemiler için pilotaj şiddetle tavsiye edilir.', 'Pilotage is compulsory in the Bosphorus for all vessels over 500 GRT. In Dardanelles, pilotage is strongly recommended for large tonnage and hazmat ships.') }}</p>
            </div>

            <div class="reg-card">
                <div class="reg-card-head">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h4>{{ __t('Tehlikeli Yük Kısıtlamaları', 'Hazardous Cargo Restrictions') }}</h4>
                </div>
                <p>{{ __t('Nükleer, radyoaktif veya belirli kimyasal yükler taşıyan gemilerin boğazlardan geçişi için özel izin ve koordinasyon gerekmektedir. NAVEXMAR bu süreçleri eksiksiz yönetir.', 'Special clearance & coordination is required for nuclear, radioactive or toxic chemical cargoes. NAVEXMAR manages all permission protocols.') }}</p>
            </div>

            <div class="reg-card">
                <div class="reg-card-head">
                    <i class="fa-solid fa-cloud-rain"></i>
                    <h4>{{ __t('Kötü Hava Kısıtlamaları', 'Adverse Weather Restrictions') }}</h4>
                </div>
                <p>{{ __t('Görüş mesafesinin 1.000 m altına düşmesi veya fırtına uyarısı durumunda boğaz trafiği geçici olarak askıya alınabilir. NAVEXMAR anlık bilgilendirme ve alternatif planlama sunar.', 'In case visibility drops below 1,000 meters or storm warnings occur, strait traffic may be suspended. NAVEXMAR provides real-time updates.') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="background: var(--navy); padding: 56px 0; text-align: center;">
    <div class="container">
        <h2 style="font-size: 1.7rem; color: white; margin-bottom: 10px;">{{ __t('Boğaz Geçişi için Hazır mısınız?', 'Ready for Straits Transit?') }}</h2>
        <p style="color: rgba(255,255,255,0.65); margin-bottom: 26px; font-size: 0.9rem;">{{ __t('Transit geçiş ön bildirimi ve proforma teklifi için ekibimizle hemen iletişime geçin.', 'Contact our duty agency team for transit pre-notice clearance and proforma disbursement quotes.') }}</p>
        <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
            <a href="{{ route('contact') }}" class="btn-primary" style="font-size:0.88rem;"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }}</a>
            <a href="{{ route('contact') }}" class="btn-outline-white" style="font-size:0.88rem;"><i class="fa-solid fa-envelope"></i> {{ __t('İletişim', 'Contact') }}</a>
        </div>
    </div>
</section>

@endsection
