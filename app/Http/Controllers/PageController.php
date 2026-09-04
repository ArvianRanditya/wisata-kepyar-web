<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Umkm;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\Testimonial;

class PageController extends Controller
{
    /**
     * Get mock Budaya data
     */
    private function getBudayaData()
    {
        return [
            [
                'name' => 'Seni Karawitan Jawa',
                'image' => \App\Models\SiteSetting::getValue('budaya_image_karawitan', 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=800'),
                'description' => 'Diwadahi oleh kelompok karawitan "Setia Iromo" dengan 25+ personil aktif. Menjaga kelestarian lagu-lagu gending klasik Jawa warisan leluhur.'
            ],
            [
                'name' => 'Ketoprak Tradisional',
                'image' => \App\Models\SiteSetting::getValue('budaya_image_ketoprak', 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=800'),
                'description' => 'Teater rakyat tradisional yang membawakan cerita sejarah (babad) maupun legenda rakyat, sarat dengan pesan moral dan nilai kesopanan.'
            ],
            [
                'name' => 'Wayang Kulit Filosofis',
                'image' => \App\Models\SiteSetting::getValue('budaya_image_wayang', 'https://images.unsplash.com/photo-1626125345510-4603468eedfb?auto=format&fit=crop&q=80&w=800'),
                'description' => 'Pertunjukan seni bayangan boneka kulit yang kaya akan simbolisme kehidupan dan pandangan dunia masyarakat Jawa dalam menghadapi realitas.'
            ]
        ];
    }

    /**
     * Home Page Action
     */
    public function home()
    {
        // Get dynamic highlights from database
        $wisataList = Wisata::take(3)->get()->toArray();
        $umkmList = Umkm::take(3)->get()->toArray();
        $eventList = Event::take(3)->get()->toArray();
        
        $testimonials = Testimonial::where('status', 'approved')->orderBy('created_at', 'desc')->get()->toArray();

        return view('home', compact('wisataList', 'umkmList', 'eventList', 'testimonials'));
    }

    /**
     * Profil Page Action
     */
    public function profil()
    {
        // 4 Dusun specified in the PDF: Ngandong, Sumber, Karang Tengah, Kepyar
        $dusun = [
            ['name' => 'Dusun Kepyar', 'kadus' => 'Supriyanto', 'kk' => '320 KK', 'pilar' => 'Pertanian & UMKM'],
            ['name' => 'Dusun Karang Tengah', 'kadus' => 'Jatmiko', 'kk' => '280 KK', 'pilar' => 'Agrowisata & Hortikultura'],
            ['name' => 'Dusun Sumber', 'kadus' => 'Warsito', 'kk' => '250 KK', 'pilar' => 'Wisata Air & Hutan Rakyat'],
            ['name' => 'Dusun Ngandong', 'kadus' => 'Marwan', 'kk' => '210 KK', 'pilar' => 'Petualangan Air & Peternakan'],
        ];

        $aparatur = [
            ['role' => 'Kepala Desa', 'name' => 'Drs. H. Mulyono', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80'],
            ['role' => 'Sekretaris Desa', 'name' => 'Rahmat Wijaya, S.E.', 'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80'],
            ['role' => 'Kaur Keuangan', 'name' => 'Endah Lestari, A.Md.', 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80'],
            ['role' => 'Kasi Pelayanan', 'name' => 'Sugeng Riyadi', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80'],
        ];

        return view('profil', compact('dusun', 'aparatur'));
    }

    /**
     * Wisata Page Action
     */
    public function wisata()
    {
        $wisataList = Wisata::all()->toArray();
        $faqList = Faq::all();
        return view('wisata', compact('wisataList', 'faqList'));
    }

    /**
     * Budaya Page Action
     */
    public function budaya()
    {
        $budayaList = $this->getBudayaData();
        $filosofi = [
            ['title' => 'Gotong Royong', 'desc' => 'Tradisi sambatan mendirikan rumah dan gugur gunung membersihkan desa secara sukarela.'],
            ['title' => 'Rukun & Harmonis', 'desc' => 'Menjaga persaudaraan yang erat antardusun tanpa memandang perbedaan latar belakang sosial.'],
            ['title' => 'Kebijaksanaan Hidup', 'desc' => 'Prinsip asah, asih, asuh dalam mendidik generasi muda berdasarkan falsafah luhur Jawa.'],
            ['title' => 'Sopan Santun', 'desc' => 'Penerapan unggah-ungguh bahasa dan tata krama dalam pergaulan sehari-hari.'],
        ];
        return view('budaya', compact('budayaList', 'filosofi'));
    }

    /**
     * UMKM Page Action
     */
    public function umkm()
    {
        $umkmList = Umkm::all()->toArray();
        return view('umkm', compact('umkmList'));
    }

    /**
     * Event Page Action
     */
    public function event()
    {
        $eventList = Event::all()->toArray();
        return view('event', compact('eventList'));
    }

    /**
     * Galeri & Kontak Page Action
     */
    public function galeriKontak()
    {
        $galeriList = Gallery::all()->toArray();
        return view('galeri-kontak', compact('galeriList'));
    }

    /**
     * Submit Contact Message via AJAX
     */
    public function submitKontak(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'required|string|in:wisata,umkm,umum',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda berhasil dikirim ke server Desa Kepyar.'
        ]);
    }

    /**
     * Submit Visitor Testimonial via AJAX
     */
    public function submitTestimoni(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'quote' => 'required|string',
        ]);

        $validated['status'] = 'pending';
        // Assign a nice random tourist avatar
        $avatars = [
            'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80',
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80',
            'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=150&q=80',
            'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=150&q=80'
        ];
        $validated['avatar'] = $avatars[array_rand($avatars)];

        Testimonial::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Ulasan Anda berhasil dikirim dan akan ditayangkan setelah dimoderasi oleh admin.'
        ]);
    }
}
