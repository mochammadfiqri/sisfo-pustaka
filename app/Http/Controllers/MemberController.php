<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{   
    public $rent_date, $return_date;
    
    public function index() 
    {
        return view('memberArea.daftarbuku');
    }

    public function showPDF($filename)
    {
        // $path = 'pdf/' . $filename;
        // $file = Storage::disk('public')->get($path);
        // $response = new Response($file, 200);
        // $response->header('Content-Type', 'application/pdf');
        // return $response;

        // $path = 'public' . $filename . '.pdf'; // Sesuaikan dengan path dan ekstensi file yang tepat
        // $file = Storage::get($path);

        // if (!$file) {
        //     abort(404);
        // }

        // $response = new Response($file, 200);
        // $response->header('Content-Type', 'application/pdf');
        // return $response;
    }

    public function approveBook($id) {
        $rent_date = Carbon::now()->toDateString();
        $return_date = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($id)->only('status');
        if ($book['status'] != 'in stock') {
            return redirect('/daftar_buku')->with('toast_error', 'Tidak dapat meminjam, Buku tidak tersedia');
        } else {
            $count = RentLogs::where('user_id', Auth::user()->id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                return redirect('/daftar_buku')->with('toast_error', 'Tidak dapat meminjam, User telah mencapai Limit meminjam');
            } else {
                try {
                    DB::beginTransaction();
                    // Process insert to rent_logs table
                    RentLogs::create([
                        'user_id' => Auth::user()->id,
                        'book_id' => $id,
                        'rent_date' => $rent_date,
                        'return_date' => $return_date,
                        // Add other columns as needed
                    ]);

                    // Process update to books table
                    $book = Book::find($id);
                    $book->status = 'not available';
                    $book->save();

                    DB::commit();
                    // return redirect('/daftar_buku')->with('toast_success', 'Buku berhasil dipinjam');
                    return redirect()->route('bookList')->with('toast_success', 'Buku berhasil dipinjam');
                } catch (\Throwable $th) {
                    DB::rollBack();
                    // Handle the exception as needed
                }
            }
        }
    }

    public function returnBook($id) {
        $rent = RentLogs::where('user_id', Auth::user()->id)
            ->where('book_id', $id)
            ->where('actual_return_date', null);
        
        $countData = $rent->count();

        if ($countData == 1) {
            $rentData = $rent->first();
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Book::findOrFail($id);
            $book->status = 'in stock';
            $book->save();

            return redirect('/daftar_buku')->with('toast_success', 'Buku berhasil dikembalikan');
        } else {
            // return redirect('/daftar_buku')->with('toast_error', 'Buku tidak berhasil dikembalikan');
        }
    }

    public function detailBook($id)
    {
        $book = Book::find($id);
        $rentLogs = RentLogs::with(['user', 'book'])->where('user_id', $book->id)->get();

        return view('memberArea.detail-book', [
            'books' => $book,
            'rentLogs' => $rentLogs
        ]);
    }

    public function dashboard()
    {
        // $bookCount = Book::count();
        // $userCount = User::count();
        // $categoryCount = Category::count();
        $RentBookCount = RentLogs::count();
        $rentLogs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();

        return view('memberArea.dashboard', [
            // 'book_count' => $bookCount,
            // 'user_count' => $userCount,
            // 'category_count' => $categoryCount,
            'RentBookCount' => $RentBookCount,
            'rentLogs' => $rentLogs
        ]);
    }
}
