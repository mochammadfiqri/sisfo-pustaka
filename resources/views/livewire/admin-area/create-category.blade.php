<div wire:ignore.self class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="input-group input-group-outline my-3">
                        {{-- <label class="form-label">Masukan Kategori Baru</label> --}}
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Masukan Kategori Baru">
                    </div>                    
                    <div style="float: right;" class="border-0">
                        <button type="button" class="btn btn-primary" wire:click="closeModal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>