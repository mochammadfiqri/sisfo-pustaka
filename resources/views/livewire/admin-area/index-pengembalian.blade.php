<div class="row">
    @include('sweetalert::alert')
    @include('livewire.admin-area.modal-pengembalian')
    <div class="col-12">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-uppercase ps-3">
                        History Pengembalian Buku
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-success btn-sm float-end me-1"
                            data-bs-toggle="modal" data-bs-target="#apporveBookReturn" data-te-ripple-init
                            data-te-ripple-color="light">
                            <span>Approve Pengembalian</span>
                            <span class="badge badge-xs badge-circle border border-1 ms-1">4</span>
                        </button>
                        <button type="button" class="btn bg-gradient-success btn-sm float-end me-1"
                            data-bs-toggle="modal" data-bs-target="#addbookreturn" data-te-ripple-init
                            data-te-ripple-color="light">
                            <span>Tambah Pengembalian</span>
                        </button>
                    </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="col ms-4">
                    <select wire:model='paginate' class="btn btn-sm btn-outline-secondary" type="button">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                    <div class="col col-md-3 float-end me-3">
                        <div class="input-group input-group-outline">
                            <input wire:model="search" type="text" class="form-control" placeholder="Cari...">
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <x-rent-log-table :rentlog='$rentLogs' />
                    {{-- @include('livewire.admin-area.table-pengembalian') --}}
                </div>
            </div>
        </div>
    </div>
</div>