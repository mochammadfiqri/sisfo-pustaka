<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookReturnController extends Controller
{
    public function index()
    {
        return view('adminArea.pengembalian');
    }
}
