<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TinyUploadController;
use App\Http\Controllers\GalleryController;

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

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('index');
Route::get('show/{package}', [PackageController::class, 'show'])->name('package.show');

Route::middleware(['auth'])->group(function () {
    // Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    //     Route::get('/', [DashboardController::class, 'index'])->name('index');
    // });

    Route::post('tiny-image-upload', [TinyUploadController::class, 'uploadImage']);

     Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('edit', [Usercontroller::class, 'editProfile'])->name('edit');
        Route::patch('update', [Usercontroller::class, 'updateProfile'])->name('update');
    });

    Route::group(['prefix' => 'package', 'as' => 'package.'], function () {
        Route::get('/', [PackageController::class, 'index'])->name('index');
        Route::get('create', [PackageController::class, 'create'])->name('create');
        Route::post('store', [PackageController::class, 'store'])->name('store');
        Route::get('edit/{package}', [PackageController::class, 'edit'])->name('edit');
        Route::patch('update/{package}', [PackageController::class, 'update'])->name('update');
        Route::delete('destroy/{package}', [PackageController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('create', [GalleryController::class, 'create'])->name('create');
        Route::post('store', [GalleryController::class, 'store'])->name('store');
        Route::get('edit/{gallery}', [GalleryController::class, 'edit'])->name('edit');
        Route::patch('update/{gallery}', [GalleryController::class, 'update'])->name('update');
        Route::delete('destroy/{gallery}', [GalleryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('edit/{banner}', [BannerController::class, 'edit'])->name('edit');
        Route::patch('update/{banner}', [BannerController::class, 'update'])->name('update');
        Route::delete('destroy/{banner}', [BannerController::class, 'destroy'])->name('destroy');
    });
});

// Route::get('asd', function () {
//     $asd = [];

//     $path = public_path('frontend/img/ocean');
//     $files = \File::files($path);
//     foreach ($files as $key => $file) {
//         // $asd[] = $file->getFilename();
//         // get file extension
//         $extension = $file->getExtension();
//         // $asd[] = $extension;
//         // rename the file
//         $filename = 'gallery-'.$key.'.'.$extension;
//         \File::move($file, $path . '/' . $filename);
//     }

//     dd($asd);
// });
