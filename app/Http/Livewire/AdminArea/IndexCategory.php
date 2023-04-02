<?php

namespace App\Http\Livewire\AdminArea;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rules\In;

class IndexCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $category_id;
    public $paginate = 5;

    protected function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function createCategory()
    {
        $validatedData = $this->validate();
        Category::create($validatedData);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Kategori berhasil ditambahkan!']);
    }

    public function updateCategory()
    {
        $validatedData = $this->validate();

        Category::where('id', $this->category_id)->update([
            'name' => $validatedData['name'],
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Kategori berhasil diupdate!']);
    }

    public function editCategory(int $category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            $this->category_id = $category->id;
            $this->name = $category->name;
        }else {
            return redirect()->to('/kategori-buku');
        }
    }

    public function deleteCategory(int $category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        Category::find($this->category_id)->delete();
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Kategori berhasil dihapus!']);
    }

    private function resetInput()
    {
        $this->name = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }
        
    public function render()
    {
        return view('livewire.admin-area.index-category', [
            'category' => Category::latest()->paginate($this->paginate),
        ]);
    }
}
