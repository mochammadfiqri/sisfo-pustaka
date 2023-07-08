<!-- Create Modal Category -->
<div wire:ignore.self class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="addCategoryLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="createCategory">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('name')) is-filled is-invalid @elseif ($name) is-filled is-valid @endif">
                        <label class="form-label">Kategori Baru</label>
                        <input wire:model="name" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)">
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

<!-- Update Modal Category -->
<div wire:ignore.self class="modal fade" id="updateCategory" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="updateCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="updateCategoryLabel">Edit Kategori</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateCategory">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('name')) is-filled is-invalid @elseif ($name) is-filled is-valid @endif">
                        <label class="form-label">Kategori Baru</label>
                        <input wire:model="name" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)">
                    </div>
                    <div style="float: right;" class="border-0">
                        <button type="button" class="btn btn-primary" wire:click="closeModal"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal Category -->
<div wire:ignore.self class="modal fade" id="deleteCategory" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="deleteCategoryLabel">Hapus Kategori</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    Apakah anda yakin akan menghapus Kategori ini ?
                    <div style="float: right;" class="border-0">
                        <button type="button" class="btn btn-primary" wire:click="closeModal"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Ya, Hapus!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>