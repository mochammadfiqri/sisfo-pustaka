<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexPeminjaman extends Component
{
    public $user_id = [];
    public $book_id = [];
    public $rent_date, $return_date;

    public function addbookrent()
    {
        $this->rent_date = Carbon::now()->toDateString();
        $this->return_date = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($this->book_id)->only('status');
        if($book['status'] != 'in stock') {
            $this->resetInput();
            return redirect('/peminjaman-buku')->with('toast_error', 'Tidak dapat meminjam, Buku tidak tersedia');
            // $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil dihapus!']);
            // dd('buku sedang di pinjam');

        } else {
            $count = RentLogs::where('user_id', $this->user_id)->where('actual_return_date', null)->count();
            
            if($count >= 3) {
                $this->resetInput();
                // return redirect('/peminjaman-buku')->with('toast_error', 'Tidak dapat meminjam, User telah mencapai Limit meminjam');
                $this->dispatchBrowserEvent('error', ['message' => 'Tidak dapat meminjam, User telah mencapai Limit meminjam']);
            } else {
                try {
                    DB::beginTransaction();
                    //process insert to rent_logs table
                    RentLogs::create($this->all());
                    //process update to books table
                    $book         = Book::find($this->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
                    return redirect('/peminjaman-buku')->with('toast_success', 'Buku berhasil dipinjam');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
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

    public function render()
    {
        $users = User::where('role_id', '!=', '1')->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        $rentLogs = RentLogs::with(['user', 'book'])->get();

        return view('livewire.admin-area.index-peminjaman', [
            'users' => $users,
            'books' => $books,
            'rentLogs' => $rentLogs
        ]);
    }
}
