<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No.</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    User</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Judul Buku</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tgl. Peminjaman</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tgl. Pengembalian</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tgl. Dikembalikan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($rentlog->count() > 0)
            @foreach ($rentlog as $item)
            <tr>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $item->user->username }}</span>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->book->judul }}</p>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->rent_date }}</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->return_date }}</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->actual_return_date }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                    <span
                        class="badge badge-sm {{ $item->actual_return_date == null ? 'bg-gradient-secondary' : ($item->return_date < $item->actual_return_date ? 'bg-gradient-danger' : 'bg-gradient-success')}}">
                        {{ $item->actual_return_date == null ? 'Sedang Dipinjam' : ($item->return_date < $item->
                            actual_return_date ? 'Tidak
                            Tepat Waktu' : 'Tepat Waktu')}}
                    </span>
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
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>