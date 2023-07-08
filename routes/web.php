<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\BookRentController;
use App\Http\Livewire\MemberArea\Member;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
    // return redirect('/login');
    return view('publicArea.index');
});

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
    // Route::get('/website', [WebsiteController::class, 'index']);
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware('only_admin')->group(function() {
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/e-catalog', [CatalogController::class, 'index'])->name('catalog');
        Route::get('/e-catalog/detail/{id}', [CatalogController::class, 'show'])->name('show');

        Route::get('/kategori-buku', [CategoryController::class, 'index'])->name('kategori');

        Route::get('/peminjaman-buku', [BookRentController::class, 'index'])->name('peminjamanBuku');

        // Route::get('/users', IndexUsers::class)->name('users')->middleware(['only_admin']);
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        // Route::get('/users/detail/{id}', DetailUsers::class)->name('detailUsers');
        Route::get('/users/detail/{id}', [DetailController::class, 'index'])->name('index');
        // Route::get('user-approve/{id}', DetailUsers::class, 'approveUsers')->name('approveUsers');

        Route::get('user-approve/{id}', [DetailController::class, 'userApprove']);

        Route::get('/profile-admin', [ProfileController::class, 'indexAdmin'])->name('profileAdmin');
    });
    
    Route::middleware('only_member')->group(function() {
        Route::get('/profile-member', [ProfileController::class, 'indexMember'])->name('profileMember');
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardMember');
        Route::get('/daftarbuku', [BookListController::class, 'index'])->name('daftarbuku');
        // Route::get('/member_area', Member::class);
    });
});