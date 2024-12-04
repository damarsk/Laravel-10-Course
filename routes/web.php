<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Register web routes for the application. These routes are loaded by the
| RouteServiceProvider and are assigned to the "web" middleware group.
|
*/

// INDEX AWAL
Route::get('/', function () {
    return view('welcome');
});

// ROUTE UNTUK LOGIN DAN REGISTER
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('proses_changePass', [AuthController::class, 'prosesForgotPassword'])->name('proses_forgot-password');

// ROUTE DENGAN MIDDLEWARE AUTH
Route::middleware(['auth'])->group(function () {

    // ROUTE UNTUK ADMIN
    Route::middleware(['cek_login:admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
        
        // ROUTE UNTUK CRUD POSTS/BLOG KHUSUS ADMIN
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::get('posts/trash', [PostController::class, 'trash'])->name('posts.trash');
        Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::patch('posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
        Route::delete('posts/{id}/permanent-delete', [PostController::class, 'permanentDelete'])->name('posts.permanent_delete');
    });

    // ROUTE UNTUK USER
    Route::middleware(['cek_login:user'])->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('posts,index');
    });

    // ROUTE UNTUK POSTS/BLOG UMUM
    Route::resource('posts', PostController::class)->except(['create', 'edit', 'trash', 'restore', 'permanentDelete']);
});

Route::get('about', [Controller::class, 'about'])->name('about');

Route::fallback(function () {
    return view('errors.404');
});