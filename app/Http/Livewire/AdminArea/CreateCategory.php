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
        dd($validatedData);
        // Category::create($validatedData);
        session()->flash('message', 'Data berhasil ditambahkan');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-model');
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
        return view('livewire.admin-area.create-category');
    }
}
