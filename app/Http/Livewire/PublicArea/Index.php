<?php

namespace App\Http\Livewire\PublicArea;

use App\Models\Book;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $books = Book::all();
        return view('livewire.public-area.index', [
            'books' => $books,
        ]);
    }
}
