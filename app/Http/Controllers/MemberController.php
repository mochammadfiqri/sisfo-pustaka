<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // $request->session()->flush();
        return view('livewire.member-area.index');
    }
}
