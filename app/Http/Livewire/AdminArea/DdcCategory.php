<?php

namespace App\Http\Livewire\AdminArea;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DDCcategory as ModelsDDCcategory;

class DdcCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $parent_id, $ddc_number;
    public $search;
    public $paginate = 5;

    private function resetInput()
    {
        $this->name = '';
        $this->parent_id = '';
        $this->ddc_number = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function render()
    {
        $ddcCategory = $this->search === null ?
            ModelsDDCcategory::latest()->paginate($this->paginate) :
            ModelsDDCcategory::latest()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('ddc_number', 'like', '%' . $this->search . '%')
                ->paginate($this->paginate);
        return view('livewire.admin-area.ddc-category', [
            'ddcCategory' => $ddcCategory,
        ]);
    }
}
