<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        // $request->session()->flush();
        dd('ini website');
    }
}
