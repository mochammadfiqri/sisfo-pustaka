<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\User;
use Livewire\Component;

class DetailUsers extends Component
{
    public $userId;
    public function mount($id)
    {
        $this->userId = $id;
    }

    public function approveUsers()
    {
        $approveUser = User::where($this->userId)->first();
        $approveUser->status = 'active';
        $approveUser->save();

        return redirect('/users')->with('toast_success', 'Approve Berhasil');
    }

    public function render()
    {
        $user = User::find($this->userId);
        return view('livewire.admin-area.detail-users', [
            'user' => $user,
        ]);
    }
}
