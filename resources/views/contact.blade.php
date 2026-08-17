@extends('layouts.app')
@section('title', 'İletişim & Teklif | NAVEXMAR — Türk Boğazları Gemi Acenteliği')

@section('styles')
<style>
.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 36px;
    align-items: start;
}
.info-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    padding: 24px;
    margin-bottom: 20px;
}
.info-card-title {
    font-size: 0.95rem; font-weight: 700;
    color: var(--navy); margin-bottom: 16px;
    display: flex; align-items: center; gap: 8px;
}
.info-card-title i { color: var(--blue); }

.info-row {
    display: flex; gap: 12px; align-items: flex-start;
    margin-bottom: 14px; font-size: 0.84rem;
}
.info-row:last-child { margin-bottom: 0; }
.info-icon {
    width: 32px; height: 32px;
    background: var(--sky); border-radius: 6px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 0.8rem; flex-shrink: 0;
}
.info-lbl { font-size: 0.72rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.4px; }
.info-val { color: var(--navy); font-weight: 600; line-height: 1.4; }
.info-val a { color: var(--navy); transition: color 0.2s; }
.info-val a:hover { color: var(--blue); }

.vhf-row {
    background: var(--navy); color: white;
    border-radius: 6px; padding: 10px 14px;
    font-size: 0.8rem; margin-top: 14px;
    display: flex; align-items: center; gap: 10px;
}
.vhf-row i { color: #90CAF9; }

.hours-row {
    display: flex; justify-content: space-between;
    font-size: 0.83rem; padding: 7px 0;
    border-bottom: 1px dashed var(--border);
}
.hours-row:last-child { border-bottom: none; }

.live-badge {
    display: flex; align-items: center; gap: 6px;
    background: #E8F5E9; color: #2E7D32;
    padding: 8px 14px; border-radius: 6px;
    font-size: 0.78rem; font-weight: 600; margin-top: 14px;
}
.live-dot {
    width: 7px; height: 7px; background: #4CAF50;
    border-radius: 50%; animation: blink 1.5s infinite;
}

/* Form Wrap */
.form-wrap {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    padding: 32px;
    box-shadow: var(--shadow);
}
.form-title { font-size: 1.15rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
.form-sub { font-size: 0.83rem; color: var(--muted); margin-bottom: 24px; }

.field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.field { margin-bottom: 16px; }
.field label {
    display: block; font-size: 0.74rem; font-weight: 700;
    color: var(--navy); text-transform: uppercase; letter-spacing: 0.5px;
    margin-bottom: 6px;
}
.field input, .field select, .field textarea {
    width: 100%; border: 1px solid var(--border); border-radius: 6px;
    padding: 10px 14px; font-size: 0.86rem; font-family: 'Inter', sans-serif;
    color: var(--text); background: var(--bg); outline: none;
    transition: border-color 0.2s, background 0.2s;
}
.field input:focus, .field select:focus, .field textarea:focus {
    border-color: var(--blue); background: white;
}
.field textarea { height: 110px; resize: vertical; }

.alert-success {
    padding: 12px 16px; border-radius: 6px; margin-bottom: 14px;
    background: #E8F5E9; border: 1px solid #C8E6C9;
    color: #2E7D32; font-size: 0.85rem;
}
.alert-error {
    padding: 12px 16px; border-radius: 6px; margin-bottom: 14px;
    background: #FFEBEE; border: 1px solid #FFCDD2;
    color: #C62828; font-size: 0.85rem;
}

@media (max-width: 1024px) { .contact-layout { grid-template-columns: 1fr; } }
@media (max-width: 640px)  { .field-row { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-headset"></i> {{ __t('7/24 Operasyon Merkezi', '24/7 Duty Operations Center') }}</div>
        <h1>{{ __t('İletişim & Teklif', 'Contact & Quote Requests') }}</h1>
        <p>{{ __t('Gemi acenteliği, proforma teklifi veya acil operasyon desteği için bize ulaşın — 30 dakika içinde cevap garantisi.', 'Reach us for shipping agency attendance, proforma disbursement quotes or emergency attendance — 30 min response time.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container">
        <div class="contact-layout">

            {{-- İletişim Bilgileri --}}
            <div>
                <div class="info-card">
                    <div class="info-card-title"><i class="fa-solid fa-phone"></i> {{ __t('Telefon & E-posta', 'Phone & Email') }}</div>
                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('Ofis Telefonu', 'Office Phone') }}</div>
                            <div class="info-val"><a href="tel:+902124446283">+90 212 444 62 83</a></div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('Acil Nöbetçi Hattı', '24/7 Duty Hotline') }}</div>
                            <div class="info-val"><a href="tel:+905327009090">+90 532 700 90 90</a></div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('E-posta', 'Email Address') }}</div>
                            <div class="info-val"><a href="mailto:ops@navexmar.com">ops@navexmar.com</a></div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('Adres', 'Office Address') }}</div>
                            <div class="info-val">Marport Plaza K:8, Ambarlı Liman Yolu, Avcılar — İstanbul</div>
                        </div>
                    </div>
                    <div class="vhf-row">
                        <i class="fa-solid fa-tower-broadcast"></i>
                        <span>VHF: <strong>Ch 16</strong> ({{ __t('Acil', 'Emergency') }}) · <strong>Ch 12</strong> (İstanbul) · <strong>Ch 11</strong> (Çanakkale)</span>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-card-title"><i class="fa-solid fa-clock"></i> {{ __t('Çalışma Saatleri', 'Office Hours') }}</div>
                    <div class="hours-row"><span>{{ __t('Pazartesi – Cuma', 'Monday – Friday') }}</span><span>08:00 – 18:00</span></div>
                    <div class="hours-row"><span>{{ __t('Cumartesi', 'Saturday') }}</span><span>09:00 – 14:00</span></div>
                    <div class="hours-row"><span>{{ __t('Pazar & Resmi Tatil', 'Sunday & Holidays') }}</span><span style="color:var(--teal);">{{ __t('Nöbetçi Hizmeti', '24/7 Duty Team') }}</span></div>
                    <div class="live-badge">
                        <span class="live-dot"></span> {{ __t('Şu an 7/24 nöbetçimiz aktif', 'Active 24/7 duty team on station') }}
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="form-wrap">
                <div class="form-title"><i class="fa-solid fa-file-invoice-dollar" style="color:var(--blue);margin-right:7px;"></i> {{ __t('Teklif / Talep Formu', 'Inquiry & Quote Form') }}</div>
                <div class="form-sub">{{ __t('Acentelik teklifi veya genel talep için formu doldurun. Uzman ekibimiz en kısa sürede geri dönecektir.', 'Fill in the form for agency quote requests or general inquiries. Our operations team will respond promptly.') }}</div>

                @if(session('success'))
                    <div class="alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert-error"><i class="fa-solid fa-triangle-exclamation"></i> {{ __t('Lütfen zorunlu alanları doldurunuz.', 'Please complete all required fields.') }}</div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" novalidate>
                    @csrf
                    <div class="field-row">
                        <div class="field">
                            <label>{{ __t('Ad Soyad', 'Full Name') }} *</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="John Smith" required>
                        </div>
                        <div class="field">
                            <label>{{ __t('Şirket / Armatör', 'Company / Owner') }}</label>
                            <input type="text" name="company" value="{{ old('company') }}" placeholder="ABC Shipping Ltd.">
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label>{{ __t('E-posta', 'Email Address') }} *</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="ops@company.com" required>
                        </div>
                        <div class="field">
                            <label>{{ __t('Telefon', 'Phone Number') }}</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+90 5xx xxx xx xx">
                        </div>
                    </div>
                    <div class="field">
                        <label>{{ __t('Hizmet Talebi', 'Service Requested') }} *</label>
                        <select name="subject" required>
                            <option value="">{{ __t('Seçiniz...', 'Select Service...') }}</option>
                            <option value="Boğaz Transit Geçiş Acenteliği">{{ __t('Boğaz Transit Geçiş Acenteliği', 'Straits Transit Agency') }}</option>
                            <option value="Liman Acenteliği">{{ __t('Liman Acenteliği', 'Port Agency Attendance') }}</option>
                            <option value="Bunkering & Yakıt İkmali">{{ __t('Bunkering & Yakıt İkmali', 'Bunkering & Fuel Supply') }}</option>
                            <option value="Mürettebat Değişimi">{{ __t('Mürettebat Değişimi', 'Crew Change Services') }}</option>
                            <option value="Teknik Destek">{{ __t('Teknik Destek', 'Technical Support') }}</option>
                            <option value="Proforma PDA Talebi">{{ __t('Proforma PDA Talebi', 'Proforma PDA Request') }}</option>
                            <option value="Diğer">{{ __t('Diğer', 'Other Inquiry') }}</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>{{ __t('Talep & Mesaj', 'Inquiry Details & Message') }} *</label>
                        <textarea name="message" placeholder="{{ __t('Tahmini varış tarihi, liman, gemi adı, GRT... detaylı bilgi veriniz.', 'ETA date, port, vessel name, GRT, draft, nature of call...') }}" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;padding:12px;">
                        <i class="fa-solid fa-paper-plane"></i> {{ __t('Talebi Gönder', 'Submit Inquiry') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
