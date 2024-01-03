<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/visi-misi', function () {
    return view('profile-sekolah.visi');
})->name('profile.visi');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Backend routes for admin
Route::prefix('admin')->name('admin.')->middleware('auth', 'makeSureRole:admin')->group(function () {

    // Dashboard routes
    Route::get('dashboard', [HomeController::class, 'dashboardAdmin'])->name('dashboard');

    //Admin Category Management Routes
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::delete('category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

    //Admin Blog Management Routes
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);

    Route::delete('blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
