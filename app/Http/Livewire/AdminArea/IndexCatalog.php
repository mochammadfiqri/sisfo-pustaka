<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use App\Models\DDCcategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class IndexCatalog extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $ddc_id, $judul, $cover, $jilid, $cetakan, $edisi, $kata_kunci, $bahasa, $isbn_issn,
        $halaman, $tahun_terbit, $kota_terbit, $penerbit, $pengarang, $abstrak, $url, $file, $books_id;
    public $currentCategories;
    public $categories = [];
    public $paginate = 5;
    public $search;
    public $filterStatus = [];
    public $filterCategory = [];

    protected function rules()
    {
        return [
            // 'ddc_id' => 'required|unique:books,ddc_id,' . $this->books_id,
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
            'cover' => 'nullable|max:1024',
            'file' => 'nullable|max:2048'
        ];
    }

    protected $pesan = [
        'cover.max' => 'Ukuran Foto maksimal 1 MB',
        'file.max' => 'Ukuran Foto maksimal 2 MB',
        'judul.required' => 'Judul tidak boleh kosong',
        // 'ddc_id.required' => 'Kode Buku tidak boleh kosong'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function createBooks()
    {
        // dd($this->all());
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
        // 'ddc_id'       => $this->ddc_id,
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
        $book->DDCcategories()->sync($this->ddc_id);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil ditambahkan!']);
    }
    
    public function updateBooks()
    {
        $pathCover = null;
        $pathFile  = null;

        if ($this->file !== null && $this->file instanceof \Illuminate\Http\UploadedFile ) {
            $newName  = now()->timestamp . '_' . $this->file->getClientOriginalName();
            $pathFile = $this->file->storeAs('', $newName);
        }

        if ($this->cover !== null && $this->cover instanceof \Illuminate\Http\UploadedFile ) {
            $newName   = now()->timestamp . '_' . $this->cover->getClientOriginalName();
            $pathCover = $this->cover->storeAs('', $newName);
        }

        $validatedData = $this->validate();
        $book = Book::findOrFail($this->books_id);
        $book->update([
            // 'ddc_id' => $validatedData['ddc_id'],
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
            $pathCover => $validatedData['cover'],
            $pathFile => $validatedData['file']
        ]);

        if ($this->categories) {
            $book->categories()->sync($this->categories);
        }

        if ($this->ddc_id) {
            $book->DDCcategories()->sync($this->ddc_id);
        }

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil diupdate!']);
    }

    public function editBooks(int $books_id)
    {
        $editBooks = Book::find($books_id);
        if ($editBooks) {
            $this->books_id     = $editBooks->id;
            // $this->ddc_id       = $editBooks->ddc_id;
            $this->ddc_id       = $editBooks->DDCcategories->pluck('id')->toArray(); // Ambil ID kategori DDC terkait dari relasi
            $this->judul        = $editBooks->judul;
            $this->categories   = $editBooks->categories->pluck('id')->toArray(); // Ambil ID kategori DDC terkait dari relasi
            $this->cover        = $editBooks->cover;
            $this->jilid        = $editBooks->jilid;
            $this->cetakan      = $editBooks->cetakan;
            $this->edisi        = $editBooks->edisi;
            $this->kata_kunci   = $editBooks->kata_kunci;
            $this->bahasa       = $editBooks->bahasa;
            $this->isbn_issn    = $editBooks->isbn_issn;
            $this->halaman      = $editBooks->halaman;
            $this->tahun_terbit = $editBooks->tahun_terbit;
            $this->kota_terbit  = $editBooks->kota_terbit;
            $this->penerbit     = $editBooks->penerbit;
            $this->pengarang    = $editBooks->pengarang;
            $this->abstrak      = $editBooks->abstrak;
            $this->url          = $editBooks->url;
            $this->file         = $editBooks->file;
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
        $book = Book::find($this->books_id);

        // Hapus terlebih dahulu semua data yang memiliki ketergantungan pada tabel "book_category"
        $book->categories()->detach();

        // Hapus data dalam tabel "books"
        $book->delete();

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Buku berhasil dihapus!']);

    }

    private function resetInput()
    {
        $this->ddc_id = '';
        $this->judul = '';
        $this->cover = '';
        $this->jilid = '';
        $this->categories = [];
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

    public function updatedSelectedValue()
    {
        $this->emit('refreshSelect2');
    }

    public function render()
    {
        $books = $this->search === null ?
            Book::latest()->paginate($this->paginate) :
            Book::latest()
                ->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('penerbit', 'like', '%' . $this->search . '%')
                ->orWhere('pengarang', 'like', '%' . $this->search . '%')
                ->orWhereHas('categories', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('DDCcategories', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('ddc_number', 'like', '%' . $this->search . '%');
                })
                ->paginate($this->paginate);

        $kategori = Category::all();
        $ddcCategory = DDCcategory::all();

        return view('livewire.admin-area.index-catalog', [
            'books'    => $books,
            'kategori' => $kategori,
            'ddcCategory' => $ddcCategory,
        ]);
    }
}
