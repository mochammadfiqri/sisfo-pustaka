<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\UsersController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\DDCcategoryController;

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

// Route::get('/', function () {
//     return view('publicArea.index');
// });

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);

    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
    
    Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    
    Route::get('/', function () {
        // return redirect('/login');
        return view('publicArea.index');
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware('only_admin')->group(function() {
        Route::get('/e-catalog', [CatalogController::class, 'index'])->name('catalog');
        Route::get('/e-catalog/detail/{id}', [CatalogController::class, 'show'])->name('show');
        Route::get('/e-catalog/export-book', [CatalogController::class, 'printReport']);

        Route::get('/kategori_buku', [CategoryController::class, 'index'])->name('kategori');
        Route::get('/kategori_buku/export-category', [CategoryController::class, 'printReport']);

        Route::get('/peminjaman_buku', [BookRentController::class, 'index'])->name('peminjamanBuku');
        Route::get('/peminjaman_buku/export-peminjaman', [BookRentController::class, 'printReport']);

        Route::get('/get-user-books/{id}', [BookReturnController::class, 'getUserBooks']);
        Route::get('/pengembalian_buku', [BookReturnController::class, 'index'])->name('pengembalianBuku');
        Route::get('/pengembalian_buku/export-pengembalian', [BookReturnController::class, 'printReport']);

        Route::get('/users', [UsersController::class, 'index'])->name('users');

        Route::get('/users/detail/{id}', [DetailController::class, 'index'])->name('index');
        Route::get('user-approve/{id}', [DetailController::class, 'userApprove']);

        Route::get('/profile_admin', [ProfileController::class, 'indexAdmin'])->name('profileAdmin');

        Route::get('/e-ddc', [DDCcategoryController::class, 'index'])->name('e-ddc');
    });
    
    Route::middleware('only_member')->group(function() {
        Route::get('/dashboard/{username}', [MemberController::class, 'dashboard'])->name('dashboardMember');
        // Route::get('/daftar_buku', [MemberController::class, 'bookList'])->name('bookList');
        Route::get('/daftar_buku', [MemberController::class, 'index'])->name('bookList');
        Route::get('/daftar_buku/detail/{id}', [MemberController::class, 'detailBook'])->name('detailBook');
        Route::post('/daftar_buku/detail/{id}/rent', [MemberController::class, 'approveBook'])->name('approveBook');
        Route::post('/daftar_buku/detail/{id}/return', [MemberController::class, 'returnBook'])->name('returnBook');
    });
});