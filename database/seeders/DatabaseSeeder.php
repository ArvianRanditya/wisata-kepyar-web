<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wisata;
use App\Models\Umkm;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\Aparatur;
use App\Models\Dusun;
use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@desakepyar.id'],
            [
                'name' => 'Admin Desa Kepyar',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Seed Wisata (Nature Tourism)
        $wisataData = [
            [
                'name' => 'Bukit Cumbri',
                'category' => 'Wisata Alam',
                'price' => 'Rp 150.000 / Orang',
                'image' => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=800',
                'description' => 'Ikon wisata Desa Kepyar paling terkenal dengan ketinggian 638 mdpl. Menawarkan panorama perbukitan hijau memukau dan spot sunrise terbaik.',
                'highlights' => ['638 mdpl', 'Sunrise Spot', 'Camp Area', 'Trekking'],
                'duration' => 'Spot Sunrise',
                'best_time' => 'Pagi hari 05:00 - 06:00',
                'activities' => 'Hiking, Camping, Sunrise/Sunset, Fotografi, Cloud Watching'
            ],
            [
                'name' => 'Air Terjun Sanginan',
                'category' => 'Wisata Alam',
                'price' => 'Rp 250.000 / Orang',
                'image' => 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&q=80&w=800',
                'description' => 'Oasis kesegaran tersembunyi di Dusun Sumber dengan air jernih langsung dari alam. Dikelilingi tebing batu estetik dan kolam berenang alami.',
                'highlights' => ['Dusun Sumber', 'Kolam Alami', 'Relaksasi', 'Tebing Estetik'],
                'duration' => 'Petualangan Air',
                'best_time' => 'Pagi hari 08:00 - 11:00',
                'activities' => 'Berenang, Trekking, Fotografi, Meditasi, Memancing, Rock Climbing'
            ],
            [
                'name' => 'Agrowisata Lapangan Karang Tengah',
                'category' => 'Edukasi',
                'price' => 'Gratis / Donasi',
                'image' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&q=80&w=800',
                'description' => 'Lahan pertanian indah menawarkan pengalaman agrowisata otentik. Pengunjung belajar sistem pertanian tradisional Jawa dan teknik irigasi.',
                'highlights' => ['Edukasi Tani', 'Interaksi Sawah', 'Pemandangan Hijau'],
                'duration' => '2-3 Jam',
                'best_time' => 'Pagi/Sore Hari',
                'activities' => 'Farm Tour, Belajar Pertanian, Workshop Pupuk Organik, Fotografi Landscape'
            ],
            [
                'name' => 'Watu Lumbung',
                'category' => 'Wisata Alam',
                'price' => 'Gratis',
                'image' => 'https://images.unsplash.com/photo-1472214222541-d510753a8707?auto=format&fit=crop&q=80&w=800',
                'description' => 'Batu karang raksasa berbentuk lumbung padi di sebelah barat Bukit Cumbri. Spot pemandangan sunset dan pelangi menakjubkan.',
                'highlights' => ['Sunset Spot', 'Pelangi Spot', 'Pemandangan Jawa Timur-Tengah'],
                'duration' => 'Sunset Spot',
                'best_time' => 'Sore hari 17:00 - 18:00',
                'activities' => 'Sunset Viewing, Fotografi, Pelangi Hunting, Picnic'
            ],
            [
                'name' => 'Tubing Sungai Kresek',
                'category' => 'Petualangan',
                'price' => 'Rp 200.000 / Orang',
                'image' => 'https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&q=80&w=800',
                'description' => 'Mengarungi jeram Sungai Kresek yang asri menggunakan ban pelampung. Didampingi pemandu profesional dan peralatan keselamatan yang teruji.',
                'highlights' => ['Sungai Jeram', 'Peralatan Safety', 'Wedang Jahe & Snack'],
                'duration' => '2-3 Jam',
                'best_time' => 'Siang hari 10:00 - 14:00',
                'activities' => 'Tubing, Adventure, Fotografi, Berenang'
            ],
            [
                'name' => 'Sungai Segandu',
                'category' => 'Relaksasi',
                'price' => 'Gratis',
                'image' => 'https://images.unsplash.com/photo-1508873696983-2df519f0397e?auto=format&fit=crop&q=80&w=800',
                'description' => 'Terletak di dekat Jembatan Ngandong sebagai akses utama masuk ke Desa Kepyar. Tempat memancing favorit dikelilingi persawahan.',
                'highlights' => ['Jembatan Ngandong', 'Spot Memancing', 'Piknik Warga'],
                'duration' => 'Relaksasi',
                'best_time' => 'Pagi/Sore Hari',
                'activities' => 'Memancing, Fotografi, Relaksasi'
            ]
        ];

        foreach ($wisataData as $w) {
            Wisata::updateOrCreate(['name' => $w['name']], $w);
        }

        // 3. Seed UMKM (Local Products)
        $umkmData = [
            [
                'name' => 'Kerajinan Mebel Kayu Jati',
                'category' => 'Mebel',
                'price' => 'Rp 500.000 - Rp 5.000.000+',
                'image' => 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=800',
                'description' => 'Mebel jati kokoh berkualitas tinggi dari kayu jati lokal, dibuat handmade dengan mengombinasikan gaya tradisional Jawa dan modern.'
            ],
            [
                'name' => 'Anyaman Bambu Tradisional',
                'category' => 'Kerajinan',
                'price' => 'Rp 50.000 - Rp 500.000',
                'image' => 'https://images.unsplash.com/photo-1606744824163-985d376605aa?auto=format&fit=crop&q=80&w=800',
                'description' => 'Tas, keranjang, caping, dan dekorasi rumah tangga ramah lingkungan dari bambu pilihan yang diproses secara tradisional.'
            ],
            [
                'name' => 'Minyak Menthe & Peppermint',
                'category' => 'Peppermint',
                'price' => 'Rp 25.000 - Rp 150.000',
                'image' => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=800',
                'description' => 'Minyak esensial peppermint murni, teh mint, dan permen olahan asli dari perkebunan tanaman mint Desa Kepyar.'
            ],
            [
                'name' => 'Kacang Mithi & Gabus Goreng',
                'category' => 'Makanan Tradisional',
                'price' => 'Rp 15.000 - Rp 100.000',
                'image' => 'https://images.unsplash.com/photo-1599599810769-bcde5a160d32?auto=format&fit=crop&q=80&w=800',
                'description' => 'Camilan renyah resep turun-temurun dari PKK Desa Kepyar tanpa bahan pengawet. Gurih alami rasa ketumbar dan bumbu Jawa.'
            ],
            [
                'name' => 'Teh Herbal & Jamu Tradisional',
                'category' => 'Herbal & Kesehatan',
                'price' => 'Rp 25.000 - Rp 100.000',
                'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=800',
                'description' => 'Racikan jamu tradisional berkhasiat menjaga kebugaran tubuh serta teh herbal dari rempah-rempah yang ditanam di perkarangan rumah.'
            ],
            [
                'name' => 'Kain Tenun & Keramik Lokal',
                'category' => 'Kerajinan Lainnya',
                'price' => 'Rp 75.000 - Rp 1.000.000+',
                'image' => 'https://images.unsplash.com/photo-1626125345510-4603468eedfb?auto=format&fit=crop&q=80&w=800',
                'description' => 'Tenun bermotif khas Jawa asli dan perabot keramik (piring, vas) dibentuk manual oleh pengrajin seni berbakat Desa Kepyar.'
            ]
        ];

        foreach ($umkmData as $u) {
            Umkm::updateOrCreate(['name' => $u['name']], $u);
        }

        // 4. Seed Events
        $eventData = [
            [
                'name' => 'Adat Bersih Desa (Rasulan)',
                'category' => 'Tahunan',
                'frequency' => 'tahunan',
                'description' => 'Ritual tahunan adat wujud syukur kepada Tuhan atas kelimpahan panen. Dimeriahkan arak-arakan hasil bumi dan pertunjukan seni.',
                'schedule' => 'Setiap Bulan Sela (Kalender Jawa)',
                'location' => 'Pendopo Balai Desa Kepyar'
            ],
            [
                'name' => 'Hari Jadi Desa Kepyar',
                'category' => 'Tahunan',
                'frequency' => 'tahunan',
                'description' => 'Perayaan hari ulang tahun desa dengan bazar kuliner UMKM, perlombaan tradisional antar-RT, dan hiburan panggung rakyat.',
                'schedule' => 'Momen Tanggal Jadi Desa',
                'location' => 'Lapangan Desa Kepyar'
            ],
            [
                'name' => 'Pesta Rakyat Panen Raya',
                'category' => 'Tahunan',
                'frequency' => 'tahunan',
                'description' => 'Syukuran musim panen rendengan raya dengan balapan traktor sawah, pameran hasil tani, dan pasar tumpah.',
                'schedule' => 'Juni - Agustus (Musim Panen)',
                'location' => 'Lapangan Bulak Karang Tengah'
            ],
            [
                'name' => 'Pertunjukan Karawitan Setia Iromo',
                'category' => 'Bulanan',
                'frequency' => 'bulanan',
                'description' => 'Latihan terbuka kolosal dan pementasan bulanan kelompok karawitan desa Setia Iromo dengan 25+ gamelan lengkap.',
                'schedule' => 'Sabtu Kliwon Malam (Setiap Bulan)',
                'location' => 'Sanggar Seni Setia Iromo'
            ],
            [
                'name' => 'Forum Diskusi Rembug Warga',
                'category' => 'Bulanan',
                'frequency' => 'bulanan',
                'description' => 'Pertemuan silaturahmi antar-komunitas pemuda dan tokoh masyarakat untuk memusyawarahkan ide pembangunan desa.',
                'schedule' => 'Malam Minggu Pertama',
                'location' => 'Aula Balai Desa'
            ],
            [
                'name' => 'Pasar Rakyat Minggu Pon',
                'category' => 'Bulanan',
                'frequency' => 'bulanan',
                'description' => 'Pasar mingguan khusus yang menjual makanan pasar kuno, produk bambu warga dengan transaksi koin kayu.',
                'schedule' => 'Hari Minggu Pon (Mulai Pukul 06:00)',
                'location' => 'Pelataran Balai Desa'
            ],
            [
                'name' => 'Jamia Habsyi & Tahlilan Mingguan',
                'category' => 'Mingguan',
                'frequency' => 'mingguan',
                'description' => 'Kajian keagamaan dan pembacaan shalawat diiringi hadrah untuk mempererat silaturahmi spiritual warga desa.',
                'schedule' => 'Setiap Malam Jumat (Pukul 19:30)',
                'location' => 'Masjid Baiturrahman & Bergilir'
            ],
            [
                'name' => 'Dzikir Ratiban Dusun Ngandong',
                'category' => 'Mingguan',
                'frequency' => 'mingguan',
                'description' => 'Kegiatan zikir dan wirid bersama untuk ketenteraman sosial dan memohon keselamatan warga dusun.',
                'schedule' => 'Setiap Kamis Malam',
                'location' => 'Mushola Dusun Ngandong'
            ],
            [
                'name' => 'Senam Sehat & Pagi Bersama',
                'category' => 'Mingguan',
                'frequency' => 'mingguan',
                'description' => 'Senam kebugaran jasmani bersama ibu-ibu PKK dan kader kesehatan desa, dilanjutkan sarapan menu gizi seimbang.',
                'schedule' => 'Setiap Hari Minggu Pagi',
                'location' => 'Halaman Balai Desa'
            ],
            [
                'name' => 'Pementasan Wayang Kulit & Ketoprak',
                'category' => 'Festival Khusus',
                'frequency' => 'festival',
                'description' => 'Pementasan kolosal semalam suntuk lakon Wayang Kulit atau Ketoprak sebagai edukasi moral dan hiburan di momen hari kemerdekaan atau hari jadi desa.',
                'schedule' => 'Agustus (Hari Kemerdekaan)',
                'location' => 'Panggung Terbuka Desa'
            ]
        ];

        foreach ($eventData as $e) {
            Event::updateOrCreate(['name' => $e['name']], $e);
        }

        // 5. Seed Gallery
        $galleryData = [
            ['title' => 'Golden Hour Bukit Cumbri', 'category' => 'wisata', 'url' => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Aliran Jernih Air Terjun Sanginan', 'category' => 'wisata', 'url' => 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Gotong Royong Sambatan Rumah Warga', 'category' => 'budaya', 'url' => 'https://images.unsplash.com/photo-1544654803-b69140b285a1?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Produksi Kerajinan Bambu Ibu PKK', 'category' => 'umkm', 'url' => 'https://images.unsplash.com/photo-1606744824163-985d376605aa?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Latihan Kelompok Karawitan Setia Iromo', 'category' => 'budaya', 'url' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Minyak Peppermint Kemasan Ekspor', 'category' => 'umkm', 'url' => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Keseruan Body Rafting Sungai Kresek', 'category' => 'wisata', 'url' => 'https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&q=80&w=800'],
            ['title' => 'Karnaval Hari Jadi Desa Kepyar', 'category' => 'event', 'url' => 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=800']
        ];

        foreach ($galleryData as $g) {
            Gallery::updateOrCreate(['title' => $g['title']], $g);
        }

        // 6. Seed FAQs
        $faqData = [
            [
                'question_id' => 'Bagaimana cara memesan paket wisata Bukit Cumbri atau Tubing Sungai?',
                'question_en' => 'How do I book a tour package for Bukit Cumbri or River Tubing?',
                'answer_id' => 'Anda dapat memesan langsung melalui tombol Booking di setiap kartu wisata. Tombol tersebut akan mengarahkan Anda ke WhatsApp resmi admin pengelola wisata Desa Kepyar untuk pendataan tanggal dan pemandu.',
                'answer_en' => 'You can book directly via the Booking button on each tour card. The button will redirect you to the official WhatsApp of the Kepyar Village tourism admin to set dates and guides.',
            ],
            [
                'question_id' => 'Apakah trekking ke Bukit Cumbri aman untuk pemula?',
                'question_en' => 'Is trekking to Bukit Cumbri safe for beginners?',
                'answer_id' => 'Sangat aman! Bukit Cumbri berketinggian 638 mdpl dengan rute trekking bersahabat. Waktu tempuh dari pos pendakian dasar menuju puncak berkisar antara 45 hingga 60 menit.',
                'answer_en' => 'Very safe! Bukit Cumbri stands at 638 meters above sea level with beginner-friendly trekking routes. The journey from the base camp to the peak takes around 45 to 60 minutes.',
            ],
            [
                'question_id' => 'Apa saja fasilitas yang didapatkan dari paket Tubing Sungai Kresek?',
                'question_en' => 'What facilities are included in the Sungai Kresek Tubing package?',
                'answer_id' => 'Paket seharga Rp 200.000/orang termasuk penyewaan ban karet, jaket pelampung, helm pelindung, pemandu profesional, jemputan lokal, serta wedang jahe dan pisang goreng hangat.',
                'answer_en' => 'The package priced at Rp 200,000/person includes rubber tube rental, life jacket, safety helmet, professional guide, local pickup service, and warm ginger tea with fried bananas.',
            ],
        ];

        foreach ($faqData as $f) {
            Faq::updateOrCreate(['question_id' => $f['question_id']], $f);
        }

        // 7. Seed Testimonials
        $testimonialData = [
            [
                'name' => 'Rian Kurnia',
                'role' => 'Wisatawan Milenial',
                'quote' => 'Mendaki Bukit Cumbri di pagi hari sungguh luar biasa. Pemandangan sunrisenya tidak kalah dengan gunung besar lainnya. Warga desa juga ramah sekali!',
                'avatar' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=150&q=80',
                'rating' => 5,
                'status' => 'approved',
            ],
            [
                'name' => 'Siti Aminah',
                'role' => 'Kolektor Kerajinan',
                'quote' => 'Anyaman bambu dari Kepyar sangat rapi dan estetik. Saya menggunakannya untuk dekorasi kafe saya di Solo, para pelanggan banyak yang memuji.',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80',
                'rating' => 5,
                'status' => 'approved',
            ],
            [
                'name' => 'Budi Santoso',
                'role' => 'Pembeli Minyak Menthe',
                'quote' => 'Minyak peppermint olahan UMKM Kepyar sangat hangat dan melegakan tenggorokan. Rutin saya pesan lewat WhatsApp admin desa untuk keluarga.',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80',
                'rating' => 5,
                'status' => 'approved',
            ],
        ];

        foreach ($testimonialData as $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t);
        }

        // 8. Seed Site Settings
        $settingsData = [
            'hero_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1600',
            'hero_title' => 'Pesona Alam, Kehangatan Tradisi',
            'hero_subtitle' => 'Selamat datang di Desa Kepyar – permata tersembunyi di tengah perbukitan hijau Purwantoro, Wonogiri. Temukan hamparan alam yang asri, kehidupan sosial berlandaskan gotong-royong, dan produk kerajinan serta kuliner UMKM lokal yang autentik.',
            'banner_wisata' => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=1200',
            'banner_umkm' => 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=1200',
            'banner_profil' => 'https://images.unsplash.com/photo-1472214222541-d510753a8707?auto=format&fit=crop&q=80&w=1200',
            'banner_galeri' => 'https://images.unsplash.com/photo-1544654803-b69140b285a1?auto=format&fit=crop&q=80&w=1200',
            'banner_event' => 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=1200',
            'banner_budaya' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=1200',
            'budaya_image_karawitan' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=800',
            'budaya_image_ketoprak' => 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=800',
            'budaya_image_wayang' => 'https://images.unsplash.com/photo-1626125345510-4603468eedfb?auto=format&fit=crop&q=80&w=800',
            'profil_image_geografis' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&q=80&w=800',
            'site_favicon' => '/favicon.ico',
            'contact_whatsapp' => '628123456789',
            'contact_whatsapp_text' => '+62 812-3456-789',
            'social_instagram' => 'https://instagram.com/desa_keypyar',
            'social_instagram_username' => '@desa_keypyar',
            'social_facebook' => '#',
            'social_youtube' => '#',
            'social_tiktok' => '#',
            'contact_gmaps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15805.80775988118!2d111.27216664999999!3d-7.95213885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799db9c17df3bf%3A0xe53cc64700d27fd4!2sKepyar%2C%20Purwantoro%2C%20Wonogiri%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
            'video_profile_youtube' => 'https://www.youtube.com',
        ];

        // 9. Seed Aparatur Desa
        $aparaturData = [
            [
                'role' => 'Kepala Desa',
                'name' => 'Drs. H. Mulyono',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'role' => 'Sekretaris Desa',
                'name' => 'Rahmat Wijaya, S.E.',
                'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'role' => 'Kaur Keuangan',
                'name' => 'Endah Lestari, A.Md.',
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'role' => 'Kasi Pelayanan',
                'name' => 'Sugeng Riyadi',
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($aparaturData as $a) {
            Aparatur::updateOrCreate(['role' => $a['role']], $a);
        }

        // 10. Seed Dusun
        $dusunData = [
            ['name' => 'Dusun Kepyar', 'kadus' => 'Supriyanto', 'kk' => '320 KK', 'pilar' => 'Pertanian & UMKM', 'order' => 1],
            ['name' => 'Dusun Karang Tengah', 'kadus' => 'Jatmiko', 'kk' => '280 KK', 'pilar' => 'Agrowisata & Hortikultura', 'order' => 2],
            ['name' => 'Dusun Sumber', 'kadus' => 'Warsito', 'kk' => '250 KK', 'pilar' => 'Wisata Air & Hutan Rakyat', 'order' => 3],
            ['name' => 'Dusun Ngandong', 'kadus' => 'Marwan', 'kk' => '210 KK', 'pilar' => 'Petualangan Air & Peternakan', 'order' => 4],
        ];

        foreach ($dusunData as $d) {
            Dusun::updateOrCreate(['name' => $d['name']], $d);
        }

        // 11. Seed BPD Site Settings
        $bpdSettings = [
            'bpd_title' => 'Badan Permusyawaratan Desa (BPD)',
            'bpd_description' => 'Sebagai mitra kerja pemerintah desa dalam mengawasi pelaksanaan APBDes, menampung aspirasi masyarakat dusun, serta menyusun Peraturan Desa secara demokratis.',
            'bpd_badge' => 'Hubungan Harmonis & Adil',
        ];

        foreach ($bpdSettings as $key => $val) {
            \App\Models\SiteSetting::firstOrCreate(['key' => $key], ['value' => $val]);
        }

        // 12. Seed Berita & Artikel Desa
        $beritaData = [
            [
                'title' => 'Peningkatan Jalur Wisata Bukit Cumbri dan Akses Pertanian Dusun Karang Tengah Selesai Dikerjakan',
                'category' => 'Pembangunan',
                'excerpt' => 'Pemerintah Desa Kepyar bersama warga berhasil menyelesaikan rabat beton jalan menuju pos pendakian Bukit Cumbri guna mempermudah mobilitas wisatawan dan petani lokal.',
                'content' => "<p>Pemerintah Desa Kepyar bersama masyarakat gotong-royong menyelesaikan pembangunan rabat beton jalur penghubung antara Dusun Karang Tengah menuju pos pendakian Bukit Cumbri. Pembangunan sepanjang 850 meter ini didanai melalui optimalisasi Dana Desa tahun anggaran berjalan serta swadaya masyarakat.</p>\n\n<p>Kepala Desa Kepyar, Bapak Suparman, menyampaikan rasa syukurnya atas sinergi warga yang kompak menyelesaikan proyek tepat waktu. 'Dengan mulusnya akses jalan ini, wisatawan yang hendak menikmati sunrise di puncak Cumbri dapat berkendara dengan lebih aman dan nyaman. Di sisi lain, para petani kami juga tidak lagi kesulitan mengangkut hasil panen palawija dan hortikultura,' tuturnya saat meninjau lokasi.</p>\n\n<p>Selain perkerasan jalan, dipasang pula penerangan jalan bertenaga surya (PJU Solar Cell) pada beberapa titik belokan curam untuk meningkatkan keselamatan pengunjung di malam dan dini hari menjelang subuh.</p>",
                'image' => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=800',
                'author' => 'Pemerintah Desa Kepyar',
                'views' => 142,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Pelatihan Digital Marketing & Kurasi Produk UMKM Kerajinan Bambu Ibu-Ibu PKK Desa Kepyar',
                'category' => 'UMKM',
                'excerpt' => 'Upaya memperluas jangkauan pasar kerajinan anyaman bambu dan olahan herbal lokal, Pemdes menyelenggarakan workshop strategi penjualan e-commerce dan foto produk.',
                'content' => "<p>Dalam rangka mendorong kemandirian ekonomi pasca panen, kelompok ibu-ibu PKK Desa Kepyar mengikuti pelatihan pemasaran digital dan packaging modern untuk produk kerajinan anyaman bambu khas Dusun Kepyar.</p>\n\n<p>Pelatihan yang bertempat di Balai Desa Kepyar ini mengundang praktisi e-commerce dan desainer grafis. Para peserta dibimbing langsung cara mengambil foto produk yang estetik menggunakan smartphone, menulis deskripsi produk yang menarik pembeli, hingga cara mengelola akun toko di marketplace dan media sosial.</p>\n\n<p>Ibu Sri Wahyuni, salah satu perajin besek dan wadah bambu, mengaku sangat terbantu dengan adanya pelatihan ini. 'Dulu kami hanya menunggu tengkulak datang. Sekarang kami diajari cara memposting ke Instagram dan Shopee dengan foto yang jernih. Pesanan dari luar kota bahkan mulai berdatangan,' ungkapnya antusias.</p>",
                'image' => 'https://images.unsplash.com/photo-1606744824163-985d376605aa?auto=format&fit=crop&q=80&w=800',
                'author' => 'Tim Penggerak PKK',
                'views' => 98,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Semarak Pagelaran Seni Karawitan Setia Iromo dan Tradisi Bersih Dusun Sumber',
                'category' => 'Budaya',
                'excerpt' => 'Warga Dusun Sumber menggelar tradisi tahunan bersih dusun yang dirangkaikan dengan gending karawitan semalam suntuk sebagai wujud syukur atas limpahan mata air alami.',
                'content' => "<p>Suasana syahdu dan penuh kekeluargaan menyelimuti Dusun Sumber, Desa Kepyar, saat ratusan warga berkumpul merayakan tradisi tahunan Bersih Dusun. Acara dimulai dengan kirab tumpeng sedekah bumi mengitari mata air Air Terjun Sanginan dan diakhiri dengan doa bersama serta kenduri massal.</p>\n\n<p>Malam harinya, Paguyuban Karawitan Setia Iromo menyuguhkan tembang-tembang macapat dan gending Jawa klasik yang memukau para sesepuh serta generasi muda desa. Pelestarian kebudayaan leluhur ini menjadi komitmen kuat warga Kepyar di tengah arus modernisasi.</p>\n\n<p>'Tradisi ini bukan sekadar seremonial, melainkan pengingat kita semua untuk senantiasa menjaga kelestarian hutan lindung dan sumber mata air yang menghidupi persawahan kami,' pesan sesepuh dusun di sela acara.</p>",
                'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=800',
                'author' => 'Pokdarwis Kepyar',
                'views' => 210,
                'is_published' => true,
                'published_at' => now()->subDays(9),
            ],
            [
                'title' => 'Fasilitas River Tubing Sungai Kresek Siap Manjakan Pengunjung di Musim Liburan',
                'category' => 'Wisata',
                'excerpt' => 'Kelompok Sadar Wisata (Pokdarwis) menambah pelampung berstandar SNI, helm pelindung baru, dan pos rest area di titik finis Sungai Kresek.',
                'content' => "<p>Menyambut musim liburan sekolah dan akhir pekan panjang, daya tarik petualangan air Tubing Sungai Kresek di Desa Kepyar berbenah. Pengelola Pokdarwis Desa Kepyar kini telah melengkapi sarana keselamatan dengan 30 unit ban pelampung ganda, helm pelindung standar olahraga arus deras, serta rompi pelampung (life jacket) bersertifikat.</p>\n\n<p>Ketua Pokdarwis menjelaskan bahwa keamanan dan kenyamanan pengunjung adalah prioritas utama. Seluruh pemandu river tubing telah mengantongi sertifikasi rescue perairan dari Badan SAR dan dibekali SOP pertolongan pertama.</p>\n\n<p>Di samping itu, telah dibangun gazebo istirahat di titik finish yang menyajikan sajian kuliner khas desa seperti nasi tiwul, tempe goreng hangat, dan wedang jahe sereh gula aren.</p>",
                'image' => 'https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&q=80&w=800',
                'author' => 'Pokdarwis Kepyar',
                'views' => 175,
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => 'Peluncuran Portal Website Desa Kepyar: Akses Layanan & Informasi Lebih Mudah dan Terbuka',
                'category' => 'Pengumuman',
                'excerpt' => 'Website resmi Desa Kepyar kini hadir dengan sistem informasi terpadu yang memuat profil desa, paket wisata alam, katalog UMKM, agenda event, dan berita berkala.',
                'content' => "<p>Sebagai wujud transparansi publik dan pemanfaatan teknologi informasi di pedesaan, Pemerintah Desa Kepyar resmi meluncurkan portal website desa mandiri di domain kepyar-sumunar.com.</p>\n\n<p>Melalui portal ini, masyarakat luas baik warga setempat maupun wisatawan luar kota dapat dengan mudah mengeksplorasi destinasi unggulan seperti Bukit Cumbri dan Air Terjun Sanginan, memesan produk kerajinan khas desa, serta melihat kalender kegiatan budaya seperti karnaval dan bersih dusun.</p>\n\n<p>Admin desa juga dapat mengelola artikel informasi terkini secara mandiri lewat dashboard terintegrasi, menjadikan keterbukaan informasi publik berjalan secara berkelanjutan.</p>",
                'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=800',
                'author' => 'Admin Desa Kepyar',
                'views' => 320,
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($beritaData as $b) {
            Berita::updateOrCreate(['title' => $b['title']], $b);
        }
    }
}
