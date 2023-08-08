<!-- Create Modal DDC Induk -->
<div wire:ignore.self class="modal fade" id="createInduk" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="createIndukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="createIndukLabel">Tambah DDC Induk</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="createDDCcategory">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('name')) is-filled is-invalid @elseif ($name) is-filled is-valid @endif">
                        <label class="form-label">Masukan DDC Induk</label>
                        <input wire:model="name" type="text" class="form-control" oninput="checkInput(this)"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('ddc_number')) is-filled is-invalid @elseif ($ddc_number) is-filled is-valid @endif">
                        <label class="form-label">Masukan Nomor DDC Induk</label>
                        <input wire:model="ddc_number" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)">
                    </div>
                    <div style="float: right;" class="border-0">
                        <button type="button" class="btn btn-primary" wire:click="closeModal"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create Modal DDC Sub-Induk -->
<div wire:ignore.self class="modal fade" id="createSubInduk" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="createSubIndukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="createSubIndukLabel">Tambah DDC Sub-Induk</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="createDDCsub-category">
                <div class="modal-body">
                    <div
                        class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('name')) is-filled is-invalid @elseif ($name) is-filled is-valid @endif">
                        <label class="form-label">Masukan DDC Sub-Induk</label>
                        <input wire:model="name" type="text" class="form-control" oninput="checkInput(this)"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div wire:ignore class="input-group input-group-outline mt-0 mb-3">
                        <select wire:model='parent_id' class="form-control">
                            <option selected>Pilih Induk...</option>
                            {{-- @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div
                        class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('ddc_number')) is-filled is-invalid @elseif ($ddc_number) is-filled is-valid @endif">
                        <label class="form-label">Masukan Nomor DDC Sub-Induk</label>
                        <input wire:model="ddc_number" type="text" class="form-control" oninput="checkInput(this)"
                            onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div style="float: right;" class="border-0">
                        <button type="button" class="btn btn-primary" wire:click="closeModal"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal DDC Induk -->
<div wire:ignore.self class="modal fade" id="updateDDCcategory" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="updateDDCcategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="updateDDCcategoryLabel">Edit DDC Induk</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateDDCcategory">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('name')) is-filled is-invalid @elseif ($name) is-filled is-valid @endif">
                        <label class="form-label">Masukan DDC Induk</label>
                        <input wire:model="name" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)">
                    </div>
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('ddc_number')) is-filled is-invalid @elseif ($ddc_number) is-filled is-valid @endif">
                        <label class="form-label">Masukan Nomor DDC Induk</label>
                        <input wire:model="ddc_number" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
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

<!-- Delete Modal DDC Induk -->
<div wire:ignore.self class="modal fade" id="deleteDDCcategory" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="deleteDDCcategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="deleteDDCcategoryLabel">Hapus DDC Induk ?</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyDDCcategory">
                <div class="modal-body">
                    Apakah anda yakin akan menghapus DDC ini ?
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