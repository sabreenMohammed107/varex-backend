<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\VarexMediaController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

//website
Route::get('/', [IndexController::class, 'index']);
Route::get('/products', [IndexController::class, 'productList']);
Route::get('/product/{slug}', [IndexController::class, 'show'])->name('product.show');
Route::get('/media', [IndexController::class, 'mediaList']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::post('/contact', [ContactRequestController::class, 'store'])->name('contact.store');
Route::get('/about-us', [ContactRequestController::class, 'index'])->name('about.us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Categories routes with admin prefix and grouped under auth middleware
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', ProductTagController::class);
        Route::resource('certificates', CertificateController::class);
        Route::get('contact-us', [ContactUsController::class, 'edit'])->name('contact-us.edit');
        Route::post('contact-us', [ContactUsController::class, 'update'])->name('contact-us.update');
        Route::get('about-us/edit', [AboutUsController::class, 'edit'])->name('about.edit');
        Route::put('about-us/update', [AboutUsController::class, 'update'])->name('about.update');
        Route::resource('faqs', FaqsController::class);
        Route::resource('varex-media', VarexMediaController::class);
        Route::resource('products', ProductController::class);
        Route::get('products/{product}/gallery', [ProductGalleryController::class, 'index'])->name('products.gallery');
        Route::post('products/{product}/gallery', [ProductGalleryController::class, 'store'])->name('products.gallery.store');
        Route::put('products/{product}/gallery/{gallery}', [ProductGalleryController::class, 'update'])->name('products.gallery.update');
        Route::delete('products/{product}/gallery/{gallery}', [ProductGalleryController::class, 'destroy'])->name('products.gallery.destroy');
    });

});

require __DIR__ . '/auth.php';
