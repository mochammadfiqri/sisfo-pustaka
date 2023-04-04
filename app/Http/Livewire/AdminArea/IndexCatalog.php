<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Book;
use Livewire\WithPagination;
use Livewire\Component;

class IndexCatalog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $kode_buku, $judul, $cover, $jilid, $cetakan, $volume, $edisi, $kata_kunci, $bahasa, $isbn_issn,
        $halaman, $tahun_terbit, $kota_terbit, $penerbit, $pengarang, $abstrak, $file, $status, $books_id;
    public $paginate = 5;
    public $search;

    protected function rules()
    {
        return [
            'kode_buku' => 'required',
            'judul' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function createBooks()
    {
        $validatedData = $this->validate();
        Book::create($validatedData);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Kategori berhasil ditambahkan!']);
    }

    private function resetInput()
    {
        $this->kode_buku = '';
        $this->judul = '';
        $this->cover = '';
        $this->jilid = '';
        $this->cetakan = '';
        $this->volume = '';
        $this->edisi = '';
        $this->kata_kunci = '';
        $this->bahasa = '';
        $this->isbn_issn = '';
        $this->tahun_terbit = '';
        $this->kota_terbit = '';
        $this->penerbit = '';
        $this->pengarang = '';
        $this->abstrak = '';
        $this->file = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.admin-area.index-catalog', [
            'books' => $this->search === null ?
            Book::latest()->paginate($this->paginate) :
            Book::latest()->where('judul', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }
}
