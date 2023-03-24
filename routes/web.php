<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Livewire\AdminArea\Catalog;
use App\Http\Livewire\AdminArea\Category;
use App\Http\Livewire\AdminArea\Dashboard;
use App\Http\Livewire\MemberArea\Member;

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
//     return redirect('/dashboard');
// });

Route::get('/', function () {
    return view('livewire.auth.login');
});

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
    Route::get('/website', [WebsiteController::class, 'index']);
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('only_admin');
    Route::get('/e-catalog', Catalog::class)->name('catalog')->middleware('only_admin');
    Route::get('/kategori-buku', Category::class)->name('kategori')->middleware('only_admin');
    // Route::get('/kategori-buku', [CategoryController::class, 'index'])->name('kategori')->middleware('only_admin');
    Route::get('/profile-admin', [ProfileController::class, 'indexAdmin'])->name('profileAdmin')->middleware('only_admin');
    Route::get('/profile-member', [ProfileController::class, 'indexMember'])->name('profileMember')->middleware('only_member');
    Route::get('/member_area', Member::class)->middleware(['only_member']);
});