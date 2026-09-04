<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/wisata', [PageController::class, 'wisata'])->name('wisata');
Route::get('/budaya', [PageController::class, 'budaya'])->name('budaya');
Route::get('/umkm', [PageController::class, 'umkm'])->name('umkm');
Route::get('/event', [PageController::class, 'event'])->name('event');
Route::get('/galeri-kontak', [PageController::class, 'galeriKontak'])->name('galeri-kontak');
Route::post('/kontak', [PageController::class, 'submitKontak'])->name('kontak.submit');
Route::post('/testimoni', [PageController::class, 'submitTestimoni'])->name('testimonial.submit');

// Login & Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Custom Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Profile Settings
    Route::get('/profile', [AdminController::class, 'profileEdit'])->name('profile.edit');
    Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');

    // Website Settings
    Route::get('/settings', [AdminController::class, 'settingsEdit'])->name('settings.edit');
    Route::put('/settings', [AdminController::class, 'settingsUpdate'])->name('settings.update');

    // Wisata CRUD
    Route::get('/wisata', [AdminController::class, 'wisataIndex'])->name('wisata.index');
    Route::get('/wisata/create', [AdminController::class, 'wisataCreate'])->name('wisata.create');
    Route::post('/wisata', [AdminController::class, 'wisataStore'])->name('wisata.store');
    Route::get('/wisata/{id}/edit', [AdminController::class, 'wisataEdit'])->name('wisata.edit');
    Route::put('/wisata/{id}', [AdminController::class, 'wisataUpdate'])->name('wisata.update');
    Route::delete('/wisata/{id}', [AdminController::class, 'wisataDestroy'])->name('wisata.destroy');

    // UMKM CRUD
    Route::get('/umkm', [AdminController::class, 'umkmIndex'])->name('umkm.index');
    Route::get('/umkm/create', [AdminController::class, 'umkmCreate'])->name('umkm.create');
    Route::post('/umkm', [AdminController::class, 'umkmStore'])->name('umkm.store');
    Route::get('/umkm/{id}/edit', [AdminController::class, 'umkmEdit'])->name('umkm.edit');
    Route::put('/umkm/{id}', [AdminController::class, 'umkmUpdate'])->name('umkm.update');
    Route::delete('/umkm/{id}', [AdminController::class, 'umkmDestroy'])->name('umkm.destroy');

    // Event CRUD
    Route::get('/event', [AdminController::class, 'eventIndex'])->name('event.index');
    Route::get('/event/create', [AdminController::class, 'eventCreate'])->name('event.create');
    Route::post('/event', [AdminController::class, 'eventStore'])->name('event.store');
    Route::get('/event/{id}/edit', [AdminController::class, 'eventEdit'])->name('event.edit');
    Route::put('/event/{id}', [AdminController::class, 'eventUpdate'])->name('event.update');
    Route::delete('/event/{id}', [AdminController::class, 'eventDestroy'])->name('event.destroy');

    // Gallery CRUD
    Route::get('/gallery', [AdminController::class, 'galleryIndex'])->name('gallery.index');
    Route::get('/gallery/create', [AdminController::class, 'galleryCreate'])->name('gallery.create');
    Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [AdminController::class, 'galleryEdit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [AdminController::class, 'galleryUpdate'])->name('gallery.update');
    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('gallery.destroy');

    // FAQ CRUD
    Route::get('/faq', [AdminController::class, 'faqIndex'])->name('faq.index');
    Route::get('/faq/create', [AdminController::class, 'faqCreate'])->name('faq.create');
    Route::post('/faq', [AdminController::class, 'faqStore'])->name('faq.store');
    Route::get('/faq/{id}/edit', [AdminController::class, 'faqEdit'])->name('faq.edit');
    Route::put('/faq/{id}', [AdminController::class, 'faqUpdate'])->name('faq.update');
    Route::delete('/faq/{id}', [AdminController::class, 'faqDestroy'])->name('faq.destroy');

    // Testimonial Moderation
    Route::get('/testimonial', [AdminController::class, 'testimonialIndex'])->name('testimonial.index');
    Route::post('/testimonial/{id}/approve', [AdminController::class, 'testimonialApprove'])->name('testimonial.approve');
    Route::post('/testimonial/{id}/reject', [AdminController::class, 'testimonialReject'])->name('testimonial.reject');
    Route::delete('/testimonial/{id}', [AdminController::class, 'testimonialDestroy'])->name('testimonial.destroy');

    // Contact Messages Management
    Route::get('/messages', [AdminController::class, 'messagesIndex'])->name('messages.index');
    Route::post('/messages/{id}/read', [AdminController::class, 'messagesMarkAsRead'])->name('messages.read');
    Route::delete('/messages/{id}', [AdminController::class, 'messagesDestroy'])->name('messages.destroy');
});
