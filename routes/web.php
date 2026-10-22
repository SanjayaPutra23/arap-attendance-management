<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Admin\PowerController;
use App\Http\Controllers\LiburController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\NotulensiController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfilController;
Use App\Http\Controllers\PolController;
use App\Http\Controllers\SatpamController;
use App\Http\Controllers\CsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\UserPresensiController;
use App\Http\Controllers\User\UserIzinController;
use App\Http\Controllers\Admin\AdminIzinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;



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
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});
Route::get('/test/{telp}', [PesertaController::class, 'test'])->middleware(['auth', 'can:ultraman']);
Route::get('/chek', function () {
    return redirect()->route('home');
})->middleware(['auth', 'can:ultraman']);


Route::get('/home', [DashboardController::class,'index'])->middleware(['auth'])->name('home');
Route::get('/hadir/{slugs}',[KehadiranController::class,'hadir'])->name('hadir');
Route::get('/notulen/{slugs}',[NotulensiController::class,'isinotulen'])->name('notulen');
Route::get('/notulen/validate/{slugs}',[NotulensiController::class,'validnote'])->name('notulen.validate');
Route::put('/notulen/prosess/{id}', [NotulensiController::class,'prosesnote'])->name('processnote');
Route::put('/notulen/validasi/{id}', [NotulensiController::class,'prosesval'])->name('validatenote');

Route::put('/hadir/prosess/{id}', [KehadiranController::class,'prosess'])->name('process');
Route::get('/berhasil/hadir/{slug}',[KehadiranController::class,'berhasil'])->name('berhasil');
Route::get('/unduh/{slug}',[KehadiranController::class,'printpdf'])->name('note.unduh');
Route::get('/admin/avatar/destroy', [PowerController::class, 'destroy'])->middleware(['auth'])->name('admin.powerless');
//Ultraman
Route::prefix('admin')->middleware(['auth', 'auth.ultraAccess'])->name('admin.')->group( function (){
    Route::resource('/users', UserController::class);
    Route::get('/avatar/user/{id}',[PowerController::class,'index'])->name('power');
    Route::resource('/option', OptionController::class);
    Route::resource('/peserta', PesertaController::class);
    Route::post('/peserta/sync-relawan', [PesertaController::class, 'syncAccounts'])->name('peserta.sync');
    Route::get('/pur',[PoolController::class,'purage'] );
});



Route::resource('/profil', ProfilController::class)->except([
    'create', 'store' ,'show','destroy'
])->middleware(['auth']);
Route::post('/avatar', [ProfilController::class,'avatar'])->middleware(['auth'])->name('avatar');
Route::get('/avatar/svg/{id}', [ProfilController::class, 'avatarSvg'])->name('avatar.svg');
Route::post('/password', [ProfilController::class,'password'])->middleware(['auth'])->name('password');
//Reviewer



Route::resource('/presensi', PresensiController::class)->middleware(['auth', 'can:staff-access']);
Route::get('/presensi/isi/{id}', [PresensiController::class, 'isi'])->middleware(['auth', 'can:staff-access'])->name('presensi.isi');

Route::resource('/kehadiran', KehadiranController::class)->middleware(['auth', 'can:staff-access']);
Route::post('/baru/kehadiran', [KehadiranController::class, 'baru'])->middleware(['auth', 'can:staff-access'])->name('kehadiran.baru');

Route::resource('/notulensi', NotulensiController::class)->middleware(['auth', 'can:staff-access']);
Route::get('/notulensi/buat/{id}', [NotulensiController::class, 'buat'])->middleware(['auth', 'can:staff-access'])->name('notulensi.buat');
Route::get('/notulenpdf/{notulensi}', [NotulensiController::class, 'printpdf'])->middleware(['auth', 'can:staff-access'])->name('notulensi.prints');

Route::get('/printpdf/{id}', [PresensiController::class, 'printpdf'])->middleware(['auth', 'can:staff-access'])->name('presensi.prints');

Route::get('/peserta', [PesertaController::class, 'uindex'])->middleware(['auth', 'can:staff-access'])->name('peserta.index');
Route::post('/peserta', [PesertaController::class, 'ustore'])->middleware(['auth', 'can:staff-access'])->name('peserta.store');
Route::get('/peserta/{pesertum}/edit', [PesertaController::class, 'uedit'])->middleware(['auth', 'can:staff-access'])->name('peserta.edit');
Route::put('/peserta/{pesertum}', [PesertaController::class, 'updateu'])->middleware(['auth', 'can:staff-access'])->name('peserta.update');
Route::get('/peserta/{slug}/{pid}', [PresensiController::class, 'sendnotif'])->middleware(['auth', 'can:staff-access'])->name('peserta.notif');

Route::resource('/mesin', MesinController::class)->middleware(['auth', 'can:ultraman']);
Route::resource('/pool', PoolController::class)->middleware(['auth', 'can:umum']);
Route::get('/pool/pull/{id}', [PoolController::class, 'pull'])->middleware(['auth', 'can:umum'])->name('pull.pool');
Route::get('/pullall/pool', [PoolController::class, 'pullall'])->middleware(['auth', 'can:umum'])->name('pullall.pool');
Route::get('/pool/usbupload/{mesin}', [PoolController::class, 'usbupload'])->middleware(['auth', 'can:umum'])->name('pool.usb');
Route::post('/pool/upload/', [PoolController::class, 'upload'])->middleware(['auth', 'can:umum'])->name('pool.upload');

Route::get('/pur', [PoolController::class, 'purage'])->middleware(['auth', 'can:umum'])->name('pur.pool');

Route::resource('/absensi', AbsensiController::class)->middleware(['auth', 'can:umum']);
Route::get('/absensi/divisi/{divisi}', [AbsensiController::class, 'divisiIndex'])->middleware(['auth', 'can:umum'])->name('absensi.divisi');
Route::get('/absensi/divisi/{divisi}/show/{absensi}', [AbsensiController::class, 'divisiShow'])->middleware(['auth', 'can:umum'])->name('absensi.divisi.show');
Route::get('/absensi/divisi/{divisi}/rekap/{absensi}', [AbsensiController::class, 'divisiRekap'])->middleware(['auth', 'can:umum'])->name('absensi.divisi.rekap');
Route::get('/absensi/rekap/{absensi}', [AbsensiController::class, 'showRekap'])->middleware(['auth', 'can:umum'])->name('absensi.rekap');
Route::get('/absensi/user/{absensi}', [AbsensiController::class, 'detail'])->middleware(['auth', 'can:umum'])->name('absensi.user');
Route::get('/absensi/userpdf/{absensi}', [AbsensiController::class, 'detailpdf'])->middleware(['auth', 'can:umum'])->name('absensi.pdf.user');

Route::prefix('exel')->name('exel.')->middleware(['auth', 'can:staff-access'])->group(function () {
    Route::get('/index',[ExcelController::class,'index'])->name('index');
    Route::get('/abesn/{absensi}',[ExcelController::class,'absen'])->name('absen');
    Route::get('/rekap/{absensi}',[ExcelController::class,'rekap'])->name('rekap');
    Route::get('/rekaphit/{absensi}',[ExcelController::class,'rekap2'])->name('rekaphit');
    Route::get('/rekaps/{absensi}',[ExcelController::class,'rekapS'])->name('rekap_satpam');
    Route::get('/rekaphits/{absensi}',[ExcelController::class,'rekap2S'])->name('rekaphit_satpam');
    Route::get('/detail/{absensi}',[ExcelController::class,'detailK'])->name('detailk');
    Route::get('/details/{absensi}',[ExcelController::class,'detailS'])->name('details');
    Route::get('/detailpersepsi/{absensi}',[ExcelController::class,'detailPP'])->name('detailpersepsi');

});
Route::resource('/setting', SettingController::class)->middleware(['auth', 'can:staff-access']);

Route::resource('/libur', LiburController::class)->middleware(['auth', 'can:staff-access']);
Route::get('/add/libur', [LiburController::class, 'tarik'])->middleware(['auth', 'can:staff-access'])->name('libur.add');

Route::resource('/satpam', SatpamController::class)->middleware(['auth', 'can:umum']);
Route::get('/satpam/rekap/{absensi}', [SatpamController::class, 'showRekap'])->middleware(['auth', 'can:umum'])->name('satpam.rekap');
Route::get('/satpam/user/{absensi}', [SatpamController::class, 'detail'])->middleware(['auth', 'can:umum'])->name('satpam.user');
Route::get('/satpam/userpdf/{absensi}', [SatpamController::class, 'detailpdf'])->middleware(['auth', 'can:umum'])->name('absensi.pdf.satpam');

Route::resource('/cs', CsController::class)->middleware(['auth', 'can:umum']);
Route::get('/cs/rekap/{absensi}', [CsController::class, 'showRekap'])->middleware(['auth', 'can:umum'])->name('cs.rekap');
Route::get('/cs/user/{absensi}', [CsController::class, 'detail'])->middleware(['auth', 'can:umum'])->name('cs.user');
Route::get('/cs/userpdf/{absensi}', [CsController::class, 'detailpdf'])->middleware(['auth', 'can:umum'])->name('absensi.pdf.cs');

Route::resource('/pol', PolController::class)->middleware(['auth', 'auth.ultraAccess']);

Route::resource('/akademik', AkademikController::class)->middleware(['auth', 'can:akademik']);
Route::get('/persepsi/akademik', [AkademikController::class, 'persepsi'])->middleware(['auth', 'can:akademik'])->name('akademik.persepsi');
Route::post('/persepsi/akademik', [AkademikController::class, 'persepsi_new'])->middleware(['auth', 'can:akademik'])->name('akademik.persepsi.make');
Route::get('/detail/persepsi/akademik/{id}', [AkademikController::class, 'detail_persepsi'])->middleware(['auth', 'can:akademik'])->name('akademik.persepsi.detail');
Route::delete('/persepsi/akademik/{id}', [AkademikController::class, 'destroy'])->middleware(['auth', 'can:akademik'])->name('akademik.persepsi.destroy');
Route::get('/akademik/pull/{id}', [AkademikController::class, 'pull'])->middleware(['auth', 'can:akademik'])->name('akademik.pull');
Route::get('/akademik/pur', [AkademikController::class, 'purage'])->middleware(['auth', 'can:akademik'])->name('pur.akademik');

// Presensi Mandiri Relawan (Role User)
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/presensi', [UserPresensiController::class, 'index'])->name('presensi');
    Route::get('/presensi/{id}', [UserPresensiController::class, 'show'])->name('presensi.show');
    Route::get('/presensi/{id}/pdf', [UserPresensiController::class, 'downloadPdf'])->name('presensi.pdf');

    // Pengajuan Izin / Sakit Mandiri Relawan
    Route::get('/izin', [UserIzinController::class, 'index'])->name('izin.index');
    Route::get('/izin/create', [UserIzinController::class, 'create'])->name('izin.create');
    Route::post('/izin', [UserIzinController::class, 'store'])->name('izin.store');
    Route::get('/izin/{id}', [UserIzinController::class, 'show'])->name('izin.show');
    Route::get('/izin/{id}/download', [UserIzinController::class, 'downloadSurat'])->name('izin.download');
});

// Persetujuan Izin / Sakit Relawan (Admin TU)
Route::middleware(['auth', 'can:umum'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/izin', [AdminIzinController::class, 'index'])->name('izin.index');
    Route::get('/izin/{id}', [AdminIzinController::class, 'show'])->name('izin.show');
    Route::post('/izin/{id}/approve', [AdminIzinController::class, 'approve'])->name('izin.approve');
    Route::post('/izin/{id}/reject', [AdminIzinController::class, 'reject'])->name('izin.reject');
    Route::get('/izin/{id}/download', [AdminIzinController::class, 'downloadSurat'])->name('izin.download');
});
