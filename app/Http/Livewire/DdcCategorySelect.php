<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Asantibanez\LivewireSelect\LivewireSelect;

class DdcCategorySelect extends LivewireSelect
{
    public function options($searchTerm = null): Collection {
        return collect([
        [
            'value' => 'honda',
            'description' => 'Honda',
        ],
        [
            'value' => 'mazda',
            'description' => 'Mazda',
        ],
        [
            'value' => 'tesla',
            'description' => 'Tesla',
        ],       
    ]);
    }
}
