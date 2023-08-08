<div>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No. </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    No. Klasifikasi</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Klasifikasi</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Jenis</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($ddcCategory->count() > 0)
            @foreach ($ddcCategory as $data)
            <tr>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->ddc_number }}</span>
                </td>
                <td class="text-justify">
                    <span class="text-secondary text-xs font-weight-bold text-center me-3">{{ $data->name }}</span>
                </td>
                <td class="text-center text-sm">
                    <span class="badge bg-gradient-success ms-2">{{ $data->isInduk() ? 'Induk' : 'Sub-Induk' }}</span>
                </td>
                <td class="text-center">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateBooks"
                        wire:click='editBooks({{ $data->id }})' class="btn btn-info btn-sm mt-3 ms-4">Edit</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBooks"
                        wire:click='deleteBooks({{ $data->id }})' class="btn btn-danger btn-sm mt-3">Hapus</button>
                    <a href="e-catalog/detail/{{ $data->id }}" type="button"
                        class="btn btn-primary btn-sm mt-3">Detail</a>
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
        {{ $ddcCategory->links() }}
    </div>
</div>