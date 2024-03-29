<?php

namespace App\Http\Livewire\AdminArea;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class IndexUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $username, $password, $no_hp, $alamat, $status;
    public $paginate = 5;
    public $search;
    public $userId;
    public $statusSelected;
    public $oldPassword, $newPassword, $confirmPassword;

    public function updatePassword()
    {
        $user = User::findOrFail($this->userId);

        $user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        // dd('ganti pas');
        
        $this->resetInput();
        return redirect('/users')->with('toast_success', 'Password berhasil diupdate!');
    }

    public function editPassword(int $userId)
    {
        $this->userId = $userId;
    }
    
    private function resetForm()
    {
        $this->newPassword = '';
        $this->confirmPassword = '';
    }

    protected function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'required',
            'no_hp' => 'nullable|numeric',
            'alamat' => 'nullable'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    function validApprove(int $userId) {
        $this->userId = $userId;
    }

    public function approveUser()
    {
        $user = User::find($this->userId);
        $user->status = 'active';
        $user->save();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'User berhasil diapprove!']);
    }

    public function removeUser(int $userId) {
        $this->userId = $userId;
    }

    public function deleteUser() {
        $user = User::find($this->userId);
        if ($user) {
            $user->delete();
            $user->status = 'inactive';
            $user->save();
        }
        $this->dispatchBrowserEvent('close-modal', ['message' => 'User berhasil dihapus!']);
    }

    // public function reactiveUser(int $userId) {
    //     $this->userId = $userId;
    //     $user = User::find($this->userId);
    //     $user->status = 'active';
    //     $user->save();
    //     $this->dispatchBrowserEvent('close-modal', ['message' => 'User berhasil di aktivasi!']);
    // }
    
    public function restoreUser(int $userId) {
        $this->userId = $userId;
        $user = User::withTrashed()->where('id', $userId)->first();
        $user->restore();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'User berhasil direstore!']);
    }

    public function resetInput() {
        $this->newPassword = '';

    }
    public function closeModal()
    {
        $this->resetInput();
    }

    public function render()
    {
        $users = $this->search === null ?
            User::latest()
                ->where('role_id', 2)
                ->where('status', 'active')
                ->paginate($this->paginate) :
            User::latest()
                ->where('role_id', 2)
                ->where('username', 'like', '%' . $this->search . '%')
                ->orWhere('no_hp', 'like', '%' . $this->search . '%')
                ->where('status', 'active')
                ->paginate($this->paginate);

        $registeredUsers = User::latest()
            ->where('role_id', 2)
            ->where('status', 'inactive')
            ->paginate($this->paginate);

        $deletedUsers = User::onlyTrashed()->get();

        // $deletedUsers = User::latest()
        // ->onlyTrashed()
        // ->paginate($this->paginate);

        return view('livewire.admin-area.index-users', [
            'users' => $users,
            'registeredUsers' => $registeredUsers,
            'deletedUsers' => $deletedUsers       
        ]);
    }
}
