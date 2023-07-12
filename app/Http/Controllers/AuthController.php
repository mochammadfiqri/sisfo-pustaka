<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('livewire.auth.login');
    }

    public function register()
    {
        return view('livewire.auth.register');
    }

    public function registerProcess(Request $request) 
    {
        $validator = Validator::make($request->all(), [
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