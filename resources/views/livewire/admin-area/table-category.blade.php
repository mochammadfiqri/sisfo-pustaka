<div>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No.
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Nama Kategori
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($category->count() > 0)
                @foreach ($category as $data)
                <tr>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold text-center">{{ $data->name }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center">
                        <span class="text-secondary text-xs font-weight-bold"> </span>
                    </td>
                    <td class="text-center">
                        <span class="text-secondary text-xs font-weight-bold">Tidak ada data yang ditemukan</span>
                    </td>
                    <td class="text-center">
                        <span class="text-secondary text-xs font-weight-bold"> </span>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="float-end me-3">
        {{ $category->links() }}
    </div>
</div>