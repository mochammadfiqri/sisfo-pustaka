<div>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No. </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Kode Buku</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Judul Buku</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action</th>
                {{-- <th class="text-secondary opacity-7"></th> --}}
            </tr>
        </thead>
        <tbody>
            @if ($books->count() > 0)
            @foreach ($books as $data)
            <tr>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->kode_buku }}</span>
                </td>
                <td class="align-middle text-center">
                    {{-- <span class="text-secondary text-xs font-weight-bold text-center">{{ $data->judul }}</span> --}}
                    <div class="d-flex px-6 py-1m ms-5">
                        <div>
                            <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $data->judul }}</h6>
                            <p class="text-xs text-secondary text-start mb-0">{{ $data->pengarang }}</p>
                        </div>
                    </div>
                </td>
                <td class="align-middle text-center text-sm">
                    <span class="badge bg-gradient-success ms-2">{{ $data->status }}</span>
                </td>
                <td class="align-middle text-center">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategory"
                        wire:click='editBooks({{ $data->id }})' class="btn btn-info btn-sm mt-3">Edit</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBooks"
                        wire:click='deleteBooks({{ $data->id }})' class="btn btn-danger btn-sm mt-3">Hapus</button>
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
    <div class="float-end me-3">
        {{ $books->links() }}
    </div>
</div>