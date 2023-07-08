<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookRentController extends Controller
{
    function index() {
        return view('adminArea.peminjaman');        
    }
}
