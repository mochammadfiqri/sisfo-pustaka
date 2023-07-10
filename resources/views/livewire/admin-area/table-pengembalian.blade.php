<div>
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
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status</th> --}}
                {{-- <th class="text-secondary opacity-7"></th> --}}
            </tr>
        </thead>
        <tbody>
            @if ($returnLogs->count() > 0)
            @foreach ($returnLogs as $item)
            <tr>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold text-center">{{ $item->user->username }}</span>
                    {{-- <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg"
                                alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                        </div>
                    </div> --}}
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
                {{-- <td class="align-middle text-center text-sm">
                    <span
                        class="badge badge-sm {{ $item->actual_return_date == null ? 'bg-gradient-secondary' : ($item->return_date < $item->actual_return_date ? 'bg-gradient-danger' : 'bg-gradient-success')}}">
                        {{ $item->actual_return_date == null ? 'Sedang Dipinjam' : ($item->return_date < $item->
                            actual_return_date ? 'Tidak
                            Tepat Waktu' : 'Tepat Waktu')}}
                    </span>
                </td> --}}
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
                    <span class="text-secondary text-xs font-weight-bold"> Tidak ada data yang ditemukan </span>
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
                {{-- <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> </span>
                </td> --}}
            </tr>
            @endif
        </tbody>
    </table>
</div>