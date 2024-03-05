<?php

use App\Mail\SendEmailRegistration;
use Illuminate\Support\Facades\Mail;
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
    return view('Index', [
        // Add any data you want to pass to the view here
    ]);
});

Route::get('/email', function () {
    return view('Emails.Registration', [
        'data' => [
            'name' => "randi",
            'id' => "123"
        ]
        // Add any data you want to pass to the view here
    ]);
});
//prefix "admin"
Route::prefix('admin')->group(function() {

    //middleware "auth"
    Route::group(['middleware' => ['auth']], function () {
        //route dashboard
        Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
        Route::get('/registration/group', [\App\Http\Controllers\Admin\RegistrationController::class, 'group'])->name('admin.registration.group');
        Route::get('/registration/group/{id}/done', [\App\Http\Controllers\Admin\RegistrationController::class, 'doneGroup'])->name('admin.registration.group.done');
        Route::get('/registration/group/{id}/confirm', [\App\Http\Controllers\Admin\RegistrationController::class, 'confirmGroup'])->name('admin.registration.group.confirm');
        Route::get('/registration/group/{id}/reject', [\App\Http\Controllers\Admin\RegistrationController::class, 'rejectGroup'])->name('admin.registration.group.reject');
        Route::post('/registration/import', [\App\Http\Controllers\Admin\RegistrationController::class, 'importStore'])->name('admin.registration.import.store');
        Route::get('/registration/import', [\App\Http\Controllers\Admin\RegistrationController::class, 'import'])->name('admin.registration.import');
        Route::resource('/registration', \App\Http\Controllers\Admin\RegistrationController::class, ['as' => 'admin']);
        Route::get('/registration/{id}/approve', [\App\Http\Controllers\Admin\RegistrationController::class, 'approve'])->name('admin.registration.approve');
        Route::get('/registration/{id}/confirm', [\App\Http\Controllers\Admin\RegistrationController::class, 'confirm'])->name('admin.registration.confirm');
        Route::get('/registration/{id}/paid', [\App\Http\Controllers\Admin\RegistrationController::class, 'paid'])->name('admin.registration.paid');
        Route::get('/registration/{id}/reject', [\App\Http\Controllers\Admin\RegistrationController::class, 'reject'])->name('admin.registration.reject');
    });
});

//public
Route::get('/registration', [\App\Http\Controllers\Public\RegistrationController::class, 'create'])->name('registration');
Route::post('/registration/store', [\App\Http\Controllers\Public\RegistrationController::class, 'store']);
Route::get('/registration/success', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('registration.success');
Route::get('/registration/paid/{id}', [\App\Http\Controllers\Public\RegistrationController::class, 'show'])->name('registration.paid.show');
Route::get('/registration/confirm/{id}/edit', [\App\Http\Controllers\Public\RegistrationController::class, 'edit'])->name('registration.confirm.edit');
Route::post('/registration/paid/{id}/success', [\App\Http\Controllers\Public\RegistrationController::class, 'paid'])->name('registration.paid.success');
Route::get('/registration/confirm/{id}/success', [\App\Http\Controllers\Public\RegistrationController::class, 'update'])->name('registration.confirm.success');
Route::get('/registration/success', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('registration.success');
Route::get('/registration/group', [\App\Http\Controllers\Public\RegistrationController::class, 'group'])->name('registration.group');
Route::post('/registration/group', [\App\Http\Controllers\Public\RegistrationController::class, 'groupStore'])->name('registration.group.store');
Route::get('/tentang-kita', [\App\Http\Controllers\Public\PublicController::class, 'about'])->name('about');
Route::get('/ketua-umum', [\App\Http\Controllers\Public\PublicController::class, 'ketuaUmum'])->name('ketuaUmum');
Route::get('/peraturan-organisasi', [\App\Http\Controllers\Public\PublicController::class, 'peraturanOrganisasi'])->name('peraturanOrganisasi');
Route::get('/sejarah', [\App\Http\Controllers\Public\PublicController::class, 'sejarah'])->name('sejarah');
Route::get('/struktur-organisasi', [\App\Http\Controllers\Public\PublicController::class, 'strukturOrganisasi'])->name('strukturOrganisasi');
Route::get('/visi-misi', [\App\Http\Controllers\Public\PublicController::class, 'visiMisi'])->name('visiMisi');
Route::get('/bidang-hubungan-masyarakat-dan-kerja-sama', [\App\Http\Controllers\Public\PublicController::class, 'hubunganMasyarakat'])->name('hubunganMasyarakat');
Route::get('/bidang-hukum-dan-advokasi', [\App\Http\Controllers\Public\PublicController::class, 'hukumAdvokasi'])->name('hukumAdvokasi');
Route::get('/bidang-keanggotaan-dan-organisasi', [\App\Http\Controllers\Public\PublicController::class, 'keanggotaan'])->name('keanggotaan');
Route::get('/bidang-pengembangan-kapasitas-insani', [\App\Http\Controllers\Public\PublicController::class, 'pengembangan'])->name('pengembangan');
Route::get('/bidang-sumber-pendanaan-organisasi', [\App\Http\Controllers\Public\PublicController::class, 'sumberPendanaan'])->name('sumberPendanaan');
Route::get('/berita', [\App\Http\Controllers\Public\PublicController::class, 'berita'])->name('berita');
Route::get('/artikel', [\App\Http\Controllers\Public\PublicController::class, 'artikel'])->name('artikel');
Route::get('/cerita', [\App\Http\Controllers\Public\PublicController::class, 'cerita'])->name('cerita');


Route::get('/documents/{filename}', function ($filename) {
    $path = storage_path('app/public/document/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('documents.show');


Route::get('/send-email',function(){
    $data = [
        'name' => 'Syahrizal As',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];
   
    Mail::to('randisun1995@gmail.com')->send(new SendEmailRegistration($data));
   
    dd("Email Berhasil dikirim.");
});