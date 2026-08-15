@extends('layouts.app')

@section('title', 'Kurumsal & Hakkımızda - NAVEXMAR Maritime Agency')

@section('content')

    <!-- Header Banner -->
    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-building"></i> Kurumsal</div>
            <h1 class="section-heading" style="font-size: 2.8rem; color: #FFF;">Denizcilikte 18 Yıllık Güven ve Mükemmellik</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">Türk Boğazları ve Türkiye'nin tüm deniz kapılarında küresel armatörlere 7/24 kesintisiz acentelik ve lojistik çözümleri sunuyoruz.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container" style="padding: 80px 0;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; margin-bottom: 80px;">
            <div>
                <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 20px;">Tarihçemiz & Vizyonumuz</h2>
                <p style="color: var(--text-muted); line-height: 1.8; margin-bottom: 16px;">
                    NAVEXMAR Denizcilik A.Ş., 2008 yılında İstanbul'da kurulmuş olup, Türk Boğazları (İstanbul ve Çanakkale Boğazı) transit gemi geçişlerinde ve Türkiye genelindeki tüm ticari limanlarda uluslararası kalitede gemi acenteliği hizmeti vermektedir.
                </p>
                <p style="color: var(--text-muted); line-height: 1.8; margin-bottom: 24px;">
                    Denizcilik sektörünün dinamik ve zamanla yarışan yapısını çok iyi analiz eden uzman kadromuz, geminizin liman ve demirleme süreçlerini sıfır zaman kaybı ve optimum maliyet anlayışıyla yönetmektedir.
                </p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="background: #FFFFFF; padding: 20px; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                        <i class="fa-solid fa-eye" style="font-size: 1.8rem; color: var(--primary-blue); margin-bottom: 10px;"></i>
                        <h4 style="font-weight: 700; color: var(--primary-navy);">Vizyonumuz</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 6px;">Doğu Akdeniz ve Karadeniz havzasında dijital odaklı en güvenilir acente markası olmak.</p>
                    </div>
                    <div style="background: #FFFFFF; padding: 20px; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                        <i class="fa-solid fa-bullseye" style="font-size: 1.8rem; color: #2563EB; margin-bottom: 10px;"></i>
                        <h4 style="font-weight: 700; color: var(--primary-navy);">Misyonumuz</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 6px;">Gemilerin emniyetli geçişini, limanlarda sıfır rötar ile elleçlenmesini sağlamak.</p>
                    </div>
                </div>
            </div>

            <div>
                <img src="{{ asset('images/about_corporate.jpg') }}" alt="NAVEXMAR Merkez Ofis" style="width: 100%; border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-md);">
            </div>
        </div>

        <!-- Corporate Values Grid -->
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="section-title-badge"><i class="fa-solid fa-shield"></i> Temel Değerlerimiz</div>
            <h2 class="section-heading">Neden NAVEXMAR?</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 60px;">
            <div class="white-card">
                <i class="fa-solid fa-clock-rotate-left" style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 10px;">7/24 Kesintisiz Operasyon</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Gece gündüz, tatil günleri dahil kesintisiz çalışan vardiyalı nöbetçi acente masamızla geminizin yanındayız.</p>
            </div>
            <div class="white-card">
                <i class="fa-solid fa-scale-balanced" style="font-size: 2rem; color: #2563EB; margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 10px;">Şeffaf Maliyet Yönetimi</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Tüm liman harçları, fener ve kılavuzluk faturaları sıfır komisyon gizliliği ve tam şeffaflıkla raporlanır.</p>
            </div>
            <div class="white-card">
                <i class="fa-solid fa-network-wired" style="font-size: 2rem; color: #0284C7; margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 10px;">Geniş Liman Ağı</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">İstanbul, İzmit, Ambarlı, Aliağa, Mersin, İskenderun ve Trabzon'da yerleşik saha temsilcilerimiz mevcuttur.</p>
            </div>
        </div>

        <!-- Certifications & Memberships -->
        <div style="background: #FFFFFF; border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 40px; text-align: center; box-shadow: var(--shadow-sm);">
            <h3 style="font-size: 1.4rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 24px;">Uluslararası Üyelikler & Sertifikalar</h3>
            <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <div style="background: var(--accent-soft); border: 1px solid #BFDBFE; padding: 14px 28px; border-radius: 10px; font-weight: 700; color: var(--primary-blue);">
                    <i class="fa-solid fa-award"></i> BIMCO Full Member
                </div>
                <div style="background: var(--accent-soft); border: 1px solid #BFDBFE; padding: 14px 28px; border-radius: 10px; font-weight: 700; color: var(--primary-blue);">
                    <i class="fa-solid fa-certificate"></i> FONASBA Quality Standard
                </div>
                <div style="background: var(--accent-soft); border: 1px solid #BFDBFE; padding: 14px 28px; border-radius: 10px; font-weight: 700; color: var(--primary-blue);">
                    <i class="fa-solid fa-file-contract"></i> ISO 9001:2015 Quality Management
                </div>
                <div style="background: var(--accent-soft); border: 1px solid #BFDBFE; padding: 14px 28px; border-radius: 10px; font-weight: 700; color: var(--primary-blue);">
                    <i class="fa-solid fa-anchor"></i> İMEAK Deniz Ticaret Odası (DTO)
                </div>
            </div>
        </div>
    </div>

@endsection
