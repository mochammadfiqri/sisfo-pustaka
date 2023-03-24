<?php

namespace App\Http\Livewire\AdminArea;

use Livewire\Component;

class Catalog extends Component
{
    public function render()
    {
        return view('livewire.admin-area.catalog')->extends('layouts.app');
    }

    public function pageCatalog()
    {
        $this->redirect('/e-catalog');
    }
}