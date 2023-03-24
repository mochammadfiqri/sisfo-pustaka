<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function catalog()
    {
        return view('livewire.admin-area.catalog.index');
    }
}
