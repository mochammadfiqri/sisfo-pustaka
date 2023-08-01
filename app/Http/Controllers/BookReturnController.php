<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use App\Exports\PengembalianExport;
use Maatwebsite\Excel\Facades\Excel;

class BookReturnController extends Controller
{
    public function printReport() {
        $bookReturn = RentLogs::all();
        return Excel::download(new PengembalianExport($bookReturn), 'rekap_pengembalian_' . Carbon::now()->timestamp . '.xlsx');
    }
    
    public function index()
    {
        return view('adminArea.pengembalian');
    }
}
