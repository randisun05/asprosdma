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

// Route::get('/', function () {
//     return view('Index', [

//     ]);
// })->name('/');

Route::get('/', [\App\Http\Controllers\Public\PublicController::class, 'index'])->name('/');


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
        Route::get('/registration/', [\App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('admin.registration.index');
        Route::post('/registration/store', [\App\Http\Controllers\Admin\RegistrationController::class, 'store'])->name('admin.registration.store');
        Route::get('/registration/group', [\App\Http\Controllers\Admin\RegistrationController::class, 'group'])->name('admin.registration.group');
        Route::get('/registration/group/{id}/done', [\App\Http\Controllers\Admin\RegistrationController::class, 'doneGroup'])->name('admin.registration.group.done');
        Route::get('/registration/group/{id}/confirm', [\App\Http\Controllers\Admin\RegistrationController::class, 'confirmGroup'])->name('admin.registration.group.confirm');
        Route::get('/registration/group/{id}/reject', [\App\Http\Controllers\Admin\RegistrationController::class, 'rejectGroup'])->name('admin.registration.group.reject');
        Route::post('/registration/import', [\App\Http\Controllers\Admin\RegistrationController::class, 'importStore'])->name('admin.registration.import.store');
        Route::get('/registration/import', [\App\Http\Controllers\Admin\RegistrationController::class, 'import'])->name('admin.registration.import');
        Route::get('/registration/{id}/email-approve', [\App\Http\Controllers\Admin\RegistrationController::class, 'Sendemailapprove'])->name('admin.registration.email.approve');
        Route::get('/registration/{id}/approve', [\App\Http\Controllers\Admin\RegistrationController::class, 'approve'])->name('admin.registration.approve');
        Route::get('/registration/{id}/confirm', [\App\Http\Controllers\Admin\RegistrationController::class, 'confirm'])->name('admin.registration.confirm');
        Route::post('/registration/{id}/paid', [\App\Http\Controllers\Admin\RegistrationController::class, 'paid'])->name('admin.registration.paid');
        Route::get('/registration/{id}/reject', [\App\Http\Controllers\Admin\RegistrationController::class, 'reject'])->name('admin.registration.reject');
        Route::get('/registration/{id}/email', [\App\Http\Controllers\Admin\RegistrationController::class, 'sendEmail'])->name('admin.registration.sendEmail');
        Route::get('/registration/paid/export', [\App\Http\Controllers\Admin\RegistrationController::class, 'exportPaid'])->name('admin.registration.export');
        Route::get('/registration/data/export', [\App\Http\Controllers\Admin\RegistrationController::class, 'exportRegistration'])->name('admin.registration.data.export');
        Route::resource('/registration', \App\Http\Controllers\Admin\RegistrationController::class, ['as' => 'admin']);
        Route::post('/posts/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');
        Route::resource('/posts', \App\Http\Controllers\Admin\PostController::class, ['as' => 'admin']);
        Route::get('/posts/{id}/limited', [\App\Http\Controllers\Admin\PostController::class, 'limited'])->name('admin.posts.limited');
        Route::get('/posts/{id}/approve', [\App\Http\Controllers\Admin\PostController::class, 'approve'])->name('admin.posts.approve');
        Route::get('/posts/{id}/return', [\App\Http\Controllers\Admin\PostController::class, 'return'])->name('admin.posts.return');
        Route::get('/posts/{id}/reject', [\App\Http\Controllers\Admin\PostController::class, 'reject'])->name('admin.posts.reject');
        Route::get('/posts/{id}/cancel', [\App\Http\Controllers\Admin\PostController::class, 'cancel'])->name('admin.posts.cancel');
        Route::post('/events/{id}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.events.update');
        Route::get('/events/{id}/change', [\App\Http\Controllers\Admin\EventController::class, 'change'])->name('admin.events.status.change');
        Route::resource('/events', \App\Http\Controllers\Admin\EventController::class, ['as' => 'admin']);
        Route::post('/medias/{id}', [\App\Http\Controllers\Admin\MediaController::class, 'update'])->name('admin.medias.update');
        Route::resource('/medias', \App\Http\Controllers\Admin\MediaController::class, ['as' => 'admin']);
        Route::post('/merchans/{id}', [\App\Http\Controllers\Admin\MerchanController::class, 'update'])->name('admin.merchans.update');
        Route::get('/merchans/{id}/change', [\App\Http\Controllers\Admin\MerchanController::class, 'change'])->name('admin.merchans.status');
        Route::resource('/merchans', \App\Http\Controllers\Admin\MerchanController::class, ['as' => 'admin']);
        Route::get('/category/create', [\App\Http\Controllers\Admin\PostController::class, 'categoryCreate'])->name('admin.category.create');
        Route::post('/category/store', [\App\Http\Controllers\Admin\PostController::class, 'categoryStore'])->name('admin.category.store');
        Route::resource('/setting', \App\Http\Controllers\Admin\AuthAdminController::class, ['as' => 'admin']);
        Route::resource('/members', \App\Http\Controllers\Admin\DataMembersController::class, ['as' => 'admin']);
    });
});



Route::get('/user/login', function () {

    //cek session users
    if(auth()->guard('member')->check()) {
        return redirect()->route('user.dashboard');
    }

    //return view login
    return \Inertia\Inertia::render('User/Auth/Login');
});

//login users
Route::post('/user/login', \App\Http\Controllers\User\LoginController::class)->name('user.login');

//prefix "admin"
Route::prefix('user')->group(function() {

    //middleware "auth"
    Route::group(['middleware' => ['member']], function () {
        //route dashboard
        Route::get('/dashboard', App\Http\Controllers\User\DashboardController::class)->name('user.dashboard');
        Route::get('/profile', [\App\Http\Controllers\User\DataProfileController::class, 'index'])->name('user.profile');
        Route::get('/profile/data-utama', [\App\Http\Controllers\User\DataProfileController::class, 'indexIndiv'])->name('user.profile.data-utama');
        Route::post('/profile/image', [\App\Http\Controllers\User\DataProfileController::class, 'updateImage'])->name('user.profile.data-utama.image');
        Route::get('/profile/data-jabatan', [\App\Http\Controllers\User\DataProfileController::class, 'indexPosition'])->name('user.profile.jabatan');
        Route::get('/profile/data-lainnya', [\App\Http\Controllers\User\DataProfileController::class, 'indexOther'])->name('user.profile.lainnya');
        Route::get('/main-data', [\App\Http\Controllers\User\DataProfileController::class, 'indexIndiv'])->name('user.main-data');
        Route::get('/profile/edit', [\App\Http\Controllers\User\DataProfileController::class, 'edit'])->name('user.profile.edit');
        Route::post('/profile/edit', [\App\Http\Controllers\User\DataProfileController::class, 'update'])->name('user.profile.update');
        Route::get('/profile/data-jabatan/edit', [\App\Http\Controllers\User\DataProfileController::class, 'editPosition'])->name('user.profile.editposition');
        Route::post('/profile/data-jabatan/edit', [\App\Http\Controllers\User\DataProfileController::class, 'updatePosition'])->name('user.profile.updateposition');
        Route::get('/posts/list', [\App\Http\Controllers\User\PostsController::class, 'list'])->name('user.posts.list');
        Route::get('/posts/list/{post:slug}', [\App\Http\Controllers\User\PostsController::class, 'showlist'])->name('user.posts.showlist');
        Route::post('/posts/{id}', [\App\Http\Controllers\User\PostsController::class, 'update'])->name('user.posts.update');
        Route::resource('/posts', \App\Http\Controllers\User\PostsController::class, ['as' => 'user']);
        Route::get('/posts/{id}/submission', [\App\Http\Controllers\User\PostsController::class, 'submission'])->name('user.posts.submission');
        Route::resource('/events', \App\Http\Controllers\User\EventController::class, ['as' => 'user']);
        Route::get('/events/{event:slug}', [\App\Http\Controllers\User\EventController::class, 'show'])->name('user.events.join');
        Route::post('/events/{id}/join', [\App\Http\Controllers\User\EventController::class, 'join'])->name('user.events.join');
        Route::get('/setting', [App\Http\Controllers\User\LoginController::class, 'setting'])->name('user.setting');
        Route::put('/setting/update', [App\Http\Controllers\User\LoginController::class, 'resetPassword'])->name('user.setting.update');
        Route::get('/merchans/', [\App\Http\Controllers\User\MerchansController::class, 'index'])->name('user.merchan.index');
        Route::get('/merchans/{id}', [\App\Http\Controllers\User\MerchansController::class, 'show'])->name('user.merchan.show');
    });
});


//public
Route::get('/registration', [\App\Http\Controllers\Public\RegistrationController::class, 'create'])->name('registration');
Route::get('/registration/berhasil', [\App\Http\Controllers\Public\RegistrationController::class, 'berhasil'])->name('registration.berhasil');
Route::post('/registration/store', [\App\Http\Controllers\Public\RegistrationController::class, 'store'])->name('registration.store');
Route::get('/registration/success', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('registration.success');
Route::get('/registration/paid/{id}', [\App\Http\Controllers\Public\RegistrationController::class, 'show'])->name('registration.paid.show');
Route::get('/registration/confirm/{id}/edit', [\App\Http\Controllers\Public\RegistrationController::class, 'edit'])->name('registration.confirm.edit');
Route::post('/registration/confirm/{id}', [\App\Http\Controllers\Public\RegistrationController::class, 'update'])->name('registration.confirm.update');
Route::post('/registration/paid/{id}', [\App\Http\Controllers\Public\RegistrationController::class, 'paid'])->name('registration.paid.success');
// Route::get('/registration/confirm/{id}/success', [\App\Http\Controllers\Public\RegistrationController::class, 'update'])->name('registration.confirm.success');
Route::get('/registration/success', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('registration.success');
Route::get('/registration/group', [\App\Http\Controllers\Public\RegistrationController::class, 'group'])->name('registration.group');
Route::post('/registration/group', [\App\Http\Controllers\Public\RegistrationController::class, 'groupStore'])->name('registration.group.store');
Route::get('/tentang-aspro', [\App\Http\Controllers\Public\PublicController::class, 'about'])->name('about');
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
Route::get('/kontak-kami', [\App\Http\Controllers\Public\PublicController::class, 'kontak'])->name('kontak');
Route::get('/berita', [\App\Http\Controllers\Public\PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{post:slug}', [\App\Http\Controllers\Public\PublicController::class, 'beritaView'])->name('berita.view');
Route::get('/data-anggota', [\App\Http\Controllers\Public\PublicController::class, 'dataAnggota'])->name('data-anggota');
Route::get('/events/{event:slug}', [\App\Http\Controllers\Public\EventsController::class, 'show'])->name('event.show');
Route::resource('/events', \App\Http\Controllers\Public\EventsController::class);
Route::resource('/berita', \App\Http\Controllers\Public\PostsController::class);
Route::resource('/merchans', \App\Http\Controllers\Public\MerchansController::class);
Route::get('/forget-password', [\App\Http\Controllers\Public\PublicController::class, 'forgetPassword'])->name('forget.password');
Route::get('/forget-password/email', [\App\Http\Controllers\Public\PublicController::class, 'emailforgetPassword'])->name('forget.password.email');

// Route::get('/forget-password/email', [\App\Http\Controllers\User\LoginController::class, 'emailforgetPassword'])->name('forget.password.email');

Route::get('/documents/{filename}', function ($filename) {
    $path = storage_path('app/public/document/' . $filename);

    if (!file_exists($path)) {//
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
