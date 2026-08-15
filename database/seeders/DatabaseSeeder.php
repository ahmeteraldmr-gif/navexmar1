<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Vessel;
use App\Models\News;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@navexmar.com'],
            [
                'name' => 'NAVEXMAR Yönetici',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Services
        $services = [
            [
                'title' => 'Gemi Acenteliği & Liman Hizmetleri',
                'slug' => 'gemi-acenteligi-liman-hizmetleri',
                'icon' => 'fa-ship',
                'image' => '/images/port_agency.jpg',
                'summary' => "Türkiye'nin tüm limanlarında 7/24 kesintisiz profesyonel acentelik, liman giriş-çıkış işlemleri, idari izinler ve operasyonel rehberlik.",
                'description' => "NAVEXMAR olarak, Ambarlı, Haydarpaşa, İzmit Körfezi (Evyap, Yılport, DP World), Aliağa, Mersin, İskenderun ve Gemlik limanları başta olmak üzere Türkiye'nin tüm limanlarında armatörlerimize, kiracılarımıza ve gemi işletmecilerimize birinci sınıf acentelik hizmeti sunuyoruz. Gemi geliş öncesi bildirimlerden liman başkanlığı, sahil sağlık, gümrük ve emniyet onaylarına kadar tüm bürokratik süreçleri sıfır gecikme prensibiyle yönetiyoruz.",
                'features' => [
                    '7/24 Kesintisiz Liman & İdari Acentelik',
                    'Gümrük, Sahil Sağlık & Liman Başkanlığı Prosedürleri',
                    'Draft Sörvey & Yükleme / Tahliye Gözetimi',
                    'Yönlendirme, Pilotaj & Römorkör Koordinasyonu',
                    'Nakit Avans (CTP) & Finansal Operasyon Yönetimi'
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Türk Boğazları Geçiş Acenteliği',
                'slug' => 'turk-bogazlari-gecis-acenteligi',
                'icon' => 'fa-compass',
                'image' => '/images/strait_transit.jpg',
                'summary' => 'İstanbul ve Çanakkale Boğazı transit geçişlerinde SP-1 / SP-2 bildirimleri, kılavuz kaptan organizasyonu ve kesintisiz geçiş yönetimi.',
                'description' => "Türk Boğazları (İstanbul ve Çanakkale Boğazı), dünyanın en yoğun, dar ve zorlu deniz yollarından biridir. NAVEXMAR, Boğazlardan transit geçiş yapacak tüm gemi tiplerine (Konteyner, Tanker, Dökme Yük, LPG/LNG) kılavuzluk ve acentelik desteği sağlar. VTS (Deniz Trafik Yönetimi) ile tam entegre sistemimiz sayesinde geminizin Boğaz giriş demir yerlerinden geçiş rotasına kadar olan tüm süreci 7/24 canlı takip ediyoruz.",
                'features' => [
                    'SP-1 & SP-2 Elektronik Bildirim Yönetimi',
                    'Kılavuz Kaptan (Pilotage) ve Römorkör Refakat Tedariği',
                    'Transit Demirleme & İkmal Koordinasyonu',
                    'VTS (Trafik Ayırım Düzeni) Canlı Gemi Takibi',
                    'Çevre Koruma & Tehlikeli Madde Geçiş İzinleri'
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'Yakıt (Bunkering) & Kumanya İkmali',
                'slug' => 'yakit-ve-kumanya-ikmali',
                'icon' => 'fa-gas-pump',
                'image' => '/images/bunkering.jpg',
                'summary' => 'ISO 8217 standartlarına uygun VLSFO, MGO, Madeni yağ ikmalleri ile taze kumanya ve teknik malzeme tedariği.',
                'description' => "Gemi yakıt ikmali (Bunkering) ve kumanya tedariğinde zamanlama ve ürün kalitesi esastır. NAVEXMAR, İstanbul ve Çanakkale demir sahalarında ile tüm ana limanlarda lisanslı barçlar vasıtasıyla kesintisiz yakıt ve madeni yağ teslimatları organize eder. Ayrıca taze gıda, içme suyu, güverte ve makine sarf malzemeleri geminize eksiksiz ulaştırılır.",
                'features' => [
                    'ISO 8217 Standartlarında VLSFO & MGO Yakıt İkmali',
                    'Madeni Yağ (Lube Oil) Varil & Tanker Teslimatı',
                    'Taze Kumanya, Donuk Gıda & İçme Suyu Tedariği',
                    'Gümrüklü Transit Mağaza & Teknik Malzeme Teslimi',
                    'Atık Alım (Marpol) & Sludge Bilge Transfer Hizmetleri'
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'Mürettebat Değişimi & Kara Lojistiği',
                'slug' => 'murettebat-degisimi-kara-lojistigi',
                'icon' => 'fa-users-gear',
                'image' => '/images/crew_change.jpg',
                'summary' => 'Vize işlemleri, VIP havalimanı transferleri, otel konaklamaları, tıbbi destek ve 7/24 acente botu servisi.',
                'description' => "Gemi adamlarının değişimi ve kara lojistiği acenteliğin en hassas insan odaklı süreçlerinden biridir. NAVEXMAR, İstanbul Havalimanı (IST) ve Sabiha Gökçen (SAW) başta olmak üzere Türkiye geneli havalimanlarında karşılama, OKTB vize onayları, lüks araç transferleri, otel konaklamaları ve demir alanında acente botu transferleri ile personelinizin emniyetle değişimini gerçekleştirir.",
                'features' => [
                    'OKTB (OK to Board) & Gümrük Vize İzinleri',
                    '7/24 VIP Havalimanı Karşılama & Araç Transferi',
                    'Demir Sahasında Kesintisiz Hızlı Acente Botu Hizmeti',
                    'Tıbbi Danışmanlık, Hastane & Acil Tahliye Desteği',
                    'Otel Konaklama & Uçak Bileti Rezerve Yönetimi'
                ],
                'sort_order' => 4,
            ],
            [
                'title' => 'Yük & Konteyner Operasyonları',
                'slug' => 'yuk-ve-konteyner-operasyonlari',
                'icon' => 'fa-boxes-stacked',
                'image' => '/images/hero_ship.jpg',
                'summary' => 'Proje kargo, dökme yük, konteyner tahliye/yükleme, kargo manifestosu, ordino ve gümrük desteği.',
                'description' => "Taşınan navlunun güvenliği, doğru elleçlenmesi ve zamanında teslimatı için charterer ve armatörlerimiz adına uçtan uca lojistik destek sağlıyoruz. Proje kargoları, gabari dışı ağır yükler ve dökme maden/tahıl yüklemelerinde uzman operasyon ekibimiz saha gözetimi gerçekleştirir.",
                'features' => [
                    'Proje Kargo & Ağır Yük Elleçleme Yönetimi',
                    'Konteyner Lojistiği & Depolama Çözümleri',
                    'Konşimento (Bill of Lading) & Ordino Düzenleme',
                    'Gümrük Müşavirliği & Karayolu Tır Transferleri',
                    'Gözetim (Surveying) & Yük Hasar Tespiti'
                ],
                'sort_order' => 5,
            ],
            [
                'title' => 'Teknik Sörvey & Bakım Onarım',
                'slug' => 'teknik-survey-bakim-onarim',
                'icon' => 'fa-wrench',
                'image' => '/images/technical_support.jpg',
                'summary' => 'Sualtı dalgıç temizliği, klas sörveyör koordinasyonu, yedek parça gümrüklemesi ve tersane temsilciliği.',
                'description' => "Geminizin teknik aksaklıklarında veya periyodik bakım süreçlerinde sertifikalı uzman sualtı dalgıç ekipleri, makine mühendisleri ve klas sörveyörleri ile en hızlı çözümleri üretiyoruz. Yalova ve Tuzla tersanelerinde havuzlama (drydock) ve tamir aşamalarında armatör temsilciliği yürütüyoruz.",
                'features' => [
                    'Sualtı (UWILD) Kamera & Dalgıç Tekne Temizliği',
                    'Class Sörveyör Koordinasyonu (DNV, ABS, BV, NKK)',
                    'Yedek Parça Transit Gümrükleme & Uçaktan Gemiye Teslimat',
                    'Tuzla & Yalova Tersane (Drydock) Temsilciliği',
                    'Yangın & Emniyet Ekipmanları Yıllık Test Sertifikasyon'
                ],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::updateOrCreate(['slug' => $serviceData['slug']], $serviceData);
        }

        // 3. Seed Vessels
        $vessels = [
            [
                'name' => 'MV Bosphorus Express',
                'vessel_type' => 'Konteyner Gemisi',
                'flag' => 'Marshall Islands',
                'imo_number' => 9845123,
                'grt' => 45200,
                'dwt' => 58000,
                'image' => '/images/hero_ship.jpg',
                'last_port' => 'Ambarlı Container Terminal',
                'operation_type' => 'Liman İkmali & Acentelik',
                'status' => 'Tamamlandı',
                'details' => '3,400 TEU konteyner yükleme ve 120 ton VLSFO yakıt ikmali tamamlandı.',
            ],
            [
                'name' => 'MT Anatolian Pride',
                'vessel_type' => 'Ham Petrol Tankeri',
                'flag' => 'Türkiye',
                'imo_number' => 9712044,
                'grt' => 82000,
                'dwt' => 115000,
                'image' => '/images/strait_transit.jpg',
                'last_port' => 'İstanbul Boğazı Kuzey Demir',
                'operation_type' => 'Boğaz Geçişi & Bunkering',
                'status' => 'Devam Ediyor',
                'details' => 'Güney-Kuzey Boğaz geçiş kılavuz kaptan refakati ve demir sahası yedek parça teslimi.',
            ],
            [
                'name' => 'MV Danube Star',
                'vessel_type' => 'Dökme Yük Gemisi',
                'flag' => 'Panama',
                'imo_number' => 9631109,
                'grt' => 34500,
                'dwt' => 56000,
                'image' => '/images/port_agency.jpg',
                'last_port' => 'İzmit Körfezi Yılport',
                'operation_type' => 'Tahliye & Mürettebat Değişimi',
                'status' => 'Tamamlandı',
                'details' => '45.000 ton buğday tahliyesi ve 6 kişilik Ukraynalı mürettebat değişimi başarıyla yapıldı.',
            ],
            [
                'name' => 'MV Orion Logistics',
                'vessel_type' => 'Ro-Ro Gemisi',
                'flag' => 'Liberia',
                'imo_number' => 9554321,
                'grt' => 28900,
                'dwt' => 18000,
                'image' => '/images/crew_change.jpg',
                'last_port' => 'Pendik Ro-Ro Limanı',
                'operation_type' => 'Araç Tahliye Acenteliği',
                'status' => 'Tamamlandı',
                'details' => '650 adet sıfır kilometre ticari araç tahliyesi ve liman gümrük belgeleri onaylandı.',
            ],
            [
                'name' => 'MY Horizon Luxury',
                'vessel_type' => 'Süperyat / Superyacht',
                'flag' => 'Cayman Islands',
                'imo_number' => 9918765,
                'grt' => 2400,
                'dwt' => 800,
                'image' => '/images/bunkering.jpg',
                'last_port' => 'Ataköy Marina & Boğaz Turu',
                'operation_type' => 'Özel Yat Acenteliği',
                'status' => 'Tamamlandı',
                'details' => 'VIP konuk kabulü, yakıt ikmali ve özel Boğaz transit izni sağlandı.',
            ],
        ];

        foreach ($vessels as $vesselData) {
            Vessel::updateOrCreate(['imo_number' => $vesselData['imo_number']], $vesselData);
        }

        // 4. Seed News
        $newsArticles = [
            [
                'title' => 'Türk Boğazları Deniz Trafik Düzeni Tüzüğü Güncellendi',
                'slug' => 'turk-bogazlari-deniz-trafik-duzeni-tuzugu-guncellendi',
                'category' => 'Denizcilik Sirküleri',
                'image' => '/images/strait_transit.jpg',
                'summary' => 'Ulaştırma ve Altyapı Bakanlığı tarafından yayınlanan yeni tüzük ile İstanbul ve Çanakkale boğazı geçiş kurallarında güncellemeler yapıldı.',
                'content' => "Kıyı Emniyeti Genel Müdürlüğü ve Ulaştırma Bakanlığı kararı uyarınca Türk Boğazları Deniz Trafik Düzeni Yönetmeliği'nde yapılan son değişiklikler yürürlüğe girdi. Yeni düzenlemeye göre 200 metre üzerindeki tehlikeli madde taşıyan tankerlerin gece geçiş kısıtlamaları ve kılavuz kaptan alma zorunlulukları yeniden yapılandırıldı. NAVEXMAR olarak tüm armatör ve kiracılarımıza SP-1 bildirim süresi ve VHF kanal takip prosedürlerine dair bilgilendirme sirkülerimizi ilettik.",
                'author' => 'NAVEXMAR Mevzuat Departmanı',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Ambarlı Liman Başkanlığı Su Çekimi (Draft) Limitleri Açıklandı',
                'slug' => 'ambarli-liman-baskanligi-su-cekimi-draft-limitleri',
                'category' => 'Liman Duyurusu',
                'image' => '/images/port_agency.jpg',
                'summary' => 'Marmara Ereğlisi ve Ambarlı liman tesisleri yanaşma dökme yük ve konteyner gemileri için max draft çizelgesi yenilendi.',
                'content' => "Ambarlı Liman Kompleksi içerisindeki Marport, Kumport ve Mardaş terminallerine yanaşacak ultra büyük konteyner gemileri (ULCV) için maksimum emniyetli su çekimi (maximum safe draft) limitleri güncellenmiştir. Yan yana yanaşma protokolleri ve batimetrik harita verilerine göre uygulanan yeni derinlik toleransları acentelik temsilcilerimiz tarafından 7/24 izlenmektedir.",
                'author' => 'NAVEXMAR Liman Operasyon',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'NAVEXMAR Yeşil Denizcilik ve Karbon Emisyon Danışmanlığını Başlattı',
                'slug' => 'navexmar-yesil-denizcilik-ve-karbon-emisyon-danismanligi',
                'category' => 'Kurumsal Haber',
                'image' => '/images/about_corporate.jpg',
                'summary' => 'IMO CII ve EEXI regülasyonları kapsamında Türk limanlarına uğrak yapan gemilere karbon salınım raporlama desteği sunuyoruz.',
                'content' => "NAVEXMAR Denizcilik, sürdürülebilir mavi ekonomi vizyonu çerçevesinde denizcilik sektörüne yenilikçi bir hizmet daha kazandırdı. IMO 2026 Sera Gazı Stratejisi standartlarında, uğrak yapan gemilerimizin yakıt tüketimi, liman bekleme emisyonları ve çevre mevzuatı raporlamaları uzman acenta kadromuzca dijitalleştirildi.",
                'author' => 'NAVEXMAR Basın Merkezi',
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ],
        ];

        foreach ($newsArticles as $newsData) {
            News::updateOrCreate(['slug' => $newsData['slug']], $newsData);
        }

        // 5. Seed Site Settings
        $settings = [
            'phone' => '+90 (212) 444 62 83',
            'mobile' => '+90 (532) 700 90 90',
            'email' => 'agency@navexmar.com',
            'address' => 'Marport Plaza Kat:8 No:82, Ambarlı Liman Yolu, Avcılar / İstanbul - Türkiye',
            'working_hours' => '7 Gün 24 Saat Vardiyalı Kesintisiz Operasyon',
            'facebook' => 'https://facebook.com/navexmar',
            'linkedin' => 'https://linkedin.com/company/navexmar',
            'instagram' => 'https://instagram.com/navexmar',
            'about_short' => 'NAVEXMAR, Türk Boğazları ve tüm Türkiye limanlarında armatör, kiracı ve gemi işletmecilerine uluslararası standartlarda 7/24 profesyonel gemi acenteliği, ikmal ve lojistik çözümleri sunmaktadır.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
    }
}
