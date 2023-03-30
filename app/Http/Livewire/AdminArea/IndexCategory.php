<?php

namespace App\Http\Livewire\AdminArea;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;

class IndexCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;

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

    public function store()
    {
        $validatedData = $this->validate();
        
        Category::create($validatedData);
        
        $this->resetInput();
        
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Kategori berhasil ditambahkan!']);
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
            'category' => Category::orderBy('id', 'ASC')->paginate(5),
        ]);
    }
}
