<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('adminArea.catalog');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('adminArea.detail-catalog', [
            'books' => $book
        ]);
    }
}
