<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Book;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;

class IndexCatalog extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $kode_buku, $judul, $cover, $jilid, $cetakan, $edisi, $kata_kunci, $bahasa, $isbn_issn,
        $halaman, $tahun_terbit, $kota_terbit, $penerbit, $pengarang, $abstrak, $url, $file, $books_id;
    public $status = 'in stock';
    public $paginate = 5;
    public $search;

    protected function rules()
    {
        return [
            'kode_buku' => 'required',
            'judul' => 'required',
            'jilid' => 'nullable',
            'cetakan' => 'nullable',
            'edisi' => 'nullable',
            'kata_kunci' => 'nullable',
            'bahasa' => 'nullable',
            'isbn_issn' => 'numeric|nullable',
            'halaman' => 'nullable',
            'tahun_terbit' => 'numeric|nullable',
            'kota_terbit' => 'nullable',
            'penerbit' => 'nullable',
            'pengarang' => 'nullable',
            'abstrak' => 'nullable',
            'url' => 'nullable',
            'status' => 'nullable',
            'cover' => 'nullable|image|max:1024',
            'file' => 'nullable|file|max:2048'
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

        if ($this->cover !== null) { //menambahkan pengecekan apakah input file cover tidak bernilai null
        $this->cover->store('public/cover');
        }

        if ($this->file !== null) { //menambahkan pengecekan apakah input file tidak bernilai null
        $this->file->store('public/files');
        }

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil ditambahkan!']);
    }

    public function updateBooks()
    {
        $validatedData = $this->validate();

        Book::where('id', $this->books_id)->update([
            'kode_buku' => $validatedData['kode_buku'],
            'judul' => $validatedData['judul'],
            'jilid' => $validatedData['jilid'],
            'cetakan' => $validatedData['cetakan'],
            'edisi' => $validatedData['edisi'],
            'kata_kunci' => $validatedData['kata_kunci'],
            'bahasa' => $validatedData['bahasa'],
            'isbn_issn' => $validatedData['isbn_issn'],
            'halaman' => $validatedData['halaman'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'kota_terbit' => $validatedData['kota_terbit'],
            'penerbit' => $validatedData['penerbit'],
            'pengarang' => $validatedData['pengarang'],
            'abstrak' => $validatedData['abstrak'],
            'url' => $validatedData['url'],
            'status' => $validatedData['status'],
            'cover' => $validatedData['cover'],
            'file' => $validatedData['file']
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil diupdate!']);
    }

    public function editBooks(int $books_id)
    {
        $books = Book::find($books_id);
        if ($books) {
            $this->books_id     = $books->id;
            $this->kode_buku    = $books->kode_buku;
            $this->judul        = $books->judul;
            $this->cover        = $books->cover;
            $this->jilid        = $books->jilid;
            $this->cetakan      = $books->cetakan;
            $this->edisi        = $books->edisi;
            $this->kata_kunci   = $books->kata_kunci;
            $this->bahasa       = $books->bahasa;
            $this->isbn_issn    = $books->isbn_issn;
            $this->halaman      = $books->halaman;
            $this->tahun_terbit = $books->tahun_terbit;
            $this->kota_terbit  = $books->kota_terbit;
            $this->penerbit     = $books->penerbit;
            $this->pengarang    = $books->pengarang;
            $this->abstrak      = $books->abstrak;
            $this->url          = $books->url;
            $this->status       = $books->status;
            $this->file         = $books->file;
        }else {
            return redirect()->to('/e-catalog');
        }
    }

    public function deleteBooks(int $books_id)
    {
        $this->books_id = $books_id;
    }

    public function destroyBooks()
    {
        Book::find($this->books_id)->delete();
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil dihapus!']);
    }

    private function resetInput()
    {
        $this->kode_buku = '';
        $this->judul = '';
        $this->cover = '';
        $this->jilid = '';
        $this->cetakan = '';
        $this->edisi = '';
        $this->kata_kunci = '';
        $this->bahasa = '';
        $this->isbn_issn = '';
        $this->halaman = '';
        $this->tahun_terbit = '';
        $this->kota_terbit = '';
        $this->penerbit = '';
        $this->pengarang = '';
        $this->abstrak = '';
        $this->url = '';
        $this->status = '';
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
