<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebProfileController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\PejabatController;

// 1. PERBAIKAN: Penamaan (name) diubah menjadi 'web.' agar sesuai dengan Blade
Route::controller(WebProfileController::class)->name('web.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profil')->name('profil');
    Route::get('/layanan', 'layanan')->name('layanan');
    Route::get('/kontak', 'kontak')->name('kontak');
    Route::get('/agenda', 'agenda')->name('agenda');
    Route::get('/agenda/{id}', 'showAgenda')->name('agenda.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route Dashboard & Tiket Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/ticket/{id}', [AdminController::class, 'show'])->name('admin.ticket.show');
    Route::patch('/admin/ticket/{id}', [AdminController::class, 'update'])->name('admin.ticket.update');

    // Route CMS Berita
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

    // Route Report
    Route::get('/admin/report', [ReportController::class, 'index'])->name('admin.report.index');
    Route::get('/admin/report/print', [ReportController::class, 'print'])->name('admin.report.print');

    // 2. PERBAIKAN: Dikelompokkan dalam prefix 'admin' dan name 'admin.'
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil.index');
        Route::post('/profil/visi-misi', [AdminProfilController::class, 'updateVisiMisi'])->name('profil.update-visi-misi');

        // Route untuk Pejabat (Tambah, Edit, Hapus)
        Route::resource('pejabat', PejabatController::class)->except(['index', 'show']);
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
});

require __DIR__.'/auth.php';
