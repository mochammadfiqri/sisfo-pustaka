<!-- Create Modal Books -->
<div wire:ignore.self class="modal fade" id="addBooks" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="addBooksLabel" aria-hidden="true">
    <div class="modal-dialog overflow-auto overflow-x-hidden" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="addBooksLabel">Tambah Buku</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.preventwire:submit.prevent="createBooks" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-1">
                        <input wire:model="kode_buku" type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Masukan Kode Buku">
                    </div>
                    @error('kode_buku') <span class="text-danger text-xs font-weight-light">{{ $message }}</span> @enderror
                    <div class="input-group input-group-outline mt-3">
                        <input wire:model="judul" type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul">
                    </div>
                    @error('judul') <span class="text-danger text-xs font-weight-light">{{ $message }}</span> @enderror
                    <div wire:ignore class="input-group input-group-outline mt-3">
                        <select name="categories[]" id="select-multiple" wire:model='categories' data-placeholder="Pilih Kategori..." class="form-control" multiple="multiple">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="text-xs my-sm-0 text-red-600" for="select-category">* Tekan CTRL untuk memilih lebih dari 1
                        kategori</label>
                    <div class="input-group input-group-outline mt-2">
                        <input wire:model="jilid" type="text" class="form-control" name="jilid" id="jilid" placeholder="Masukan Jilid">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="cetakan" type="text" class="form-control" name="cetakan" id="cetakan" placeholder="Masukan Cetakan">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="edisi" type="text" class="form-control" name="edisi" id="edisi" placeholder="Masukan Edisi">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="kata_kunci" type="text" class="form-control" name="kata_kunci" id="kata_kunci" placeholder="Masukan Kata Kunci">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="bahasa" type="text" class="form-control" name="bahasa" id="bahasa"
                            placeholder="Masukan bahasa">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="isbn_issn" type="number" class="form-control" name="isbn_issn" id="isbn_issn"
                            placeholder="Masukan ISBN / ISSN">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="halaman" type="number" class="form-control" name="halaman" id="halaman"
                            placeholder="Masukan Halaman">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="tahun_terbit" type="number" class="form-control" name="tahun_terbit" id="tahun_terbit"
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
                        <textarea wire:model='abstrak' class="form-control" name="abstrak" id="abstrak" cols="15" rows="5" placeholder="Masukan Abstrak"></textarea>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="url" type="text" class="form-control" name="url" id="url"
                            placeholder="Contoh: https://www.google.com">
                    </div>
                    <label class="text-sm mb-0" for="cover">Pilih File</label>
                    <div class="input-group input-group-outline my-1">
                        <input wire:model="file" type="file" class="form-control" name="file">
                    </div>
                    @error('file') <span class="text-danger text-xs font-weight-light">{{ $message }}</span> @enderror
                    <label class="text-sm mb-0 my-2" for="cover">Pilih Cover Buku</label>
                    <div x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <div class="input-group input-group-outline my-1">
                            <input wire:model="cover" type="file" class="form-control" name="cover">
                        </div>
                        <div x-show="isUploading" class="progress rounded">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                aria-valuemax="100" x-bind:value="progress"></div>
                        </div>
                    </div>
                    @error('cover') <span class="text-danger text-xs font-weight-light">{{ $message }}</span> @enderror
                    {{-- @if ($cover)
                        <img src="{{ $cover->temporaryUrl() }}" class="w-50 p-4">
                    @endif --}}
                    <div style="float: right;" class="border-0 mt-3">
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
<div wire:ignore.self class="modal fade" id="updateBooks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="updateBooksLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normzal" id="updateBooksLabel">Edit Buku</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateBooks" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-1">
                        <input wire:model="kode_buku" type="text" class="form-control" name="kode_buku" id="kode_buku"
                            placeholder="Masukan Kode Buku">
                    </div>
                    @error('kode_buku') <span class="text-danger text-xs font-weight-light">{{ $message }}</span>
                    @enderror
                    <div class="input-group input-group-outline mt-3">
                        <input wire:model="judul" type="text" class="form-control" name="judul" id="judul"
                            placeholder="Masukan Judul">
                    </div>
                    @error('judul') <span class="text-danger text-xs font-weight-light">{{ $message }}</span> @enderror
                    <div wire:ignore class="input-group input-group-outline mt-3">
                        <select name="categories[]" id="select-multiple" wire:model='categories' data-placeholder="Pilih Kategori..." class="form-control" multiple="multiple">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="text-xs my-sm-0 text-red-600" for="select-category">* Tekan CTRL untuk memilih lebih dari 1 kategori</label>
                    <div class="input-group input-group-outline mt-3">
                        <input wire:model="jilid" type="text" class="form-control" name="jilid" id="jilid"
                            placeholder="Masukan Jilid">
                    </div>
                    {{-- {{ json_encode($errors->all()) }} --}}
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="cetakan" type="text" class="form-control" name="cetakan" id="cetakan"
                            placeholder="Masukan Cetakan">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="edisi" type="text" class="form-control" name="edisi" id="edisi"
                            placeholder="Masukan Edisi">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="kata_kunci" type="text" class="form-control" name="kata_kunci"
                            id="kata_kunci" placeholder="Masukan Kata Kunci">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="bahasa" type="text" class="form-control" name="bahasa" id="bahasa" placeholder="Masukan bahasa">
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
                        <input wire:model="tahun_terbit" type="number" class="form-control" name="tahun_terbit"
                            id="tahun_terbit" placeholder="Masukan Tahun Terbit">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="kota_terbit" type="text" class="form-control" name="kota_terbit"
                            id="kota_terbit" placeholder="Masukan Kota Terbit">
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
                        <textarea wire:model='abstrak' class="form-control" name="abstrak" id="abstrak" cols="15"
                            rows="5" placeholder="Masukan Abstrak"></textarea>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input wire:model="url" type="text" class="form-control" name="url" id="url"
                            placeholder="Contoh: https://www.google.com">
                    </div>
                    <label class="text-sm mb-0" for="cover">Pilih File</label>
                    <div class="input-group input-group-outline my-1">
                        <input wire:model="file" type="file" class="form-control" name="file">
                    </div>
                    @error('file') <span class="text-danger text-xs font-weight-light">{{ $message }}</span> @enderror
                    <label class="text-sm mb-0 my-2" for="cover">Pilih Cover Buku</label>
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <div class="input-group input-group-outline my-1">
                            <input wire:model="cover" type="file" class="form-control" name="cover">
                        </div>
                        <div x-show="isUploading" class="progress rounded">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100" x-bind:value="progress"></div>
                        </div>
                    </div>
                    @error('cover') <span class="text-danger text-xs font-weight-light">{{ $message }}</span><br> @enderror
                    <label class="text-sm mb-0 my-2" for="cover">Cover Buku :</label><br>
                    <div class="w-25 border-radius-sm shadow-sm">
                        @if (isset($books->cover) && $books->cover != '')
                            <img src="{{ asset('storage/'.$books->cover) }}" width="150px">
                        @else
                            <img src="{{ asset('img/cover-not-found.jpg') }}" width="120px">
                        @endif
                    </div>
                    <div style="float: right;" class="border-0 mt-3">
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
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
                        Apakah anda yakin akan menghapus Buku ini ?
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