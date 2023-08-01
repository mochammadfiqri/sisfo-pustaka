<div class="row">
    @include('sweetalert::alert')
    @include('livewire.admin-area.modal-catalog')
    <div class="col-12">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-uppercase ps-3">
                        Daftar Buku
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-success btn-sm float-end me-1" data-bs-toggle="modal"
                            data-bs-target="#addBooks" data-te-ripple-init data-te-ripple-color="light">Tambah Buku</button>
                    </h6>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                        <select wire:model='paginate' class="btn btn-sm btn-outline-secondary float-start" type="button">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                        <div class="col col-md-3 col-lg-4 me-2">
                            <a href="/e-catalog/export-book" class="btn btn-sm btn-outline-secondary mb-2 float-start ms-2" role="button">
                                <i class="material-icons">print</i>
                                <span class="nav-link-text ms-2 ps-1">Cetak Laporan</span>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 col-lg-4 float-end">
                            <div class="input-group input-group-outline @if ($errors->has('search')) is-filled is-invalid @elseif ($search) is-filled is-valid @endif">
                                <label class="form-label">Cari Buku...</label>
                                <input wire:model="search" type="text" class="form-control" oninput="checkInput(this)" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    @include('livewire.admin-area.table-catalog')
                </div>
            </div>
        </div>
    </div>
</div>