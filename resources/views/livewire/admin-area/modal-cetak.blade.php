<!-- Modal Cetak Laporan Buku -->
<div wire:ignore.self class="modal fade" id="printReport" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="printReportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="printReportLabel">Cetak Laporan</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="printReport">
                <div class="modal-body">
                    filterStatus : {{ var_export($filterStatus) }}
                    <div class="input-group input-group-outline mt-0 w-100">
                        <div class="dropdown w-100">
                            <button class="btn btn-sm btn-outline-secondary w-100 dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih Status
                            </button>
                            <ul class="dropdown-menu dropdown-menu-scrollable w-100" aria-labelledby="dropdownMenuButton">
                                <div class="row row-cols-2 mx-auto mb-3">
                                    <li class="form-check ms-n3">
                                        <input wire:model="filterStatus" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">In Stock</label>
                                    </li>
                                {{-- @foreach ($kategori as $item)
                                <li class="form-check ms-n3">
                                    <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="{{ $item->id }}">
                                    <label class="custom-control-label" for="customCheck1">{{ $item->name }}</label>
                                </li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                    <hr class="horizontal light mt-0 mb-2">
                    <div class="input-group input-group-outline mt-0 w-100">
                        <div class="dropdown w-100">
                            <button class="btn btn-sm btn-outline-secondary w-100 dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih Kategori
                            </button>
                            <ul class="dropdown-menu dropdown-menu-scrollable w-100" aria-labelledby="dropdownMenuButton">
                                <div class="row row-cols-3 mx-auto mb-3">
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">Action</label>
                                    </li>
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">Action</label>
                                    </li>
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">Action</label>
                                    </li>
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">Action</label>
                                    </li>
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">Action</label>
                                    </li>
                                    <li class="form-check ms-n3">
                                        <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="">
                                        <label class="custom-control-label" for="customCheck1">Action</label>
                                    </li>
                                </div>
                                {{-- @foreach ($kategori as $item)
                                <li class="form-check ms-n3">
                                    <input wire:model="filtercategory" class="form-check-input" type="checkbox" value="{{ $item->id }}">
                                    <label class="custom-control-label" for="customCheck1">{{ $item->name }}</label>
                                </li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                    <div style="float: right;" class="border-0 mt-1">
                        <button type="button" class="btn btn-primary" wire:click="closeModal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Cetak</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>