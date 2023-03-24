<?php

namespace App\Http\Livewire\MemberArea;

use Livewire\Component;

class Member extends Component
{
    public function render()
    {
        return view('livewire.member-area.member')->extends('layouts.app');
    }
}
