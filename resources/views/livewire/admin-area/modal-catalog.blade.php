<!-- Create Modal Books -->
<div wire:ignore.self class="modal fade" id="addBooks" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="addBooksLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="addBooksLabel">Tambah Buku</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="createBooks" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="kode" type="text" class="form-control" name="kode_buku" id="kode" placeholder="Masukan Kode Buku">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="judul" type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="jilid" type="text" class="form-control" name="jilid" id="jilid" placeholder="Masukan Jilid">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="cetakan" type="text" class="form-control" name="cetakan" id="cetakan" placeholder="Masukan Cetakan">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="volume" type="text" class="form-control" name="volume" id="volume" placeholder="Masukan Volume">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="edisi" type="text" class="form-control" name="edisi" id="edisi" placeholder="Masukan Edisi">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="keyword" type="text" class="form-control" name="kata_kunci" id="keyword" placeholder="Masukan Kata Kunci">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="isbn_issn" type="number" class="form-control" name="isbn_issn" id="isbn_issn"
                            placeholder="Masukan ISBN / ISSN">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="halaman" type="text" class="form-control" name="halaman" id="halaman"
                            placeholder="Masukan Halaman">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="tahun_terbit" type="text" class="form-control" name="tahun_terbit" id="tahun_terbit"
                            placeholder="Masukan Tahun Terbit">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="kota_terbit" type="text" class="form-control" name="kota_terbit" id="kota_terbit"
                            placeholder="Masukan Kota Terbit">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="penerbit" type="text" class="form-control" name="penerbit" id="penerbit"
                            placeholder="Masukan Penerbit">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="pengarang" type="text" class="form-control" name="pengarang" id="pengarang"
                            placeholder="Masukan Pengarang">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <textarea wire:model='abstrak' class="form-control" name="abstrak" id="abstrak" cols="30" rows="10" placeholder="Masukan Abstrak"></textarea>
                    </div>
                    <label class="text-sm mb-0" for="cover">Pilih File</label>
                    <div class="input-group input-group-outline my-1">
                        <input wire:model="file" type="file" class="form-control" name="file">
                    </div>
                    <label class="text-sm mb-0" for="cover">Pilih Cover Buku</label>
                    <div class="input-group input-group-outline my-1">
                        <input wire:model="cover" type="file" class="form-control" name="cover">
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

<!-- Update Modal Books -->
<div wire:ignore.self class="modal fade" id="updateBooks" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="updateBooksLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="updateBooksLabel">Edit Buku</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateBooks">
                <div class="modal-body">
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="name" type="text" class="form-control" id="name"
                            placeholder="Masukan Buku Baru">
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

<!-- Delete Modal Books -->
<div wire:ignore.self class="modal fade" id="deleteBooks" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="deleteBooksLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="deleteBooksLabel">Hapus Buku</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="destroyBooks">
                <div class="modal-body">
                    <div class="mb-4">
                        <h5 class="font-weight-normal">Apakah anda yakin akan menghapus Buku ini ?</h5>
                    </div>
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