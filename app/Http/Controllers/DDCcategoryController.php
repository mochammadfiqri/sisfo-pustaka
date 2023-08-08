<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DDCcategoryController extends Controller
{
    public function index()
    {
        return view('adminArea.index-ddc');
    }
}
