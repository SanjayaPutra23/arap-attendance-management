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
    return view('welcome');
});
Route::get('/test/{telp}',[PesertaController::class,'test'] );
Route::get('/chek', function () {
    return view('pdf.rapat_pdf');
});


Route::get('/home', [DashboardController::class,'index'])->middleware(['auth'])->name('home');
Route::get('/hadir/{slugs}',[KehadiranController::class,'hadir'])->name('hadir');
Route::get('/notulen/{slugs}',[NotulensiController::class,'isinotulen'])->name('notulen');
Route::get('/notulen/validate/{slugs}',[NotulensiController::class,'validnote'])->name('notulen.validate');
Route::put('/notulen/prosess/{id}', [NotulensiController::class,'prosesnote'])->name('processnote');
Route::put('/notulen/validasi/{id}', [NotulensiController::class,'prosesval'])->name('validatenote');

Route::put('/hadir/prosess/{id}', [KehadiranController::class,'prosess'])->name('process');
Route::get('/berhasil/hadir/{slug}',[KehadiranController::class,'berhasil'])->name('berhasil');
Route::get('/unduh/{slug}',[KehadiranController::class,'printpdf'])->name('note.unduh');
Route::get('/admin/avatar/destroy',[PowerController::class,'destroy'])->name('admin.powerless');
//Ultraman
Route::prefix('admin')->middleware(['auth', 'auth.ultraAccess'])->name('admin.')->group( function (){
    Route::resource('/users', UserController::class);
    Route::get('/avatar/user/{id}',[PowerController::class,'index'])->name('power');
    Route::resource('/option', OptionController::class);
    Route::resource('/peserta', PesertaController::class);
    Route::get('/pur',[PoolController::class,'purage'] );
});



Route::resource('/profil', ProfilController::class)->except([
    'create', 'store' ,'show','destroy'
])->middleware(['auth']);
Route::post('/avatar', [ProfilController::class,'avatar'])->middleware(['auth'])->name('avatar');
Route::post('/password', [ProfilController::class,'password'])->middleware(['auth'])->name('password');
//Reviewer



Route::resource('/presensi', PresensiController::class)->middleware(['auth']);
Route::get('/presensi/isi/{id}',[PresensiController::class,'isi'])->middleware(['auth'])->name('presensi.isi');

Route::resource('/kehadiran', KehadiranController::class)->middleware(['auth']);
Route::post('/baru/kehadiran', [KehadiranController::class,'baru'])->middleware(['auth'])->name('kehadiran.baru');

Route::resource('/notulensi', NotulensiController::class);
Route::get('/notulensi/buat/{id}',[NotulensiController::class,'buat'])->middleware(['auth'])->name('notulensi.buat');
Route::get('/notulenpdf/{notulensi}',[NotulensiController::class,'printpdf'])->middleware(['auth'])->name('notulensi.prints');


Route::get('/printpdf/{id}',[PresensiController::class,'printpdf'])->middleware(['auth'])->name('presensi.prints');

Route::get('/peserta',[PesertaController::class,'uindex'])->middleware(['auth'])->name('peserta.index');
Route::post('/peserta',[PesertaController::class,'ustore'])->middleware(['auth'])->name('peserta.store');
Route::get('/peserta/{pesertum}/edit',[PesertaController::class,'uedit'])->middleware(['auth'])->name('peserta.edit');
Route::put('/peserta/{pesertum}',[PesertaController::class,'updateu'])->middleware(['auth'])->name('peserta.update');
Route::get('/peserta/{slug}/{pid}',[PresensiController::class,'sendnotif'])->middleware(['auth'])->name('peserta.notif');

Route::resource('/mesin', MesinController::class)->middleware(['auth']);
Route::resource('/pool', PoolController::class)->middleware(['auth']);
Route::get('/pool/pull/{id}',[PoolController::class,'pull'])->middleware(['auth'])->name('pull.pool');
Route::get('/pullall/pool',[PoolController::class,'pullall'])->middleware(['auth'])->name('pullall.pool');
Route::get('/pool/usbupload/{mesin}', [PoolController::class,'usbupload'])->middleware(['auth'])->name('pool.usb');
Route::post('/pool/upload/', [PoolController::class,'upload'])->middleware(['auth'])->name('pool.upload');

Route::get('/pur',[PoolController::class,'purage'] )->middleware(['auth'])->name('pur.pool');

Route::resource('/absensi', AbsensiController::class)->middleware(['auth']);
Route::get('/absensi/rekap/{absensi}', [AbsensiController::class,'showRekap'])->middleware(['auth'])->name('absensi.rekap');
Route::get('/absensi/user/{absensi}', [AbsensiController::class,'detail'])->middleware(['auth'])->name('absensi.user');
Route::get('/absensi/userpdf/{absensi}', [AbsensiController::class,'detailpdf'])->middleware(['auth'])->name('absensi.pdf.user');

Route::prefix('exel')->name('exel.')->middleware(['auth'])->group( function (){
    Route::get('/index',[ExcelController::class,'index'])->name('index');
    Route::get('/abesn/{absensi}',[ExcelController::class,'absen'])->name('absen');
    Route::get('/rekap/{absensi}',[ExcelController::class,'rekap'])->name('rekap');
    Route::get('/rekaphit/{absensi}',[ExcelController::class,'rekap2'])->name('rekaphit');
    Route::get('/rekaps/{absensi}',[ExcelController::class,'rekapS'])->name('rekap_satpam');
    Route::get('/rekaphits/{absensi}',[ExcelController::class,'rekap2S'])->name('rekaphit_satpam');
    Route::get('/detail/{absensi}',[ExcelController::class,'detailK'])->name('detailk');
    Route::get('/details/{absensi}',[ExcelController::class,'detailS'])->name('details');

});
Route::resource('/setting',SettingController::class)->middleware(['auth']);

Route::resource('/libur',LiburController::class)->middleware(['auth']);
Route::get('/add/libur', [LiburController::class,'tarik'])->middleware(['auth'])->name('libur.add');

Route::resource('/satpam', SatpamController::class)->middleware(['auth']);
Route::get('/satpam/rekap/{absensi}', [SatpamController::class,'showRekap'])->middleware(['auth'])->name('satpam.rekap');
Route::get('/satpam/user/{absensi}', [SatpamController::class,'detail'])->middleware(['auth'])->name('satpam.user');
Route::get('/satpam/userpdf/{absensi}', [SatpamController::class,'detailpdf'])->middleware(['auth'])->name('absensi.pdf.satpam');
Route::resource('/cs', CsController::class)->middleware(['auth']);
Route::get('/cs/user/{absensi}', [CsController::class,'detail'])->middleware(['auth'])->name('cs.user');
Route::get('/cs/userpdf/{absensi}', [CsController::class,'detailpdf'])->middleware(['auth'])->name('absensi.pdf.cs');

Route::resource('/pol', PolController::class)->middleware(['auth', 'auth.ultraAccess']);
