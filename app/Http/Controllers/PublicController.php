<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function indexAdmin()
    {
        return view('publicArea.index');
    }
}