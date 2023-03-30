<?php

namespace App\Http\Livewire\AdminArea;

use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    
    public function render()
    {
        return view('livewire.admin-area.create-category');
    }
}
