<?php

namespace App\Http\Livewire\AdminArea;

use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        return view('livewire.admin-area.category')->layout('adminArea.category.index');
    }
}