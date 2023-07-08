<div class="row ms-auto ms-lg-4 ms-md-3 ms-sm-auto">
    @foreach ($books as $item)
        <div class="col-12 col-lg-3 col-md-4 col-sm-8 mb-5 mb-lg-5 me-n6 me-lg-1 me-md-n1 me-sm-n4 ms-n2">
            <div class="card mt-4 h-100" data-animation="true">
                <div class="card-header p-0 position-relative mt-n4 mx-auto z-index-2">
                    <a class="d-block blur-shadow-image">
                        <img src="{{ $item->cover != null ? asset('storage/'. $item->cover) : asset('img/cover-not-found.jpg') }}" alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-lg mx-auto" draggable="false">
                    </a>
                    <div class="colored-shadow"
                        style="background-image: url(&quot;{{ $item->cover != null ? asset('storage/'. $item->cover) : asset('img/cover-not-found.jpg') }}&quot;);">
                    </div>
                </div>
                <div class="card-body text-center mx-1">
                    <div class="d-flex mt-n6">
                        <a href="#" type="button" class="btn btn-outline-info btn-sm mx-auto w-lg-100 w-md-100 w-60">
                            View Detail
                        </a>
                    </div>
                    <h5 class="font-weight-bold text-sm mt-3">
                        <a href="javascript:;">{{ $item->judul }}
                            <p class="fst-italic text-muted text-xs">{{ $item->pengarang }}</p>
                        </a>
                    </h5>
                    <p class="text-xs mb-0">
                        {{ $item->abstrak }}
                    </p>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex">
                    <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">inventory_2</i>
                    <p class="text-xs my-auto {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }} fw-lighter fst-italic"> 
                    {{ $item->status }}</p>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="float-end me-3">
        {{ $books->links() }}
    </div> --}}
</div>