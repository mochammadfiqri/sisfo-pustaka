<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class IndexCatalog extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $kode_buku, $judul, $cover, $jilid, $cetakan, $edisi, $kata_kunci, $bahasa, $isbn_issn,
        $halaman, $tahun_terbit, $kota_terbit, $penerbit, $pengarang, $abstrak, $url, $file, $books_id;
    public $categories = [];
    public $paginate = 5;
    public $search;

    protected function rules()
    {
        return [
            'kode_buku' => 'required|unique:books,kode_buku,' . $this->books_id,
            'judul' => 'required',
            'jilid' => 'nullable',
            'cetakan' => 'nullable',
            'edisi' => 'nullable',
            'kata_kunci' => 'nullable',
            'bahasa' => 'nullable',
            'isbn_issn' => 'nullable|numeric',
            'halaman' => 'nullable|numeric',
            'tahun_terbit' => 'nullable|numeric',
            'kota_terbit' => 'nullable',
            'penerbit' => 'nullable',
            'pengarang' => 'nullable',
            'abstrak' => 'nullable',
            'url' => 'nullable',
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
        dd($this->all());
        $this->validate();
        $pathCover = null;
        $pathFile  = null;
        
        if ($this->file !== null) {
            $newName  = now()->timestamp . '_' . $this->file->getClientOriginalName();
            $pathFile = $this->file->storeAs($newName);
        }

        if ($this->cover !== null) {
            $newName   = now()->timestamp . '_' . $this->cover->getClientOriginalName();
            $pathCover = $this->cover->storeAs($newName);
        }

        $book = Book::create([
        'kode_buku'    => $this->kode_buku,
        'judul'        => $this->judul,
        'jilid'        => $this->jilid,
        'cetakan'      => $this->cetakan,
        'edisi'        => $this->edisi,
        'kata_kunci'   => $this->kata_kunci,
        'bahasa'       => $this->bahasa,
        'isbn_issn'    => $this->isbn_issn,
        'halaman'      => $this->halaman,
        'tahun_terbit' => $this->tahun_terbit,
        'kota_terbit'  => $this->kota_terbit,
        'penerbit'     => $this->penerbit,
        'pengarang'    => $this->pengarang,
        'abstrak'      => $this->abstrak,
        'url'          => $this->url,
        'file'         => $pathFile,
        'cover'        => $pathCover,
        ]);
        $book->categories()->sync($this->categories);

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
        $this->file = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function render()
    {
        $books = $this->search === null ?
            Book::latest()->paginate($this->paginate) :
            Book::latest()->where('judul', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        
        $kategori = Category::all();
        
        return view('livewire.admin-area.index-catalog', [
            'books' => $books,
            'kategori' => $kategori
        ]);
    }
}
