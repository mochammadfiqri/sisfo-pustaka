<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $userCount = User::count();
        $categoryCount = Category::count();
        $rentLogs = RentLogs::with(['user', 'book'])->get();

        return view('adminArea.dashboard', [
            'book_count' => $bookCount,
            'user_count' => $userCount,
            'category_count' => $categoryCount,
            'rentLogs' => $rentLogs
        ]);
    }

}
