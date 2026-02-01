<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebProfileController;
use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

Route::controller(WebProfileController::class)->group(function () {
    Route::get('/', 'index')->name('web.home');       // Halaman Depan
    Route::get('/profil', 'profil')->name('web.profil'); // Halaman Profil/Visi Misi
    Route::get('/layanan', 'layanan')->name('web.layanan'); // Halaman Layanan
    Route::get('/kontak', 'kontak')->name('web.kontak');   // Halaman Kontak
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/ticket/{id}', [AdminController::class, 'show'])->name('admin.ticket.show');
    Route::patch('/admin/ticket/{id}', [AdminController::class, 'update'])->name('admin.ticket.update');
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
});

require __DIR__.'/auth.php';
