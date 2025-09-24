<?php

use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\TingkatKecenderunganController;
use App\Http\Controllers\KondisiUserController;
use App\Http\Controllers\AuthController;
use App\Models\Diagnosa;
use App\Models\KondisiUser;
use App\Models\Gejala;
use App\Models\TingkatKecenderungan;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// routes/web.php

use App\Http\Controllers\HomeController; // Ganti dengan Controller Anda

// Tambahkan baris ini untuk mendaftarkan route 'landing'
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    return view('landing');
});

// Form Diagnosa (untuk user)
Route::get('/form', [DiagnosaController::class, 'create'])->name('diagnosa.create');

// Proses dan Hasil Diagnosa (untuk user tanpa login)
Route::post('/diagnosa/proses', [DiagnosaController::class, 'store'])->name('diagnosa.store');
Route::get('/diagnosa/hasil/{id}', [DiagnosaController::class, 'diagnosaResult'])->name('diagnosa.hasil');
Route::get('/diagnosa/download/{id}', [DiagnosaController::class, 'cetakPDF'])->name('diagnosa.cetak');


Route::get('/form-faq', function () {
    $data = [
        'gejala' => Gejala::all(),
        'kondisi_user' => KondisiUser::all()
    ];
    return view('faq', $data);
})->name('cl.form');

// Auth
Auth::routes(['register' => false]);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Admin route (hanya untuk yang login)
Route::middleware('auth')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', function () {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all(),
            'user' => User::all(),
            'tingkat_kecenderungan' => TingkatKecenderungan::all()
        ];
        return view('admin.dashboard', $data);
    });

    Route::get('/dashboard/admin', function () {
        $data = [
            'user' => User::all()
        ];
        return view('admin.list_admin', $data);
    });

    Route::get('/dashboard/add_admin', function () {
        return view('admin.add_admin');
    });

    // Gejala
    Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
    Route::post('/gejala/store', [GejalaController::class, 'store'])->name('gejala.store');
    Route::put('/gejala/{gejala}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('/gejala/{gejala}', [GejalaController::class, 'destroy'])->name('gejala.destroy');

    // Tingkat Kecenderungan
    Route::get('/kecenderungan', [TingkatKecenderunganController::class, 'index'])->name('kecenderungan.index');
    Route::post('/kecenderungan/store', [TingkatKecenderunganController::class, 'store'])->name('kecenderungan.store');
    Route::put('/kecenderungan/{kecenderungan}', [TingkatKecenderunganController::class, 'update'])->name('kecenderungan.update');
    Route::delete('/kecenderungan/{kecenderungan}', [TingkatKecenderunganController::class, 'destroy'])->name('kecenderungan.destroy');

    // Kondisi User
    Route::get('/kondisi', [KondisiUserController::class, 'index'])->name('kondisi.index');
    Route::post('/kondisi/store', [KondisiUserController::class, 'store'])->name('kondisi.store');
    Route::put('/kondisi/{kondisi}', [KondisiUserController::class, 'update'])->name('kondisi.update');
    Route::delete('/kondisi/{kondisi}', [KondisiUserController::class, 'destroy'])->name('kondisi.destroy');

    // Riwayat Diagnosa (Hanya untuk admin)
    Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    
    // Shortcut redirect home ke dashboard
    Route::get('/home', function () {
        return redirect('/dashboard');
    });

});