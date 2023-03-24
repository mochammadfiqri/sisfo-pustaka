<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Book;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;

class Dashboard extends Component
{
    public function render()
    {
        $bookCount = Book::count();
        $userCount = User::count();
        $categoryCount = Category::count();
        // $visitorToday = Models::count();
        return view('livewire.admin-area.dashboard', [
            'book_count' => $bookCount,
            'user_count' => $userCount,
            'category_count' => $categoryCount,

        ])
        ->extends('layouts.app');
        // return view('livewire.admin-area.pages.dashboard');
    }
    public function pageDashboard()
    {
        $this->redirect('/dashboard');
    }
}
