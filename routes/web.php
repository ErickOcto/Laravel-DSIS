<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Officer\BookCategoryController;
use App\Http\Controllers\Officer\BookController;
use App\Http\Controllers\Officer\BorrowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Officer\DashboardController as OfficerDashboard;
use App\Models\BookCategory;
use Illuminate\Support\Facades\App;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detail-blog/{blog:slug}', [HomeController::class, 'detailBlog'])->name('detail-blog');
Route::put('/update-lihat/{id}', [HomeController::class, 'updateLihat'])->name('update-lihat');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/majors/{major:url}', [HomeController::class, 'majors'])->name('major');
Route::get('/profile/teachers', [HomeController::class, 'teachers'])->name('teachers');
Route::get('/profile/teachers/{id}', [HomeController::class, 'teacherDetails'])->name('teachers.detail');
Route::get('/profile/facilities/', [HomeController::class, 'facilities'])->name('facilities');
Route::get('/profile/facilities/{id}', [HomeController::class, 'facilityDetails'])->name('facilityDetails');

Route::get('/profile/visi-misi', function () {
    return view('profile-sekolah.visi');
})->name('profile.visi');


//Backend routes for students
Route::middleware(['auth', 'verified', 'makeSureRole:student'])->group( function(){

    //Student dashboard routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Student book
});

// Backend routes for admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'makeSureRole:admin', 'verified'])->group(function () {

    // Dashboard routes
    Route::get('dashboard', [HomeController::class, 'dashboardAdmin'])->name('dashboard');

    //Admin Category Management Routes
    Route::resource('category', CategoryController::class);
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete']);

    //Admin Blog Management Routes
    Route::resource('blog', BlogController::class);
    Route::put('blog/update/carousel/{id}', [BlogController::class, 'updateStatus'])->name('blog-update-carousel');
    Route::delete('blog/delete/{id}', [BlogController::class, 'delete']);

    //Admin Majors Management Routes
    Route::resource('majors', MajorController::class);
    Route::put('update-majors-status/{id}', [MajorController::class, 'updateStatus'])->name('majors.status');
    Route::delete('majors/delete/{id}', [MajorController::class, 'delete']);

    // Admin Student Management Routes
    Route::resource('user', StudentController::class);
    Route::delete('user/delete/{id}', [StudentController::class, 'delete']);

    //Admin Teacher Management Routes
    Route::resource('teacher', TeacherController::class);
    Route::delete('teacher/delete/{id}', [TeacherController::class, 'delete']);

});

//Backend routes for teacher
Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'verified', 'makeSureRole:teacher'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

//Backend routes for officer
Route::prefix('officer')->name('officer.')->middleware('auth', 'makeSureRole:officer')->group(function(){
    Route::get('dashboard', [OfficerDashboard::class, 'index'])->name('dashboard');

    //Books category routes
    Route::resource('book-categories', BookCategoryController::class);
    Route::delete('book-categories/delete/{id}', [BookCategoryController::class, 'delete']);
    //Books routes
    Route::resource('books', BookController::class);
    Route::delete('books/delete/{id}', [BookController::class, 'delete']);

    //Borrow routes
    Route::get('borrow', [BorrowController::class, 'index'])->name('borrow.index');
    Route::get('borrow/create', [BorrowController::class, 'create'])->name('borrow.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
