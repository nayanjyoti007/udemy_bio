<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\ProfileController;
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
    return view('front.index');
})->name('home');


// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'logout')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'editProfile')->name('admin.editProfile');
    Route::post('/admin/edit/profile', 'storeProfile')->name('admin.storeProfile');
});

// Home Slider All Route
Route::controller(HomeSlideController::class)->group(function () {
    Route::get('/admin/slider', 'homeslider')->name('home.slide');
    Route::post('/admin/update/slide', 'updateslider')->name('update.slider');
});

// About Page All Route
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'aboutpage')->name('about.page');
    Route::post('/admin/update/about', 'updateabout')->name('update.about');
    Route::get('/about', 'homeabout')->name('home.about');
    Route::get('/about/multi/image', 'multiimage')->name('about.multiimage');
    Route::post('/store/multi/image', 'storemultimage')->name('store.multimage');
    Route::get('/about/all/multi/image', 'allmultiimage')->name('about.all.multiimage');
});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
