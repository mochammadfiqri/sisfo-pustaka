<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

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

    // public function detailBook($id)
    // {
    //     $book = Book::find($id);
    //     return view('memberArea.detailBook', [
    //         'books' => $book
    //     ]);
    // }

    public function printReport() {
        $books = Book::with('categories')->get();
        return Excel::download(new BooksExport($books), 'rekap_buku_' . Carbon::now()->timestamp . '.xlsx');
    }
}