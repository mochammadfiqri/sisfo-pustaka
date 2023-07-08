<!-- Create Modal Books -->
<div wire:ignore.self class="modal fade" id="addbookrent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addbookrentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="addbookrentLabel">Pinjam Buku</h5>
                <button type="button" class="btn-close btn-sm text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="addbookrent" enctype="multipart/form-data">
                <div class="modal-body">
                    {{-- <div class="input-group input-group-outline mt-1"> --}}
                    {{-- <div wire:ignore class="mt-1 mt-lg-1 mt-md-1">
                        <select wire:model='selectUser' data-placeholder="Pilih User..." class="form-control selectpicker dropdown-toggle" data-live-search="true">
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>                                
                            @endforeach
                        </select>
                    </div> --}}
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
                    {{-- <div wire:ignore class="input-group input-group-outline mt-3">
                        <select wire:model='book_id' class="form-control" multiple>
                            @foreach ($books as $item)
                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label text-xs mb-1 mb-lg-1 mb-md-1">* Tekan <b>CTRL</b> untuk memilih lebih dari 1 Kategori</label> --}}
                    {{-- selectUser : {{ var_export($selectUser) }} --}}
                    <div wire:ignore style="float: right;" class="border-0 mt-3">
                        <button type="button" class="btn btn-primary" wire:click="closeModal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>