<div>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No. </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Username</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    No. HP</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Alamat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
            @foreach ($users as $data)
            <tr>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->username }}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->no_hp }}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->alamat }}</span>
                </td>
                <td class="text-center text-sm">
                    <span class="badge bg-gradient-success ms-2">{{ $data->status }}</span>
                </td>
                <td class="text-center">
                    <a href="users/detail/{{ $data->id }}" type="button" class="btn btn-info btn-sm mt-3">Detail</a>
                    {{-- <a href="#" type="button" class="btn btn-primary btn-sm mt-3">Nonaktifkan</a> --}}
                    <button data-bs-target="#removeUser" data-bs-toggle="modal" wire:click="removeUser({{ $data->id }})" class="btn btn-primary btn-sm mt-3">Delete User</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#changePassword" wire:click='editPassword({{ $data->id }})'
                        class="btn btn-warning btn-sm mt-3">Update Password</button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Tidak ada data yang ditemukan</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    {{-- <div class="float-end me-3">
        {{ $books->links() }}
    </div> --}}
</div>