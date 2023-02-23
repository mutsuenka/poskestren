<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Models\InfoPostren;
use App\Models\Visit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return to_route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/info-postren', function () {
        $infoPostren = InfoPostren::find(1);
        return view('info_postren.edit', compact('infoPostren'));
    }
    )->name('info-postren.edit');
    Route::patch('/info-postren', [InfoPostren::class, 'update'])->name('info-postren.update');

    Route::get('/pasien/export', [PasienController::class, 'export'])->name('pasien.export');
    Route::resource('pasien', PasienController::class);

    Route::resource('obat', ObatController::class);

    Route::resource('user', UserController::class);

    // Route::resource('visit', VisitController::class)->except('edit')->middleware('auth');
    Route::get('/visit', [VisitController::class, 'index'])->name('visit.index');
    Route::get('/visit/farmasi', [VisitController::class, 'farmasi'])->name('visit.farmasi');
    Route::get('/visit/create', [VisitController::class, 'create'])->name('visit.create');
    Route::post('/visit', [VisitController::class, 'store'])->name('visit.store');
    Route::get('/visit/panggil/{visit}', [VisitController::class, 'panggil'])->name('visit.panggil');
    Route::get('/visit/noshow/{visit}', [VisitController::class, 'noshow'])->name('visit.noshow');
    Route::get('/visit/done/{visit}', [VisitController::class, 'serahkanObat'])->name('visit.obat');
    Route::put('/visit/edit/{visit}/vital', [VisitController::class, 'updateVitalSign'])->name('visit.update-vital');
    Route::put('/visit/edit/{visit}/pemeriksaan', [VisitController::class, 'updatePemeriksaan'])->name('visit.update-pemeriksaan');
    Route::get('/visit/edit/{visit}/{type}', [VisitController::class, 'edit'])->name('visit.edit');
    Route::get('/visit/show/{visit}', [VisitController::class, 'show'])->name('visit.show');

});

require __DIR__.'/auth.php';
