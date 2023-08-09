<?php

namespace App\Http\Livewire\AdminArea;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use Livewire\Component;
use App\Models\RentLogs;

class IndexPengembalian extends Component
{
    public $user_id = [];
    public $book_id = [];
    public $search;
    public $paginate = 5;

    public function addBookReturn()
    {
        $rent = RentLogs::where('user_id', $this->user_id)
            ->where('book_id', $this->book_id)
            ->where('actual_return_date', null);
        
        $countData = $rent->count();

        if ($countData == 1) {
            $rentData = $rent->first();
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Book::findOrFail($this->book_id);
            $book->status = 'in stock';
            $book->save();

            $this->resetInput();
            return redirect('/pengembalian_buku')->with('toast_success', 'Buku berhasil dikembalikan');
        } else {
            $this->resetInput();
            return redirect('/pengembalian_buku')->with('toast_error', 'Buku tidak berhasil dikembalikan');
        }
    }

    private function resetInput()
    {
        $this->user_id = [];
        $this->book_id = [];
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function render() {
        $users = User::where('role_id', '!=', '1')
            ->where('status', '!=', 'inactive')
            ->when($this->search, function ($query, $search) {
                return $query->where('username', 'LIKE', '%' . $search . '%');
            })
            ->paginate($this->paginate); // Updated from $this->perPage to $this->paginate

        $books = Book::when($this->search, function ($query, $search) {
            return $query->where('judul', 'LIKE', '%' . $search . '%');
        })
            ->paginate($this->paginate); // Updated from $this->perPage to $this->paginate
        $rentLogs = RentLogs::with(['user', 'book'])
            ->whereNotNull('actual_return_date')
            ->when($this->search, function ($query, $search) {
                return $query->where('rent_date', 'LIKE', '%' . $search . '%')
                    ->orWhere('return_date', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('username', 'LIKE', '%' . $search . '%');
                    })->orWhereHas('book', function ($query) use ($search) {
                        $query->where('judul', 'LIKE', '%' . $search . '%');
                    });
            })
            ->paginate($this->paginate);

        return view('livewire.admin-area.index-pengembalian', [
            'users' => $users,
            'books' => $books,
            'rentLogs' => $rentLogs
        ]);
    }
}
