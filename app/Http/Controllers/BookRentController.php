<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class BookRentController extends Controller
{
    public function printReport() {
        $bookRent = RentLogs::all();
        return Excel::download(new PeminjamanExport($bookRent), 'rekap_peminjaman_' . Carbon::now()->timestamp . '.xlsx');
    }

    function index() {
        return view('adminArea.peminjaman');        
    }
}
