<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use App\Models\Barang;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;

use App\Exports\BarangExport;
use App\Exports\BarangMasukExport;
use App\Exports\BarangKeluarExport;
use App\Exports\PeminjamanExport;
use App\Exports\AsetExport;
use App\Exports\RuanganExport;

use Maatwebsite\Excel\Facades\Excel;

// LANDING PAGE (HALAMAN AWAL)
Route::get('/', function () {return view('welcome');});

// AUTH (LOGIN)
// LOGIN ADMIN
Route::get('/login-admin', [AuthController::class, 'showLogin']);
Route::post('/login-admin', [AuthController::class, 'login'])->name('login.admin');

// LOGIN PEMINJAM
Route::get('/login-user', [AuthController::class, 'showLoginUser']);
Route::post('/login-user', [AuthController::class, 'loginPeminjam'])->name('login.user');

// REGISTER PEMINJAM
Route::get('/register-user', [AuthController::class, 'showRegister']);
Route::post('/register-user', [AuthController::class, 'register'])->name('register.user');

// LOGOUT
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

// LUPA PASSWORD ADMIN
Route::get('/lupapasswordadmin', function () {return view('lupapasswordadmin');});

// LUPA PASSWORD PEMINJAM
Route::get('/lupapasswordpeminjam', function () {return view('lupapasswordpeminjam');});

// RESET PASSWORD ADMIN
Route::post('/reset-password-admin',[AuthController::class, 'resetPassword']);

// RESET PASSWORD PEMINJAM
Route::post('/reset-password-user',[AuthController::class, 'resetPasswordPeminjam']);

// DASHBOARD ADMIN
Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard');

// DASHBOARD PEMINJAM
// DASHBOARD PEMINJAM
Route::get('/dashboard-peminjam', function () {

    if(!session('user_id'))
    {
        return redirect('/login-user');
    }

    $user = \App\Models\User::find(
        session('user_id')
    );

    if(!$user)
    {
        return redirect('/login-user');
    }

    $notifikasi = \App\Models\Peminjaman::where(
        'user_id',
        session('user_id')
    )
    ->whereNotNull('notifikasi')
    ->latest()
    ->first();

    return view(
        'dashboardpeminjam',
        compact(
            'user',
            'notifikasi'
        )
    );
});
Route::post('/hapus-notifikasi', function () {

    \App\Models\Peminjaman::where(
        'user_id',
        session('user_id')
    )->update([
        'notifikasi' => null
    ]);

    return response()->json([
        'success' => true
    ]);

});
Route::get('/profil-peminjam', function () {if (!session('user_id')) {return redirect('/login-user');}$user = \App\Models\User::find(session('user_id'));if (!$user) {return redirect('/login-user');}return view('profilpeminjam', compact('user'));});
Route::get('/pengaturanprofilpeminjam', function () {if (!session('user_id')) {return redirect('/login-user');}$user = \App\Models\User::find(session('user_id'));if (!$user) {return redirect('/login-user');}return view('pengaturanprofilpeminjam', compact('user'));});

// MENU INVENTARIS
// barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/tambah', [BarangController::class, 'create'])->name('barang.create');

// aset
Route::get('/data-aset', [AssetController::class, 'index'])->name('aset.index');
Route::post('/simpan-aset', [AssetController::class, 'store'])->name('aset.simpan');
Route::put('/update-aset/{id}', [AssetController::class, 'update'])->name('aset.update');
Route::delete('/hapus-aset/{id}', [AssetController::class, 'destroy']);

// barang masuk
Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang.masuk');
Route::post('/barang-masuk/store', [BarangMasukController::class, 'store'])->name('barang.store');
Route::put('/barang-masuk/update/{id}',[BarangMasukController::class, 'update']);
Route::delete('/barang-delete/{id}', [BarangMasukController::class, 'destroy'])->name('barang.hapus');

// inventaris keluar
Route::get('/inventaris-keluar',[DashboardController::class, 'inventarisKeluar'])->name('inventaris.keluar');
Route::post('/inventaris-keluar/simpan',[DashboardController::class, 'storeKeluar'])->name('inventaris.keluar.simpan');
Route::put('/inventaris-keluar/update/{id}',[DashboardController::class, 'updateKeluar']);
Route::delete('/inventaris-keluar/hapus/{id}',[DashboardController::class, 'destroyKeluar']);

// lainnya
Route::get('/peminjaman',[PeminjamanController::class, 'index'])->name('peminjaman.index');

Route::get('/data-ruangan', [RuanganController::class, 'index'])->name('ruangan.index');

Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan.index');

// Route hapus barang sudah didefinisikan di atas (barang.hapus -> /barang-delete/{id})

// pengaturan profil admin
Route::get('/profil-admin', function () {if (!session('admin_id')) {return redirect('/login-admin');}$user = \App\Models\User::find(session('admin_id'));if (!$user) {return redirect('/login-admin');} return view('profiladmin', compact('user'));});
Route::get('/pengaturanprofiladmin', function () {if (!session('admin_id')) {return redirect('/login-admin');}$user = \App\Models\User::find(session('admin_id'));if (!$user) {return redirect('/login-admin');}return view('pengaturanprofiladmin', compact('user'));});
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/update-profile', [ProfileController::class, 'update']);

// data ruangan
Route::post('/tambah-ruangan/simpan',[RuanganController::class, 'store'])->name('ruangan.simpan');
Route::put('/ruangan/update/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
Route::get('/ruangan/detail/{id}',[RuanganController::class,'detail']);
Route::delete('/ruangan/hapus/{id}', [RuanganController::class, 'destroy'])->name('ruangan.hapus');
Route::get('/ruangan/{id}',[RuanganController::class, 'lihatRuangan']);

Route::get('/barang/{id}', function ($id) {$barang = Barang::findOrFail($id);return view('detailbarang', compact('barang'));});

Route::get('/pinjam-barang', function () {$barangs = Barang::all();return view('pinjambarang', compact('barangs'));});

// PEMINJAMAN
// FORM PINJAM BARANG
Route::get('/form-peminjaman/barang/{id}',[PeminjamanController::class, 'formBarang']);

// FORM PINJAM ASET
Route::get('/form-peminjaman/aset/{id}',[PeminjamanController::class, 'formAset']);

// SIMPAN PEMINJAMAN
Route::post('/simpan-peminjaman',[PeminjamanController::class, 'store'])->name('peminjaman.store');

// RIWAYAT PEMINJAMAN
Route::get('/riwayatpeminjaman',[PeminjamanController::class, 'riwayat']);
Route::delete('/peminjaman/hapus/{id}',[PeminjamanController::class,'hapus']);
Route::post('/peminjaman/update',[PeminjamanController::class,'update']);

// DATA PEMINJAMAN ADMIN
Route::get('/data-peminjaman',[PeminjamanController::class, 'index']);
Route::get('/peminjaman/detail/{id}',[PeminjamanController::class,'detail']);

// SETUJUI PEMINJAMAN / PENGEMBALIAN
Route::get('/peminjaman/setujui/{id}',[PeminjamanController::class,'setujui']);
Route::get('/peminjaman/tolak/{id}',[PeminjamanController::class,'tolak']);
Route::get('/peminjaman/setujui-pengembalian/{id}',[PeminjamanController::class,'setujuiPengembalian']);
Route::get('/peminjaman/tolak-pengembalian/{id}',[PeminjamanController::class,'tolakPengembalian']);

// data guru
Route::get('/data-guru', [GuruController::class, 'index']);
Route::post('/data-guru/store', [GuruController::class, 'store'])->name('guru.store');
Route::put('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/hapus/{id}', [GuruController::class, 'destroy'])->name('guru.hapus');

// data siswa
Route::get('/data-siswa', [SiswaController::class, 'index']);
Route::post('/data-siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.hapus');

// EXPORT EXCEL LAPORAN
Route::get('/laporan/barang/excel', function () {return Excel::download(new BarangExport,'laporan-barang.xlsx');});
Route::get('/laporan/aset/excel', function () {return Excel::download(new AsetExport,'laporan-aset.xlsx');});
Route::get('/laporan/ruangan/excel', function () {return Excel::download(new RuanganExport,'laporan-ruangan.xlsx');});
Route::get('/laporan/peminjaman/excel',[DashboardController::class, 'laporanPeminjamanExcel']);

// PDF LAPORAN
Route::get('/laporan/barang/pdf', [LaporanController::class, 'barangPdf']);
Route::get('/laporan/peminjaman/pdf',[DashboardController::class, 'laporanPeminjamanPdf']);
Route::get('/laporan/aset/pdf',[DashboardController::class, 'laporanAsetPdf']);
Route::get('/laporan/ruangan/pdf',[DashboardController::class,'laporanRuanganPdf']);

// CETAK SEMUA
Route::get('/laporan/semua/pdf',[DashboardController::class, 'laporanSemuaPdf']);
Route::get('/laporan/semua/excel',[DashboardController::class, 'laporanSemuaExcel']);

//DASHBOARD PEMINJAM
//PINJAM BARANG
Route::get('/pinjam-barang/{id}',[PeminjamanController::class,'pinjamBarang']);

//RIWAYAT PEMINJAMAN
Route::post('/peminjaman/pengembalian',[PeminjamanController::class,'pengembalian']);

//QR CODE
Route::get('/detail-barang-qr/{id}',[BarangController::class,'detail']);
Route::get('/detail-aset-qr/{id}',[AssetController::class,'detail']);