<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\VesselAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\QuoteAdminController;
use App\Http\Controllers\Admin\MessageAdminController;
use App\Http\Controllers\Admin\SettingAdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hakkimizda', [HomeController::class, 'about'])->name('about');
Route::get('/bogazlar-ve-limanlar', [HomeController::class, 'straitsAndPorts'])->name('straits-ports');

Route::get('/hizmetlerimiz', [ServiceController::class, 'index'])->name('services.index');
Route::get('/hizmetlerimiz/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/filomuz', [VesselController::class, 'index'])->name('vessels.index');

Route::get('/haberler', [NewsController::class, 'index'])->name('news.index');
Route::get('/haberler/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'sendContact'])->name('contact.send');
Route::post('/teklif-al', [ContactController::class, 'sendQuote'])->name('quote.send');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthAdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthAdminController::class, 'login']);
    Route::post('/logout', [AuthAdminController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/services', ServiceAdminController::class);
        Route::resource('/vessels', VesselAdminController::class);
        Route::resource('/news', NewsAdminController::class);

        Route::get('/quotes', [QuoteAdminController::class, 'index'])->name('quotes.index');
        Route::get('/quotes/{quote}', [QuoteAdminController::class, 'show'])->name('quotes.show');
        Route::patch('/quotes/{quote}/status', [QuoteAdminController::class, 'updateStatus'])->name('quotes.updateStatus');
        Route::delete('/quotes/{quote}', [QuoteAdminController::class, 'destroy'])->name('quotes.destroy');

        Route::get('/messages', [MessageAdminController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageAdminController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [MessageAdminController::class, 'destroy'])->name('messages.destroy');

        Route::get('/settings', [SettingAdminController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingAdminController::class, 'update'])->name('settings.update');
    });
});
