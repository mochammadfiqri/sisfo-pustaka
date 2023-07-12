<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    // public function bookReturnMember() {
    //     return view('');
    // }

    // public function bookRentMember() {
    //     return view('');
    // }

    // public function profileMember()
    // {
    //     return view('');
    // }

    public function bookList() 
    {
        return view('memberArea.daftarbuku');
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
