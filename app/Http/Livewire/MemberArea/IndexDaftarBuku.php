<?php

namespace App\Http\Livewire\MemberArea;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class IndexDaftarBuku extends Component
{
    use WithPagination;
    public $search;
    // public $paginate = 4;
    public $filtercategory = [];

    public function render()
    {
        $books = Book::query();

        if (!empty($this->filtercategory)) {
            $books->whereHas('categories', function ($query) {
            $query->whereIn('categories.id', $this->filtercategory);
        });
        }

        if ($this->search) {
            $books->where(function ($query) {
                $query
                ->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('pengarang', 'like', '%' . $this->search . '%');
            });
        }

        $books = $books->get();

        return view('livewire.member-area.index-daftar-buku', [
            'books' => $books,
            'kategori' => Category::all(),
        ]);
    }
}
