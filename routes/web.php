<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesanController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\PesanController as AdminPesanController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| FORM PESAN
|--------------------------------------------------------------------------
*/

Route::get('/pesan', [PesanController::class, 'create'])->name('pesan.form');
Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');

/*
|--------------------------------------------------------------------------
| ADMIN REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('login');

})->name('admin');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class,'index'])
            ->name('dashboard');

        Route::resource('berita', AdminBeritaController::class)
    ->parameters([
        'berita' => 'berita'
    ]);
        Route::resource('galeri', AdminGaleriController::class);
        Route::resource('pengumuman', AdminPengumumanController::class);
        Route::resource('agenda', AdminAgendaController::class);
        Route::resource('profil', AdminProfilController::class);
        Route::resource('kontak', AdminKontakController::class);

        // PESAN
        Route::resource('pesan', AdminPesanController::class);

        // BALAS PESAN
        Route::post('/pesan/{pesan}/balas',
            [AdminPesanController::class,'balas'])
            ->name('pesan.balas');

});

require __DIR__.'/auth.php';