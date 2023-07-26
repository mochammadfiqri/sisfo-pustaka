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

    // Route::post('/forgot-password', function (Request $request) {
    // $request->validate(['email' => 'required|email']);

    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //         ? back()->with('toast_success', 'Password reset link sent successfully')
    //         : back()->with('toast_error', 'Email tidak ditemukan !');
    // })->name('password.email');

    // Route::get('/reset-password/{token}', function (string $token) {
    //     return view('adminArea.auth.reset-password', ['token' => $token]);
    // })->name('password.reset');
    // Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    // Route::post('/reset-password', function (Request $request) {
    //     $request->validate([
    //     'token'    => 'required',
    //     'email'    => 'required|email',
    //     'password' => 'required|min:8|confirmed',
    // ]);

    // $status = Password::reset(
    //     $request->only('email', 'password', 'password_confirmation', 'token'),
    //     function (User $user, string $password) {
    //         $user->forceFill([
    //             'password' => Hash::make($password),
    //         ])->setRememberToken(Str::random(60));

    //         $user->save();

    //         event(new PasswordReset($user));
    //     }
    // );

    // return $status === Password::PASSWORD_RESET
    //     ? redirect()->route('login')->with('toast_success', 'Password berhasil diganti !')
    //     : back()->with('toast_error', 'Masukan Password dengan benar !');
    // })->name('password.update');
    
    Route::get('/', function () {
        // return redirect('/login');
        return view('publicArea.index');
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware('only_admin')->group(function() {
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/e-catalog', [CatalogController::class, 'index'])->name('catalog');
        Route::get('/e-catalog/detail/{id}', [CatalogController::class, 'show'])->name('show');

        Route::get('/kategori_buku', [CategoryController::class, 'index'])->name('kategori');

        Route::get('/peminjaman_buku', [BookRentController::class, 'index'])->name('peminjamanBuku');

        Route::get('/get-user-books/{id}', [BookReturnController::class, 'getUserBooks']);
        Route::get('/pengembalian_buku', [BookReturnController::class, 'index'])->name('pengembalianBuku');

        // Route::get('/users', IndexUsers::class)->name('users')->middleware(['only_admin']);
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        // Route::get('/users/detail/{id}', DetailUsers::class)->name('detailUsers');
        Route::get('/users/detail/{id}', [DetailController::class, 'index'])->name('index');
        // Route::get('user-approve/{id}', DetailUsers::class, 'approveUsers')->name('approveUsers');

        Route::get('user-approve/{id}', [DetailController::class, 'userApprove']);

        Route::get('/profile_admin', [ProfileController::class, 'indexAdmin'])->name('profileAdmin');
    });
    
    Route::middleware('only_member')->group(function() {
        // Route::get('/peminjaman_buku_anggota', [MemberController::class, 'bookRentMember'])->name('bookRentMember');
        // Route::get('/pengembalian_buku_anggota', [MemberController::class, 'bookReturnMember'])->name('bookReturnMember');
        // Route::get('/profile_member', [MemberController::class, 'profileMember'])->name('profileMember');
        Route::get('/dashboard/{username}', [MemberController::class, 'dashboard'])->name('dashboardMember');
        Route::get('/daftar_buku', [MemberController::class, 'bookList'])->name('daftarbuku');
        
    });
});