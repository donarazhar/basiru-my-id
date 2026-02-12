<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BestPracticeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\DigitalBookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\BestPracticeController as AdminBestPracticeController;
use App\Http\Controllers\Admin\DigitalBookController as AdminDigitalBookController;
use App\Http\Controllers\Admin\LibraryController as AdminLibraryController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/praktik-baik', [BestPracticeController::class, 'index'])->name('best-practices.index');
Route::get('/praktik-baik/{id}', [BestPracticeController::class, 'show'])->name('best-practices.show');

Route::get('/perpustakaan', [LibraryController::class, 'index'])->name('library.index');

Route::get('/buku-digital', [DigitalBookController::class, 'index'])->name('digital-books.index');
Route::get('/buku-digital/{id}', [DigitalBookController::class, 'show'])->name('digital-books.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authentication Routes (simple)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
})->middleware('guest');

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('galleries', AdminGalleryController::class)->except(['show']);
    Route::resource('videos', AdminVideoController::class)->except(['show']);
    Route::resource('best-practices', AdminBestPracticeController::class)->except(['show']);
    Route::resource('digital-books', AdminDigitalBookController::class)->except(['show']);
    Route::resource('library', AdminLibraryController::class)->except(['show']);
    Route::resource('quizzes', AdminQuizController::class)->except(['show']);

    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.delete-photo');

    Route::get('site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::post('site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');
});
