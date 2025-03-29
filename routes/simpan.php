<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomunitasController;

// login

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login-post', [UserController::class, 'login'])->name('login-post');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/index', function () {
        return view('admin.index');
    });
});

Route::middleware(['auth', 'role:komunitas'])->group(function () {
    Route::get('/index/{id}', function ($id) {
        return view('index', ['id' => $id]);
    });
});

Route::get('/register', function () {
    return view('/register');
});


// fungsi Registrasi
Route::post('/register-post', [UserController::class, 'register']);




// Dashboard

Route::get('/dashboard/index', function () {
    return view('/dashboard/index');
});

Route::get('/dashboard/form', function () {
    return view('/dashboard/form');
});




// admin

Route::get('/admin/index', [UserController::class, 'data_pengguna']);

Route::get('/admin/view-komunitas', [UserController::class, 'data_komunitas']);


Route::get('/admin/add-komunitas', function () {
    return view('/admin/add-komunitas');
});


// Menampilkan form tambah artikel
Route::get('/admin/add-artikel', [ArtikelController::class, 'create'])->name('artikel.form');

// Proses tambah artikel
Route::post('/artikel-post', [ArtikelController::class, 'artikel'])->name('artikel.post');

// Menampilkan daftar artikel
Route::get('/admin/view-artikel', [ArtikelController::class, 'index'])->name('artikel.index');

// Menampilkan artikel berdasarkan ID
Route::get('/admin/view-artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/admin/add-hadiah', function () {
    return view('/admin/add-hadiah');
});


// luar

Route::get('/index', function () {
    return view('/index');
});

Route::get('/blog', function () {
    return view('/blog');
});

Route::get('/portfolio-details', function () {
    return view('/portfolio-details');
});

Route::get('/blog-details', function () {
    return view('/blog-deatils');
});

