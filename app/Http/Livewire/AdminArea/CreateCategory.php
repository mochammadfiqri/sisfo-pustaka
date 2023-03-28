<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $validatedData = $this->validate();
    }
    
    public function render()
    {
        return view('livewire.admin-area.create-category');
    }
}
