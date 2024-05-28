<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index']);
Route::get('beranda', [App\Http\Controllers\User\HomeController::class, 'beranda'])->name('beranda');

Route::get('informasi/sakip', [App\Http\Controllers\User\DocumentController::class, 'informasiSakip'])->name('informasi.sakip');
Route::get('informasi/keuangan', [App\Http\Controllers\User\DocumentController::class, 'informasiKeuangan'])->name('informasi.keuangan');
Route::get('informasi/perencanaan', [App\Http\Controllers\User\DocumentController::class, 'informasiPerencanaan'])->name('informasi.perencanaan');
Route::get('informasi/pertanggungjawaban', [App\Http\Controllers\User\DocumentController::class, 'informasiPertanggungjawaban'])->name('informasi.pertanggungjawaban');
Route::get('informasi/renstra', [App\Http\Controllers\User\DocumentController::class, 'informasiRenstra'])->name('informasi.renstra');
Route::get('informasi/renja', [App\Http\Controllers\User\DocumentController::class, 'informasiRenja'])->name('informasi.renja');
Route::get('informasi/iku', [App\Http\Controllers\User\DocumentController::class, 'informasiIKU'])->name('informasi.iku');
Route::get('informasi/pohon-kinerja', [App\Http\Controllers\User\DocumentController::class, 'informasiPohonKinerja'])->name('informasi.pohonKinerja');
Route::get('informasi/perjanjian-kinerja', [App\Http\Controllers\User\DocumentController::class, 'informasiPerjanjian'])->name('informasi.perjanjianKinerja');
Route::get('informasi/rencana-aksi', [App\Http\Controllers\User\DocumentController::class, 'informasiRencanaAksi'])->name('informasi.rencanaAksi');
Route::get('informasi/laporan-kinerja', [App\Http\Controllers\User\DocumentController::class, 'informasiLaporanKinerja'])->name('informasi.laporanKinerja');
Route::get('informasi/monev-aksi', [App\Http\Controllers\User\DocumentController::class, 'informasiMonevAksi'])->name('informasi.monevAksi');


Route::get('tentang-bone-bolango/visi-misi', [App\Http\Controllers\User\ProfileController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('tentang-bone-bolango/struktur-perangkat-daerah', [App\Http\Controllers\User\ProfileController::class, 'strukturSKPD'])->name('profil.strukturSKPD');
Route::get('tentang-bone-bolango/daftar-perangkat-daerah', [App\Http\Controllers\User\ProfileController::class, 'daftarSKPD'])->name('profil.daftarSKPD');
Route::get('tentang-bone-bolango/daftar-kecamatan', [App\Http\Controllers\User\ProfileController::class, 'daftarKecamatan'])->name('profil.daftarKecamatan');

Route::get('selayang-pandang/prestasi-bone-bolango', [App\Http\Controllers\User\ProfileController::class, 'prestasiBoneBolango'])->name('profil.prestasiBoneBolango');

Route::middleware(['auth', 'web'])->prefix('admin')->as('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Profile 
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');

    // Award
    Route::resource('award', App\Http\Controllers\Admin\AwardController::class);

    // Agency
    Route::resource('agency', App\Http\Controllers\Admin\AgencyController::class);

    // Leader
    Route::resource('leader', App\Http\Controllers\Admin\LeaderController::class);

    // Document
    Route::resource('document', App\Http\Controllers\Admin\DocumentController::class);
    Route::post('upload', [App\Http\Controllers\Admin\DocumentController::class, 'upload'])->name('upload');
    Route::delete('revert', [App\Http\Controllers\Admin\DocumentController::class, 'revert'])->name('revert');

    // Agenda
    Route::resource('agenda', App\Http\Controllers\Admin\AgendaController::class);

    // Banner
    Route::resource('banner', App\Http\Controllers\Admin\BannerController::class);

    // User
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);

    // Role
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);
});
