<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function index()
    {
        return view('memberArea.daftarbuku');
    }
}
