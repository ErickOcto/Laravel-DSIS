<?php

use App\Http\Controllers\Api\Mobile\AuthController;
use App\Http\Controllers\Api\Mobile\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/teachers', App\Http\Controllers\Api\TeacherController::class);
Route::apiResource('/students', App\Http\Controllers\Api\StudentController::class);
Route::apiResource('/classes', App\Http\Controllers\Api\ClassController::class);
Route::apiResource('/officers', App\Http\Controllers\Api\OfficerController::class);

Route::get('/total-class', [DashboardController::class, 'classroomTotal']);
Route::get('/total-users', [DashboardController::class, 'userTotal']);
Route::get('/total-majors', [DashboardController::class, 'majorTotal']);
Route::get('/current-user', [DashboardController::class, 'currentUser']);


Route::post('/register', [AuthController::class, 'registerMobile']);
Route::post('/login', [AuthController::class, 'loginMobile']);

Route::get('/image/{filename}', function ($filename) {
    $path = 'images/' . $filename;
    if (Storage::exists($path)) {
        $file = Storage::get($path);
        $type = Storage::mimeType($path);
        return response($file, 200)->header('Content-Type', $type);
    } else {
        abort(404);
    }
});

Route::post('/login-react', [AuthController::class, 'loginReact']);
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout-react', [AuthController::class, 'logoutReact']);
});
