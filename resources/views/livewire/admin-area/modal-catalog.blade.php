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
            <form wire:submit.prevent="createBooks" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group input-group-outline mt-0 mb-3 @if ($errors->has('kode_buku')) is-filled is-invalid @elseif ($kode_buku) is-filled is-valid @endif">
                        <label class="form-label">Kode Buku</label>
                        <input wire:model="kode_buku" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div class="input-group input-group-outline my-3 @if ($errors->has('judul')) is-filled is-invalid @elseif ($judul) is-filled is-valid @endif">
                        <label class="form-label">Judul Buku</label>
                        <input wire:model="judul" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div wire:ignore class="input-group input-group-outline mt-3">
                        {{-- <select wire:ignore wire:model='categories' data-placeholder="Pilih Kategori..." class="form-control selectpicker" data-live-search="true" multiple>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select> --}}
                        <select wire:model='categories' data-placeholder="Pilih Kategori..." class="form-control" multiple>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label text-xs mb-1 mb-lg-1 mb-md-1">* Tekan <b>CTRL</b> untuk memilih lebih dari 1 Kategori</label>
                    <div class="input-group input-group-outline mt-2 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('jilid')) is-filled is-invalid @elseif ($jilid) is-filled is-valid @endif">
                        <label class="form-label">Jilid</label>
                        <input wire:model="jilid" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('cetakan')) is-filled is-invalid @elseif ($cetakan) is-filled is-valid @endif">
                        <label class="form-label">Cetakan</label>
                        <input wire:model="cetakan" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('edisi')) is-filled is-invalid @elseif ($edisi) is-filled is-valid @endif">
                        <label class="form-label">Edisi</label>
                        <input wire:model="edisi" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('kata_kunci')) is-filled is-invalid @elseif ($kata_kunci) is-filled is-valid @endif">
                        <label class="form-label">Kata Kunci</label>
                        <input wire:model="kata_kunci" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('bahasa')) is-filled is-invalid @elseif ($bahasa) is-filled is-valid @endif">
                        <label class="form-label">Bahasa</label>
                        <input wire:model="bahasa" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('isbn_issn')) is-filled is-invalid @elseif ($isbn_issn) is-filled is-valid @endif">
                        <label class="form-label">ISBN / ISSN</label>
                        <input wire:model="isbn_issn" type="number" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('halaman')) is-filled is-invalid @elseif ($halaman) is-filled is-valid @endif">
                        <label class="form-label">Halaman</label>
                        <input wire:model="halaman" type="number" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('tahun_terbit')) is-filled is-invalid @elseif ($tahun_terbit) is-filled is-valid @endif">
                        <label class="form-label">Tahun Terbit</label>
                        <input wire:model="tahun_terbit" type="number" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('kota_terbit')) is-filled is-invalid @elseif ($kota_terbit) is-filled is-valid @endif">
                        <label class="form-label">Kota Terbit</label>
                        <input wire:model="kota_terbit" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('penerbit')) is-filled is-invalid @elseif ($penerbit) is-filled is-valid @endif">
                        <label class="form-label">Penerbit</label>
                        <input wire:model="penerbit" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('pengarang')) is-filled is-invalid @elseif ($pengarang) is-filled is-valid @endif">
                        <label class="form-label">Pengarang</label>
                        <input wire:model="pengarang" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('abstrak')) is-filled is-invalid @elseif ($abstrak) is-filled is-valid @endif">
                        <label class="form-label">Abstrak</label>
                        <textarea wire:model="abstrak" type="text" cols="5" rows="5" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3"></textarea>
                    </div>
                    <div
                        class="input-group input-group-outline mt-3 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('url')) is-filled is-invalid @elseif ($url) is-filled is-valid @endif">
                        <label class="form-label">Website</label>
                        <input wire:model="url" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
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
                    <div
                        class="input-group input-group-outline mt-0 mb-3 mb-lg-3 mb-md-3 @if ($errors->has('kode_buku')) is-filled is-invalid @elseif ($kode_buku) is-filled is-valid @endif">
                        <label class="form-label">Kode Buku</label>
                        <input wire:model="kode_buku" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('judul')) is-filled is-invalid @elseif ($judul) is-filled is-valid @endif">
                        <label class="form-label">Judul Buku</label>
                        <input wire:model="judul" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div wire:ignore class="input-group input-group-outline mt-3">
                        <select wire:model='categories' data-placeholder="Pilih Kategori..." class="form-control" multiple>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label text-xs mb-1 mb-lg-1 mb-md-1">* Tekan <b>CTRL</b> untuk memilih lebih dari 1 Kategori</label>
                    <div class="input-group input-group-outline mt-2 mb-3 @if ($errors->has('cetakan')) is-filled is-invalid @elseif ($cetakan) is-filled is-valid @endif">
                        <label class="form-label">Cetakan</label>
                        <input wire:model="cetakan" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('edisi')) is-filled is-invalid @elseif ($edisi) is-filled is-valid @endif">
                        <label class="form-label">Edisi</label>
                        <input wire:model="edisi" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('kata_kunci')) is-filled is-invalid @elseif ($kata_kunci) is-filled is-valid @endif">
                        <label class="form-label">Kata Kunci</label>
                        <input wire:model="kata_kunci" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('bahasa')) is-filled is-invalid @elseif ($bahasa) is-filled is-valid @endif">
                        <label class="form-label">Bahasa</label>
                        <input wire:model="bahasa" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('isbn_issn')) is-filled is-invalid @elseif ($isbn_issn) is-filled is-valid @endif">
                        <label class="form-label">ISBN / ISSN</label>
                        <input wire:model="isbn_issn" type="number" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('halaman')) is-filled is-invalid @elseif ($halaman) is-filled is-valid @endif">
                        <label class="form-label">Halaman</label>
                        <input wire:model="halaman" type="number" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('tahun_terbit')) is-filled is-invalid @elseif ($tahun_terbit) is-filled is-valid @endif">
                        <label class="form-label">Tahun Terbit</label>
                        <input wire:model="tahun_terbit" type="number" class="form-control" oninput="checkInput(this)"
                            onfocus="focused(this)" onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('kota_terbit')) is-filled is-invalid @elseif ($kota_terbit) is-filled is-valid @endif">
                        <label class="form-label">Kota Terbit</label>
                        <input wire:model="kota_terbit" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('penerbit')) is-filled is-invalid @elseif ($penerbit) is-filled is-valid @endif">
                        <label class="form-label">Penerbit</label>
                        <input wire:model="penerbit" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('pengarang')) is-filled is-invalid @elseif ($pengarang) is-filled is-valid @endif">
                        <label class="form-label">Pengarang</label>
                        <input wire:model="pengarang" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('abstrak')) is-filled is-invalid @elseif ($abstrak) is-filled is-valid @endif">
                        <label class="form-label">Abstrak</label>
                        <textarea wire:model="abstrak" type="text" cols="5" rows="5" class="form-control" oninput="checkInput(this)"
                            onfocus="focused(this)" onfocusout="defocused(this)" data-gtm-form-interact-field-id="3"></textarea>
                    </div>
                    <div
                        class="input-group input-group-outline my-3 @if ($errors->has('url')) is-filled is-invalid @elseif ($url) is-filled is-valid @endif">
                        <label class="form-label">Website</label>
                        <input wire:model="url" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)"
                            onfocusout="defocused(this)" data-gtm-form-interact-field-id="3">
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
                    {{-- <label class="text-sm mb-0 my-2" for="cover">Cover Buku :</label><br>
                    <div class="w-25 border-radius-sm shadow-sm">
                        @if (isset($books->cover) && $books->cover != '')
                            <img src="{{ asset('storage/'.$books->cover) }}" width="150px">
                        @else
                            <img src="{{ asset('img/cover-not-found.jpg') }}" width="120px">
                        @endif
                    </div> --}}
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