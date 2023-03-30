<div class="row">
    {{-- <livewire:admin-area.create-category /> --}}
    @include('livewire.admin-area.create-category')
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-uppercase ps-3">
                        Kategori Buku
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-success btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#addCategory">Tambah Kategori</button>
                    </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    {{-- <livewire:admin-area.table-category /> --}}
                    @include('livewire.admin-area.table-category')
                </div>
            </div>
        </div>
    </div>
</div>