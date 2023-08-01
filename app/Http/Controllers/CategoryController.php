<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function printReport() {
        $category = Category::all();
        return Excel::download(new CategoryExport($category), 'rekap_kategori_' . Carbon::now()->timestamp . '.xlsx');
    }

    public function index()
    {
        return view('adminArea.category');
    }
}
