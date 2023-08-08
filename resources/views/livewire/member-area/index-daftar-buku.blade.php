<div class="row">
    @include('sweetalert::alert')
    <div class="col-12">
        <div class="card my-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-uppercase ps-3">
                        Daftar Buku
                    </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="row">
                    <div class="col ms-4">
                        {{-- <select wire:model='paginate' class="btn btn-sm btn-outline-secondary" type="button">
                            <option value="5">4</option>
                            <option value="10">8</option>
                            <option value="15">12</option>
                        </select> --}}
                    </div>
                    {{-- filtercategory : {{ var_export($filtercategory) }} --}}
                    <div class="col col-lg-2 col-md-4 col-sm-8 float-end">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-auto-close="outside"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih Kategori
                            </button>
                            <ul class="dropdown-menu dropdown-menu-scrollable" aria-labelledby="dropdownMenuButton">
                                @foreach ($kategori as $item)
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="{{ $item->id }}">
                                        <label class="custom-control-label" for="customCheck1">{{ $item->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-3 float-end me-3">
                        <div class="input-group input-group-outline">
                            <input wire:model="search" type="text" class="form-control" placeholder="Cari Buku...">
                        </div>
                    </div>
                </div>
                @include('livewire.member-area.card-daftar-buku')
            </div>
        </div>
    </div>
</div>