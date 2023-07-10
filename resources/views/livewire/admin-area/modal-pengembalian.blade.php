<!-- Create Modal Books -->
<div wire:ignore.self class="modal fade" id="addbookreturn" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="addbookreturnLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="addbookreturnLabel">Kembalikan Buku</h5>
                <button type="button" class="btn-close btn-sm text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="addBookReturn" enctype="multipart/form-data">
                <div class="modal-body">
                        <div wire:ignore class="input-group input-group-outline mt-0">
                            <select wire:model='user_id' class="form-control">
                                <option selected>Pilih Anggota...</option>
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div wire:ignore class="input-group input-group-outline mt-3">
                            <select wire:model='book_id' class="form-control">
                                <option selected>Pilih Buku...</option>
                                @foreach ($books as $item)
                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div wire:ignore style="float: right;" class="border-0 mt-3">
                            <button type="button" class="btn btn-primary" wire:click="closeModal"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>