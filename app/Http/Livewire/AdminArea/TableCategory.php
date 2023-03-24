<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Category;
use Livewire\Component;

class TableCategory extends Component
{
    // public $category;

    public function render()
    {
        // $this->category = Category::latest()->get();
        return view('livewire.admin-area.table-category', [
            'category' => Category::latest()->get()
        ]);
    }
}