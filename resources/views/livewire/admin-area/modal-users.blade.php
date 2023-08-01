<!-- Approve Users -->
<div wire:ignore.self class="modal fade" id="registeredUsers" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="registeredUsersLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="registeredUsersLabel">Approve Users</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No. </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Username</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($registeredUsers->count() > 0)
                    @foreach ($registeredUsers as $data)
                    <tr>
                        <td class="text-center">
                            <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                        </td>
                        <td class="text-center">
                            <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->username }}</span>
                        </td>
                        <td class="text-center">
                            <a href="users/detail/{{ $data->id }}" type="button" class="btn btn-info btn-sm mt-3">Detail</a>
                            <button data-bs-target="#validApprove" data-bs-toggle="modal" wire:click="validApprove({{ $data->id }})" class="btn btn-primary btn-sm mt-3">Approve</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">Tidak ada data yang ditemukan</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> </span>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-primary btn-sm" data-bs-target="#exampleModalToggle2">Close</button>
            </div>            
        </div>
    </div>
</div>

<!-- Deleted Users -->
<div wire:ignore.self class="modal fade" id="deletedUsers" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="deletedUsersLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="deletedUsersLabel">Deleted Users</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No. </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Username</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($deletedUsers->count() > 0)
                    @foreach ($deletedUsers as $data)
                    <tr>
                        <td class="text-center">
                            <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                        </td>
                        <td class="text-center">
                            <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->username }}</span>
                        </td>
                        <td class="text-center">
                            {{-- <a href="users/detail/{{ $data->id }}" type="button" class="btn btn-info btn-sm mt-3">Detail</a> --}}
                            {{-- <form wire:submit.prevent="confirmReactive">
                                <button type="submit" class="btn btn-primary">Re-Active</button>
                            </form> --}}
                            <button class="btn btn-danger btn-sm mt-3">Hapus</button>
                            {{-- <button wire:click="reactiveUser({{ $data->id }})"class="btn btn-success btn-sm mt-3">
                                Re-Active</button> --}}
                            <button wire:click="restoreUser({{ $data->id }})" class="btn btn-primary btn-sm mt-3">
                                Restore</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">Tidak ada data yang ditemukan</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> </span>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-primary btn-sm"
                    data-bs-target="#exampleModalToggle2">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Validation Approve User-->
<div wire:ignore.self class="modal fade" id="validApprove" tabindex="-1" aria-labelledby="confirmApproveLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmApproveLabel">Konfirmasi Approve User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="approveUser">
                <div class="modal-body">
                    Anda akan Mengaktifkan Akun ini, Anda Yakin?
                    <div style="float: right;" class="border-0 mt-3">
                        <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Confirm Remove User-->
<div wire:ignore.self class="modal fade" id="removeUser" tabindex="-1" aria-labelledby="removeUserLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUserLabel">Konfirmasi Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="deleteUser">
                <div class="modal-body">
                    Anda akan Menghapus Akun ini, Anda Yakin?
                    <div style="float: right;" class="border-0 mt-3">
                        <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal Category -->
<div wire:ignore.self class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="changePasswordLabel">Update Password</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updatePassword">
                <div class="modal-body">
                    <div
                        class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('newPassword')) is-filled is-invalid @elseif ($newPassword) is-filled is-valid @endif">
                        <label class="form-label">Password Baru</label>
                        <input wire:model="newPassword" type="password" class="form-control" oninput="checkInput(this)"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div style="float: right;" class="border-0">
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>