@extends('layouts.app')
@section('title', 'Hakkımızda | NAVEXMAR — Gemi Acenteliği Kurumsal')

@section('styles')
<style>
.about-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 56px; align-items: center;
}
.about-img-wrap {
    border-radius: var(--r); overflow: hidden;
    aspect-ratio: 4/3; position: relative;
}
.about-img-wrap img { width:100%;height:100%;object-fit:cover; }
.about-badge {
    position: absolute; bottom: 16px; right: 16px;
    background: white; border-radius: var(--r);
    padding: 12px 16px; display: flex; align-items: center;
    gap: 10px; box-shadow: var(--shadow-lg);
}
.about-badge-icon {
    width: 36px; height: 36px; background: var(--blue);
    border-radius: 6px; display: grid; place-items: center;
    color: white; font-size: 0.9rem;
}
.about-badge strong { display: block; color: var(--navy); font-size: 1.1rem; font-family:'Poppins',sans-serif; }
.about-badge span { color: var(--muted); font-size: 0.73rem; }

.stats-mini {
    display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 24px;
}
.stat-mini {
    background: white; border: 1px solid var(--border);
    border-radius: var(--r); padding: 14px 16px;
}
.stat-mini-num {
    font-family: 'Poppins', sans-serif;
    font-size: 1.5rem; font-weight: 700;
    color: var(--blue); line-height: 1;
}
.stat-mini-lbl { font-size: 0.75rem; color: var(--muted); margin-top: 3px; }

/* TIMELINE */
.timeline { position: relative; padding-left: 28px; }
.timeline::before {
    content: ''; position: absolute; left: 0; top: 4px; bottom: 0;
    width: 2px; background: linear-gradient(to bottom, var(--blue), transparent);
    border-radius: 2px;
}
.tl-item { position: relative; margin-bottom: 28px; }
.tl-item::before {
    content: ''; position: absolute; left: -33px; top: 4px;
    width: 10px; height: 10px;
    background: var(--blue); border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(21,101,192,0.2);
}
.tl-year {
    font-size: 0.72rem; font-weight: 700; color: var(--blue);
    text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 3px;
}
.tl-title {
    font-size: 0.93rem; font-weight: 700; color: var(--navy);
    margin-bottom: 4px; font-family: 'Inter', sans-serif;
}
.tl-desc { font-size: 0.81rem; color: var(--muted); line-height: 1.6; }

/* TEAM */
.team-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
.team-card {
    background: white; border: 1px solid var(--border);
    border-radius: var(--r); padding: 24px;
    text-align: center;
    transition: box-shadow 0.2s, transform 0.2s;
}
.team-card:hover { box-shadow: var(--shadow-lg); transform: translateY(-3px); }
.team-avatar {
    width: 58px; height: 58px; border-radius: 50%;
    background: var(--sky); border: 2px solid var(--blue);
    display: grid; place-items: center;
    font-size: 1.2rem; color: var(--blue);
    margin: 0 auto 12px;
}
.team-name { font-size: 0.93rem; font-weight: 700; color: var(--navy); margin-bottom: 3px; }
.team-role { font-size: 0.75rem; color: var(--blue); font-weight: 600; margin-bottom: 8px; }
.team-bio { font-size: 0.78rem; color: var(--muted); line-height: 1.55; }

/* CERTS */
.cert-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 14px; }
.cert-card {
    background: white; border: 1px solid var(--border);
    border-radius: var(--r); padding: 20px 16px;
    text-align: center;
    transition: box-shadow 0.2s, transform 0.2s;
}
.cert-card:hover { box-shadow: var(--shadow); transform: translateY(-2px); }
.cert-icon { font-size: 1.6rem; color: var(--blue); margin-bottom: 10px; }
.cert-name { font-size: 0.83rem; font-weight: 700; color: var(--navy); margin-bottom: 4px; }
.cert-desc { font-size: 0.72rem; color: var(--muted); line-height: 1.5; }

@media (max-width:1024px) {
    .about-grid { grid-template-columns: 1fr; gap: 32px; }
    .team-grid { grid-template-columns: 1fr 1fr; }
    .cert-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width:640px) {
    .team-grid { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-building"></i> {{ __t('Kurumsal', 'Corporate') }}</div>
        <h1>{{ __t('NAVEXMAR Hakkında', 'About NAVEXMAR') }}</h1>
        <p>{{ __t('Türk Boğazları ve Türkiye limanlarında 2006\'dan bu yana faaliyet gösteren köklü ve güvenilir gemi acenteliği kuruluşu.', 'Established and trusted shipping agency operating in the Turkish Straits and all Turkish ports since 2006.') }}</p>
    </div>
</div>

{{-- MİSYON --}}
<section class="sec sec-alt">
    <div class="container">
        <div class="about-grid">
            <div class="about-img-wrap">
                <img src="{{ asset('images/about_corporate.jpg') }}" alt="NAVEXMAR Ekibi" loading="lazy">
                <div class="about-badge">
                    <div class="about-badge-icon"><i class="fa-solid fa-anchor"></i></div>
                    <div>
                        <strong>2006</strong>
                        <span>{{ __t('Kuruluş Yılı', 'Established') }}</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="sec-label">{{ __t('Misyonumuz', 'Our Mission') }}</div>
                <h2 class="sec-title">{{ __t('Türkiye\'nin Deniz Kapısında Güvenilir Partneriniz', 'Your Trusted Partner at Turkey\'s Maritime Gateway') }}</h2>
                <p style="color:var(--muted);line-height:1.75;margin-bottom:14px;font-size:0.88rem;">
                    {{ __t('2006 yılında İstanbul\'da kurulan NAVEXMAR, Türk Boğazları ve Türkiye\'nin başlıca limanlarında gemi sahipleri, kiracılar ve operatörler için kapsamlı acentelik hizmetleri sunmaktadır.', 'Founded in 2006 in Istanbul, NAVEXMAR provides comprehensive shipping agency services for shipowners, charterers, and operators in the Turkish Straits and all major ports of Turkey.') }}
                </p>
                <p style="color:var(--muted);line-height:1.75;font-size:0.88rem;">
                    {{ __t('BIMCO ve FONASBA üyeliği, ISO 9001:2015 sertifikasyonu ve 7/24 operasyon anlayışıyla, her ölçekte deniz taşımacılığı operasyonunu en yüksek profesyonel standartlarda yönetiyoruz.', 'With BIMCO & FONASBA memberships, ISO 9001:2015 certification, and a 24/7 active duty team, we manage maritime shipping operations at the highest professional standards.') }}
                </p>
                <div class="stats-mini">
                    <div class="stat-mini">
                        <div class="stat-mini-num">18+</div>
                        <div class="stat-mini-lbl">{{ __t('Yıllık Deneyim', 'Years Experience') }}</div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-num">4K+</div>
                        <div class="stat-mini-lbl">{{ __t('Yıllık Gemi Çağrısı', 'Annual Vessel Calls') }}</div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-num">9</div>
                        <div class="stat-mini-lbl">{{ __t('Türk Limanı Kapsamı', 'Turkish Ports Covered') }}</div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-num">24/7</div>
                        <div class="stat-mini-lbl">{{ __t('Nöbet Operasyonu', 'Duty Operations') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TARİHÇE --}}
<section class="sec">
    <div class="container">
        <div style="max-width:720px;margin:0 auto;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Tarihçemiz', 'Our History') }}</div>
            <h2 class="sec-title" style="text-align:center;margin-bottom:40px;">{{ __t('18 Yıllık Büyüme Hikayesi', '18 Years Growth Journey') }}</h2>
            <div class="timeline">
                <div class="tl-item">
                    <div class="tl-year">2006</div>
                    <div class="tl-title">{{ __t('Kuruluş — İstanbul', 'Established — Istanbul') }}</div>
                    <div class="tl-desc">{{ __t('İstanbul merkezli küçük bir ekiple Türk Boğazları transit acenteliği alanında faaliyete başladık. İlk yılda 200\'ü aşkın gemi çağrısı gerçekleştirdik.', 'Started operations in Bosphorus & Dardanelles transit agency with a team in Istanbul, attending over 200 vessel calls in year one.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2009</div>
                    <div class="tl-title">{{ __t('Ambarlı ve İzmit Ofisleri Açıldı', 'Ambarli & Izmit Offices Opened') }}</div>
                    <div class="tl-desc">{{ __t('Marmara bölgesindeki artan talep doğrultusunda Ambarlı ve İzmit Körfezi\'nde operasyon ofisleri kuruldu.', 'Opened regional port attendance offices in Ambarli Container Terminal and the Gulf of Izmit.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2012</div>
                    <div class="tl-title">{{ __t('ISO 9001 & FONASBA Sertifikasyonu', 'ISO 9001 & FONASBA Certification') }}</div>
                    <div class="tl-desc">{{ __t('Kalite yönetim sistemimiz ISO 9001:2015 sertifikası aldı. FONASBA Quality Standard belgesiyle uluslararası hizmet güvencemizi resmileştirdik.', 'Our quality management system received ISO 9001:2015 accreditation and FONASBA Quality Standard approval.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2016</div>
                    <div class="tl-title">{{ __t('İzmir & Mersin Büroları', 'Izmir & Mersin Offices') }}</div>
                    <div class="tl-desc">{{ __t('Ege ve Akdeniz limanlarına yönelik talepleri karşılamak için İzmir ve Mersin\'de regional ofisler açıldı.', 'Expanded port agency attendance to the Aegean & Mediterranean regions with Izmir & Mersin offices.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2021</div>
                    <div class="tl-title">{{ __t('Dijital Dönüşüm & 7/24 Platform', 'Digital Transformation & 24/7 Platform') }}</div>
                    <div class="tl-desc">{{ __t('Dijital DA/CA raporlama sistemi ve anlık gemi takip platformu devreye alındı. PDA hesaplama aracı ve müşteri portalı hizmete girdi.', 'Launched digital DA/CA statement reporting and real-time vessel tracking platform for shipowners.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2024</div>
                    <div class="tl-title">{{ __t('Trabzon & Karadeniz Operasyonları', 'Trabzon & Black Sea Operations') }}</div>
                    <div class="tl-desc">{{ __t('Karadeniz limanlarındaki talebe cevap vermek için Trabzon ofisi açıldı. Karadeniz transit geçişleri artık tam kapsamlı hizmetle yönetiliyor.', 'Opened Trabzon office to provide full agency attendance across Black Sea ports and transit corridors.') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EKİP --}}
<section class="sec sec-alt">
    <div class="container">
        <div class="sec-label" style="justify-content:center;">{{ __t('Yönetim', 'Management') }}</div>
        <h2 class="sec-title" style="text-align:center;margin-bottom:6px;">{{ __t('Uzman Ekibimiz', 'Our Expert Team') }}</h2>
        <p style="text-align:center;color:var(--muted);font-size:0.86rem;margin-bottom:32px;">{{ __t('Denizcilik sektöründe onlarca yıllık tecrübeye sahip profesyonellerden oluşan yönetim kadromuz.', 'Our executive team composed of professionals with decades of maritime shipping experience.') }}</p>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-user-tie"></i></div>
                <div class="team-name">Mehmet Kaya</div>
                <div class="team-role">{{ __t('Genel Müdür & Kurucu', 'Managing Director & Founder') }}</div>
                <div class="team-bio">{{ __t('22 yıllık denizcilik tecrübesi. Lloyd\'s Register eğitimli, BIMCO Shipping Operations uzmanı.', '22 years maritime experience. Lloyd\'s Register trained, BIMCO Shipping Operations specialist.') }}</div>
            </div>
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-compass"></i></div>
                <div class="team-name">Ayşe Demir</div>
                <div class="team-role">{{ __t('Operasyon Direktörü', 'Operations Director') }}</div>
                <div class="team-bio">{{ __t('İTÜ Deniz İşletmeciliği mezunu. 15 yıldır liman operasyonları ve mürettebat lojistiği alanında uzman.', 'ITU Maritime Management graduate. 15 years specialist in port operations and crew logistics.') }}</div>
            </div>
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                <div class="team-name">Ali Yılmaz</div>
                <div class="team-role">{{ __t('Finans & Disbursement', 'Finance & Disbursement') }}</div>
                <div class="team-bio">{{ __t('CIMA sertifikalı. Uluslararası DA/CA raporlama ve armatör hesapları konusunda 12 yıllık tecrübe.', 'CIMA certified. 12 years experience in international DA/CA accounting and owner accounts.') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- SERTİFİKALAR --}}
<section class="sec">
    <div class="container">
        <div class="sec-label" style="justify-content:center;">{{ __t('Sertifikalar & Üyelikler', 'Certificates & Memberships') }}</div>
        <h2 class="sec-title" style="text-align:center;margin-bottom:32px;">{{ __t('Uluslararası Standartlar', 'International Standards') }}</h2>
        <div class="cert-grid">
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-anchor"></i></div>
                <div class="cert-name">BIMCO</div>
                <div class="cert-desc">{{ __t('Baltic & International Maritime Council resmi üyesi', 'Official member of Baltic & International Maritime Council') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-star"></i></div>
                <div class="cert-name">FONASBA</div>
                <div class="cert-desc">{{ __t('Quality Standard Certificate — acentelikte en yüksek kalite belgesi', 'Quality Standard Certificate — highest quality accreditation in agency') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="cert-name">ISO 9001:2015</div>
                <div class="cert-desc">{{ __t('Kalite yönetim sistemi uluslararası standart sertifikası', 'Quality management system international standard certification') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-ship"></i></div>
                <div class="cert-name">DTO {{ __t('Üyesi', 'Member') }}</div>
                <div class="cert-desc">{{ __t('Deniz Ticaret Odası — İstanbul resmi üyeliği', 'Chamber of Shipping — Istanbul official member') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="background:var(--navy);padding:56px 0;text-align:center;">
    <div class="container">
        <h2 style="font-size:1.7rem;color:white;margin-bottom:10px;">{{ __t('Birlikte Çalışalım', 'Let\'s Work Together') }}</h2>
        <p style="color:rgba(255,255,255,0.65);margin-bottom:26px;font-size:0.9rem;">{{ __t('Türk Boğazları ve Türkiye limanlarında gemi acenteliği için NAVEXMAR\'ı tercih edin.', 'Choose NAVEXMAR for shipping agency attendance in the Turkish Straits and all ports of Turkey.') }}</p>
        <div style="display:flex;justify-content:center;gap:12px;flex-wrap:wrap;">
            <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-envelope"></i> {{ __t('İletişime Geçin', 'Contact Us') }}</a>
            <a href="{{ route('services.index') }}" class="btn-outline-white"><i class="fa-solid fa-anchor"></i> {{ __t('Hizmetleri İncele', 'View Services') }}</a>
        </div>
    </div>
</section>
@endsection
