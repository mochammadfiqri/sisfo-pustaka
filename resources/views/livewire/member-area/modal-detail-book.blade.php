<!-- Modal Konfirmasi Peminjaman -->
<div class="modal fade" id="approveModal{{ $books->id }}" tabindex="-1"
    aria-labelledby="approveModalLabel{{ $books->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel{{ $books->id }}">Konfirmasi Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda akan Meminjam buku ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('approveBook', $books->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-info">Ya!</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Pengembalian -->
<div class="modal fade" id="returnModal{{ $books->id }}" tabindex="-1"
    aria-labelledby="returnModalLabel{{ $books->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="returnModalLabel{{ $books->id }}">Konfirmasi Pengembalian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda akan Mengembalikan buku ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('returnBook', $books->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-info">Ya!</button>
                </form>
            </div>
        </div>
    </div>
</div>