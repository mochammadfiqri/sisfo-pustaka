<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Category;
use Livewire\Component;

class TableCategory extends Component
{
    public function render()
    {
        return view('livewire.admin-area.table-category');
    }
}