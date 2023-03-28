<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $userCount = User::count();
        $categoryCount = Category::count();

        return view('adminArea.dashboard', [
            'book_count' => $bookCount,
            'user_count' => $userCount,
            'category_count' => $categoryCount,
        ]);
    }
}
