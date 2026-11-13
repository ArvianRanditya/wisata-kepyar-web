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
use App\Models\Aparatur;
use App\Models\Dusun;
use App\Models\SiteSetting;

class AdminController extends Controller
{
    /**
     * Admin Dashboard Overview
     */
    public function dashboard()
    {
        $stats = [
            'wisata' => Wisata::count(),
            'umkm' => Umkm::count(),
            'event' => Event::count(),
            'gallery' => Gallery::count(),
            'aparatur' => Aparatur::count(),
            'dusun' => Dusun::count(),
        ];

        // Fetch recent updates from all tables to build a unified activity log
        $recentWisata = Wisata::orderBy('updated_at', 'desc')->take(5)->get()->map(function($item) {
            return [
                'type' => 'Wisata',
                'title' => $item->name,
                'action' => 'diperbarui',
                'time' => $item->updated_at,
                'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-100'
            ];
        });

        $recentUmkm = Umkm::orderBy('updated_at', 'desc')->take(5)->get()->map(function($item) {
            return [
                'type' => 'UMKM',
                'title' => $item->name,
                'action' => 'diperbarui',
                'time' => $item->updated_at,
                'badge' => 'bg-amber-50 text-amber-700 border-amber-100'
            ];
        });

        $recentEvent = Event::orderBy('updated_at', 'desc')->take(5)->get()->map(function($item) {
            return [
                'type' => 'Event',
                'title' => $item->name,
                'action' => 'diperbarui',
                'time' => $item->updated_at,
                'badge' => 'bg-indigo-50 text-indigo-700 border-indigo-100'
            ];
        });

        $recentGallery = Gallery::orderBy('updated_at', 'desc')->take(5)->get()->map(function($item) {
            return [
                'type' => 'Galeri',
                'title' => $item->title,
                'action' => 'diperbarui',
                'time' => $item->updated_at,
                'badge' => 'bg-teal-50 text-teal-700 border-teal-100'
            ];
        });

        // Merge, sort, and slice to get the latest 5 activities
        $activities = collect()
            ->concat($recentWisata)
            ->concat($recentUmkm)
            ->concat($recentEvent)
            ->concat($recentGallery)
            ->sortByDesc('time')
            ->take(5)
            ->values()
            ->toArray();

        return view('admin.dashboard', compact('stats', 'activities'));
    }

    // =========================================================================
    // WISATA CRUD
    // =========================================================================
    
    public function wisataIndex()
    {
        $wisatas = Wisata::orderBy('created_at', 'desc')->get();
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function wisataCreate()
    {
        return view('admin.wisata.create');
    }

    public function wisataStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'description' => 'required|string',
            'highlights' => 'nullable|string', // comma separated input
            'duration' => 'nullable|string|max:255',
            'best_time' => 'nullable|string|max:255',
            'activities' => 'nullable|string|max:255',
        ]);

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['image'] = '/uploads/' . $filename;
        }

        // Convert highlights comma-string to array
        if (!empty($validated['highlights'])) {
            $validated['highlights'] = array_map('trim', explode(',', $validated['highlights']));
        } else {
            $validated['highlights'] = [];
        }

        // Set default image if none provided
        if (empty($validated['image'])) {
            $validated['image'] = 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=800';
        }

        Wisata::create($validated);

        return redirect()->route('admin.wisata.index')->with('success', 'Paket Wisata berhasil ditambahkan!');
    }

    public function wisataEdit($id)
    {
        $wisata = Wisata::findOrFail($id);
        // Convert highlights array to comma string for form display
        $wisata->highlights_str = is_array($wisata->highlights) ? implode(', ', $wisata->highlights) : '';
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function wisataUpdate(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'description' => 'required|string',
            'highlights' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'best_time' => 'nullable|string|max:255',
            'activities' => 'nullable|string|max:255',
        ]);

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            // Delete old file if uploaded locally
            if ($wisata->image && str_starts_with($wisata->image, '/uploads/')) {
                $oldPath = public_path($wisata->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['image'] = '/uploads/' . $filename;
        }

        // Convert highlights comma-string to array
        if (!empty($validated['highlights'])) {
            $validated['highlights'] = array_map('trim', explode(',', $validated['highlights']));
        } else {
            $validated['highlights'] = [];
        }

        if (empty($validated['image'])) {
            $validated['image'] = $wisata->image;
        }

        $wisata->update($validated);

        return redirect()->route('admin.wisata.index')->with('success', 'Paket Wisata berhasil diperbarui!');
    }

    public function wisataDestroy($id)
    {
        $wisata = Wisata::findOrFail($id);

        // Delete uploaded file if uploaded locally
        if ($wisata->image && str_starts_with($wisata->image, '/uploads/')) {
            $filePath = public_path($wisata->image);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $wisata->delete();
        return redirect()->route('admin.wisata.index')->with('success', 'Paket Wisata berhasil dihapus!');
    }

    // =========================================================================
    // UMKM CRUD
    // =========================================================================

    public function umkmIndex()
    {
        $umkms = Umkm::orderBy('created_at', 'desc')->get();
        return view('admin.umkm.index', compact('umkms'));
    }

    public function umkmCreate()
    {
        return view('admin.umkm.create');
    }

    public function umkmStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'description' => 'required|string',
        ]);

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['image'] = '/uploads/' . $filename;
        }

        if (empty($validated['image'])) {
            $validated['image'] = 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=800';
        }

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Produk UMKM berhasil ditambahkan!');
    }

    public function umkmEdit($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function umkmUpdate(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'description' => 'required|string',
        ]);

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            // Delete old file if uploaded locally
            if ($umkm->image && str_starts_with($umkm->image, '/uploads/')) {
                $oldPath = public_path($umkm->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['image'] = '/uploads/' . $filename;
        }

        if (empty($validated['image'])) {
            $validated['image'] = $umkm->image;
        }

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Produk UMKM berhasil diperbarui!');
    }

    public function umkmDestroy($id)
    {
        $umkm = Umkm::findOrFail($id);

        // Delete uploaded file if uploaded locally
        if ($umkm->image && str_starts_with($umkm->image, '/uploads/')) {
            $filePath = public_path($umkm->image);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $umkm->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'Produk UMKM berhasil dihapus!');
    }

    // =========================================================================
    // EVENT CRUD
    // =========================================================================

    public function eventIndex()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    public function eventCreate()
    {
        return view('admin.event.create');
    }

    public function eventStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'frequency' => 'required|string|in:tahunan,bulanan,mingguan,festival',
            'description' => 'required|string',
            'schedule' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        Event::create($validated);

        return redirect()->route('admin.event.index')->with('success', 'Event baru berhasil ditambahkan!');
    }

    public function eventEdit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function eventUpdate(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'frequency' => 'required|string|in:tahunan,bulanan,mingguan,festival',
            'description' => 'required|string',
            'schedule' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $event->update($validated);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function eventDestroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus!');
    }

    // =========================================================================
    // GALLERY CRUD
    // =========================================================================

    public function galleryIndex()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function galleryCreate()
    {
        return view('admin.gallery.create');
    }

    public function galleryStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:wisata,budaya,umkm,event',
            'url' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['url'] = '/uploads/' . $filename;
        }

        if (empty($validated['url'])) {
            $validated['url'] = 'https://images.unsplash.com/photo-1544654803-b69140b285a1?auto=format&fit=crop&q=80&w=800';
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto Galeri berhasil ditambahkan!');
    }

    public function galleryEdit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function galleryUpdate(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:wisata,budaya,umkm,event',
            'url' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        // Handle File Upload
        if ($request->hasFile('image_file')) {
            // Delete old file if uploaded locally
            if ($gallery->url && str_starts_with($gallery->url, '/uploads/')) {
                $oldPath = public_path($gallery->url);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['url'] = '/uploads/' . $filename;
        }

        if (empty($validated['url'])) {
            $validated['url'] = $gallery->url;
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto Galeri berhasil diperbarui!');
    }

    public function galleryDestroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete uploaded file if uploaded locally
        if ($gallery->url && str_starts_with($gallery->url, '/uploads/')) {
            $filePath = public_path($gallery->url);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Foto Galeri berhasil dihapus!');
    }

    // =========================================================================
    // PROFILE SETTINGS
    // =========================================================================

    public function profileEdit()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profil dan Password berhasil diperbarui!');
    }


    // =========================================================================
    // CONTACT MESSAGES MANAGEMENT
    // =========================================================================

    public function messagesIndex()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function messagesMarkAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['status' => 'read']);
        return response()->json(['success' => true]);
    }

    public function messagesDestroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan masuk berhasil dihapus!');
    }

    // =========================================================================
    // FAQ CRUD
    // =========================================================================

    public function faqIndex()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function faqCreate()
    {
        return view('admin.faq.create');
    }

    public function faqStore(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|string',
            'question_en' => 'required|string',
            'answer_id' => 'required|string',
            'answer_en' => 'required|string',
        ]);

        Faq::create($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function faqEdit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function faqUpdate(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validated = $request->validate([
            'question_id' => 'required|string',
            'question_en' => 'required|string',
            'answer_id' => 'required|string',
            'answer_en' => 'required|string',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui!');
    }

    public function faqDestroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus!');
    }

    // =========================================================================
    // TESTIMONIAL MODERATION
    // =========================================================================

    public function testimonialIndex()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function testimonialApprove($id)
    {
        $t = Testimonial::findOrFail($id);
        $t->update(['status' => 'approved']);
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil disetujui untuk ditayangkan!');
    }

    public function testimonialReject($id)
    {
        $t = Testimonial::findOrFail($id);
        $t->update(['status' => 'rejected']);
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni ditolak / disembunyikan!');
    }

    public function testimonialDestroy($id)
    {
        $t = Testimonial::findOrFail($id);
        $t->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil dihapus!');
    }

    // =========================================================================
    // WEBSITE APPEARANCE SETTINGS
    // =========================================================================

    public function settingsEdit()
    {
        $settings = \App\Models\SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.edit', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $keys = [
            'hero_title',
            'hero_subtitle',
            'contact_whatsapp',
            'contact_whatsapp_text',
            'social_instagram',
            'social_instagram_username',
            'social_facebook',
            'social_youtube',
            'social_tiktok',
            'contact_gmaps_embed',
            'video_profile_youtube',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                \App\Models\SiteSetting::setValue($key, $request->input($key));
            }
        }

        $imageKeys = [
            'hero_image',
            'banner_wisata',
            'banner_umkm',
            'banner_profil',
            'banner_galeri',
            'banner_event',
            'banner_budaya',
            'budaya_image_karawitan',
            'budaya_image_ketoprak',
            'budaya_image_wayang',
            'profil_image_geografis',
            'site_favicon',
        ];

        foreach ($imageKeys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                
                // Ensure target directory exists
                $targetDir = public_path('uploads/banners');
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                
                $file->move($targetDir, $filename);
                $newPath = '/uploads/banners/' . $filename;

                // Garbage Collection for old banners
                $oldValue = \App\Models\SiteSetting::getValue($key);
                if ($oldValue && strpos($oldValue, '/uploads/') === 0) {
                    $oldFilePath = public_path($oldValue);
                    if (file_exists($oldFilePath)) {
                        @unlink($oldFilePath);
                    }
                }

                \App\Models\SiteSetting::setValue($key, $newPath);
            } elseif ($request->has($key . '_url') && !empty($request->input($key . '_url'))) {
                \App\Models\SiteSetting::setValue($key, $request->input($key . '_url'));
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan tampilan website berhasil diperbarui!');
    }

    /**
     * Aparatur Desa (Struktur Pemerintahan) CRUD
     */
    public function aparaturIndex()
    {
        $aparaturs = Aparatur::orderBy('order', 'asc')->get();
        $bpdTitle = SiteSetting::getValue('bpd_title', 'Badan Permusyawaratan Desa (BPD)');
        $bpdDescription = SiteSetting::getValue('bpd_description', 'Sebagai mitra kerja pemerintah desa dalam mengawasi pelaksanaan APBDes, menampung aspirasi masyarakat dusun, serta menyusun Peraturan Desa secara demokratis.');
        $bpdBadge = SiteSetting::getValue('bpd_badge', 'Hubungan Harmonis & Adil');

        return view('admin.aparatur.index', compact('aparaturs', 'bpdTitle', 'bpdDescription', 'bpdBadge'));
    }

    public function aparaturCreate()
    {
        return view('admin.aparatur.create');
    }

    public function aparaturStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['order'] = $validated['order'] ?? (Aparatur::max('order') + 1);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $targetDir = public_path('uploads/aparatur');
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $file->move($targetDir, $filename);
            $validated['image'] = '/uploads/aparatur/' . $filename;
        }

        if (empty($validated['image'])) {
            $validated['image'] = 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80';
        }

        Aparatur::create($validated);

        return redirect()->route('admin.aparatur.index')->with('success', 'Aparatur Desa berhasil ditambahkan!');
    }

    public function aparaturEdit($id)
    {
        $aparatur = Aparatur::findOrFail($id);
        return view('admin.aparatur.edit', compact('aparatur'));
    }

    public function aparaturUpdate(Request $request, $id)
    {
        $aparatur = Aparatur::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|string|max:2048',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['order'] = $validated['order'] ?? $aparatur->order;
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_file')) {
            if ($aparatur->image && str_starts_with($aparatur->image, '/uploads/')) {
                $oldPath = public_path($aparatur->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $targetDir = public_path('uploads/aparatur');
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $file->move($targetDir, $filename);
            $validated['image'] = '/uploads/aparatur/' . $filename;
        }

        $aparatur->update($validated);

        return redirect()->route('admin.aparatur.index')->with('success', 'Data Aparatur Desa berhasil diperbarui!');
    }

    public function aparaturDestroy($id)
    {
        $aparatur = Aparatur::findOrFail($id);

        if ($aparatur->image && str_starts_with($aparatur->image, '/uploads/')) {
            $oldPath = public_path($aparatur->image);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }

        $aparatur->delete();

        return redirect()->route('admin.aparatur.index')->with('success', 'Aparatur Desa berhasil dihapus!');
    }

    public function aparaturUpdateBpd(Request $request)
    {
        $validated = $request->validate([
            'bpd_title' => 'required|string|max:255',
            'bpd_description' => 'required|string',
            'bpd_badge' => 'required|string|max:255',
        ]);

        SiteSetting::setValue('bpd_title', $validated['bpd_title']);
        SiteSetting::setValue('bpd_description', $validated['bpd_description']);
        SiteSetting::setValue('bpd_badge', $validated['bpd_badge']);

        return redirect()->route('admin.aparatur.index')->with('success', 'Informasi BPD berhasil diperbarui!');
    }

    /**
     * Wilayah Dusun CRUD
     */
    public function dusunIndex()
    {
        $dusuns = Dusun::orderBy('order', 'asc')->get();
        return view('admin.dusun.index', compact('dusuns'));
    }

    public function dusunCreate()
    {
        return view('admin.dusun.create');
    }

    public function dusunStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'kadus' => 'required|string|max:255',
            'kk' => 'required|string|max:255',
            'pilar' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $validated['order'] ?? (Dusun::max('order') + 1);

        Dusun::create($validated);

        return redirect()->route('admin.dusun.index')->with('success', 'Wilayah Dusun berhasil ditambahkan!');
    }

    public function dusunEdit($id)
    {
        $dusun = Dusun::findOrFail($id);
        return view('admin.dusun.edit', compact('dusun'));
    }

    public function dusunUpdate(Request $request, $id)
    {
        $dusun = Dusun::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'kadus' => 'required|string|max:255',
            'kk' => 'required|string|max:255',
            'pilar' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $dusun->update($validated);

        return redirect()->route('admin.dusun.index')->with('success', 'Data Wilayah Dusun berhasil diperbarui!');
    }

    public function dusunDestroy($id)
    {
        $dusun = Dusun::findOrFail($id);
        $dusun->delete();

        return redirect()->route('admin.dusun.index')->with('success', 'Wilayah Dusun berhasil dihapus!');
    }
}
