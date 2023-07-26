<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\password_resets;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login()
    {
        // return view('livewire.auth.login');
        return view('adminArea.auth.login');
    }

    public function register()
    {
        // return view('livewire.auth.register');
        return view('adminArea.auth.register');
    }

    public function forgotPassword()
    {
        return view('adminArea.auth.forgot-password');
    }

    public function resetPassword()
    {
        return view('adminArea.auth.reset-password');
    }

    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'token'    => 'required',
    //         'email'    => 'required|email',
    //         'password' => 'required|min:8|confirmed',
    //     ]);

    //     $status = Password::reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function (User $user, string $password) {
    //             $user->forceFill([
    //                 'password' => Hash::make($password),
    //             ])->setRememberToken(Str::random(60));

    //             $user->save();

    //             event(new PasswordReset($user));
    //         }
    //     );

    //     return $status === Password::PASSWORD_RESET
    //         ? redirect()->route('login')->with('toast_success', 'Password berhasil diganti !')
    //         : back()->with('toast_error', 'Masukan Password dengan benar !');
    // }

    public function sendResetLinkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('toast_error', 'Email tidak ditemukan !');
        }

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::to($user->email)->send(new ResetPasswordMail($user, $token));

        return redirect('/login')->with('toast_success', 'Password reset link sent successfully');
    }

    public function registerProcess(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'no_hp' => 'max:255',
            'alamat' => 'required',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah digunakan.',
        ]);
        if ($validator->fails()) {
            $errors = $validator->messages()->all();
            $error_message = implode('<br>', $errors);
            return back()->with('toast_error', $error_message)->withInput();
        }

        $hashedPassword = Hash::make($request->input('password'));
        $user = new User([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => $hashedPassword,
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat')
        ]);
        $user->save();
        return redirect('/register')->with('toast_success', 'Pendaftaran Berhasil! Silahkan hubungi Admin untuk Approval');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
        ]);
        
         if (Auth::attempt($credentials)) {
            //cek user active
            if(Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('toast_warning', 'Akun belum aktif, segera hubungi Admin');
            }
            
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('/dashboard')->with('toast_success', 'Login Berhasil');
            }

            if (Auth::user()->role_id == 2) {
                return redirect()->route('dashboardMember', ['username' => Auth::user()->username])->with('toast_success', 'Login Berhasil');
            }
        }
        return redirect('/login')->with('toast_error', 'Username & Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('toast_success', 'Berhasil Logout');;
    }
}