@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Detail Book')
@section('navbar1', 'Detail Book')
@section('navbar2', 'Detail Book')

@push('addonsStyle')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-0"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row">
                @include('livewire.member-area.modal-detail-book')
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="h-100">
                        @if ($books->cover !== null)
                        <img src="{{ asset('storage/'.$books->cover) }}" class="w-100 border-radius-lg shadow-sm">
                        {{-- <img src="{{ Storage::url($books->cover) }}" class="w-100 border-radius-lg shadow-sm"> --}}
                        @else
                        <img src="{{ asset('img/cover-not-found.jpg') }}" class="w-100 border-radius-lg shadow-sm">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-6 align-items-top justify-content-top">
                    <div class="w-100 me-10 mt-3">
                        <h5 class="fw-bold fs-lg fs-md text-md-10 mb-1">{{ $books->judul }}</h5>
                        <p class="font-weight-normal text-sm">{{ $books->pengarang }}</p>
                        <div class="card card-plain">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Abstract :</h6>
                            {{-- <textarea class="text-justify w-100" cols="30" rows="7" style="overflow: auto;" disabled>Sistem informasi stok barang di CV. Elizabeth Parfumindo masih menggunakan tahapan manual seperti membuat kartu stok di excel, dan untuk menghasilkan laporan barang masih harus merekap data barang satu persatu. Dengan jumlah data barang yang mencapai ratusan menyulitkan admin gudang dalam proses pembuatan laporan mingguan dan laporan bulanan. Maka dari itu dilakukan penelitian untuk mengembangkan sistem informasi barang. Pengembangan Sistem informasi barang ini menggunakan Framework Laravel dengan metode MVC (Model,View,Controller) dan memanfaatkan Livewire untuk membangun
                            </textarea> --}}
                            <div style="overflow: auto; height: 210px;">
                                <label class="text-body text-justify w-auto mb-0">
                                    {{ $books->abstrak }}
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Platform Settings</h6>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox"
                                                id="flexSwitchCheckDefault" checked="">
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                for="flexSwitchCheckDefault">Email me when someone follows me</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox"
                                                id="flexSwitchCheckDefault1">
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                for="flexSwitchCheckDefault1">Email me when someone answers on my
                                                post</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox"
                                                id="flexSwitchCheckDefault2" checked="">
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="javascript:;">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile"
                                                data-bs-original-title="Edit Profile"></i><span class="sr-only">Edit
                                                Profile</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <p class="text-sm">
                                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two
                                    equally difficult paths, choose the one more painful in the short term (pain
                                    avoidance is creating an illusion of equality).
                                </p>
                                <hr class="horizontal gray-light my-4">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                            Name:</strong> &nbsp; Alec M. Thompson</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Mobile:</strong> &nbsp; (44)
                                        123 1234 123</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> &nbsp;
                                        alecthompson@mail.com</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Location:</strong> &nbsp;
                                        USA</li>
                                    <li class="list-group-item border-0 ps-0 pb-0">
                                        <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                        <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                            <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                            <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                            <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Conversations</h6>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                        <div class="avatar me-3">
                                            <img src="../assets/img/kal-visuals-square.jpg" alt="kal"
                                                class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Sophie B.</h6>
                                            <p class="mb-0 text-xs">Hi! I need more information..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                            href="javascript:;">Reply</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Anne Marie</h6>
                                            <p class="mb-0 text-xs">Awesome work, can you..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                            href="javascript:;">Reply</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="../assets/img/ivana-square.jpg" alt="kal"
                                                class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Ivanna</h6>
                                            <p class="mb-0 text-xs">About files I can..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                            href="javascript:;">Reply</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Peterson</h6>
                                            <p class="mb-0 text-xs">Have a great afternoon..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                            href="javascript:;">Reply</a>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                                        <div class="avatar me-3">
                                            <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                            <p class="mb-0 text-xs">Hi! I need more information..</p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                            href="javascript:;">Reply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="mb-5 ps-3">
                            <h6 class="mb-1">Projects</h6>
                            <p class="text-sm">Architects design houses</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 mt-n4 mx-3">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="mb-0 text-sm">Project #2</p>
                                        <a href="javascript:;">
                                            <h5>
                                                Modern
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            As Uber works through a huge amount of internal management turmoil.
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                Project</button>
                                            <div class="avatar-group mt-2">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Elena Morison" data-bs-original-title="Elena Morison">
                                                    <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Ryan Milly" data-bs-original-title="Ryan Milly">
                                                    <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Nick Daniel" data-bs-original-title="Nick Daniel">
                                                    <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Peterson" data-bs-original-title="Peterson">
                                                    <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 mt-n4 mx-3">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-lg">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="mb-0 text-sm">Project #1</p>
                                        <a href="javascript:;">
                                            <h5>
                                                Scandinavian
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            Music is something that every person has his or her own specific opinion
                                            about.
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                Project</button>
                                            <div class="avatar-group mt-2">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Nick Daniel" data-bs-original-title="Nick Daniel">
                                                    <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Peterson" data-bs-original-title="Peterson">
                                                    <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Elena Morison" data-bs-original-title="Elena Morison">
                                                    <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Ryan Milly" data-bs-original-title="Ryan Milly">
                                                    <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 mt-n4 mx-3">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="mb-0 text-sm">Project #3</p>
                                        <a href="javascript:;">
                                            <h5>
                                                Minimalist
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            Different people have different taste, and various types of music.
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                Project</button>
                                            <div class="avatar-group mt-2">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Peterson" data-bs-original-title="Peterson">
                                                    <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Nick Daniel" data-bs-original-title="Nick Daniel">
                                                    <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Ryan Milly" data-bs-original-title="Ryan Milly">
                                                    <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Elena Morison" data-bs-original-title="Elena Morison">
                                                    <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 mt-n4 mx-3">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80"
                                                alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="mb-0 text-sm">Project #4</p>
                                        <a href="javascript:;">
                                            <h5>
                                                Gothic
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            Why would anyone pick blue over pink? Pink is obviously a better color.
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                Project</button>
                                            <div class="avatar-group mt-2">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Peterson" data-bs-original-title="Peterson">
                                                    <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Nick Daniel" data-bs-original-title="Nick Daniel">
                                                    <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Ryan Milly" data-bs-original-title="Ryan Milly">
                                                    <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    aria-label="Elena Morison" data-bs-original-title="Elena Morison">
                                                    <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-12 col-md-3 col-lg-3 my-sm-0 ms-sm-auto me-sm-0 mx-auto">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 flex-column on-resize">
                            <li class="nav-item" role="presentation">
                                <a href="/daftar_buku" class="nav-link mb-0 px-0 py-1 active" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">arrow_back</i>
                                    <span class="ms-1">Kembali</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#" class="nav-link mb-0 px-0 py-1 active" aria-selected="true"><span
                                        class="ms-1">History
                                        Peminjaman</span></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                @if ($books->status == 'in stock')
                                <a href="#" class="nav-link mb-0 px-0 py-1 active" role="button" aria-selected="true"
                                    data-bs-toggle="modal" data-bs-target="#approveModal{{ $books->id }}">  
                                    <span class="ms-1">Pinjam Buku</span>
                                </a>
                                @else
                                <a href="#" class="nav-link mb-0 px-0 py-1 active" role="button" aria-selected="true"
                                    data-bs-toggle="modal" data-bs-target="#returnModal{{ $books->id }}">
                                    <span class="ms-1">Kembalikan Buku</span>
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="fw-bold fs-lg fs-md text-md-10 ms-2 mt-4 mb-4">Data Buku</h5>
                <div class="ms-2 pt-0">
                    <div class="row">
                        <div class="col-4">
                            @foreach ($books->DDCcategories as $item)
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">No. Klasifikasi
                                <i class="fas fa-question fa-spin float-end" title="{{ $item->ddc_number }} - {{ $item->name }}"></i>
                            </h6>
                            {{-- <label class="text-body w-auto mb-0">
                                001 - Buku
                            </label> --}}
                            
                            <input type="text" class="form-control" placeholder="{{ $item->ddc_number }}" title="{{ $item->ddc_number }} - {{ $item->name }}" disabled>
                            @endforeach
                        </div>
                        <div class="col-4">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Jilid</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->jilid }}" disabled>
                        </div>
                        <div class="col-4">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Cetakan</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->cetakan }}" disabled>
                        </div>
                        <div class="col-4 mt-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Edisi</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->edisi }}" disabled>
                        </div>
                        <div class="col-4 mt-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Kata Kunci</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->kata_kunci }}" disabled>
                        </div>
                        <div class="col-4 mt-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Bahasa</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->bahasa }}" disabled>
                        </div>
                        <div class="col-4 mt-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">ISBN / ISSN</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->isbn_issn }}" disabled>
                        </div>
                        <div class="col-4 mt-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Halaman</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->halaman }}" disabled>
                        </div>
                        <div class="col-4 mt-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Tahun Terbit</h6>
                            <input type="text" class="form-control" placeholder="{{ $books->tahun_terbit }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="fw-bold fs-lg fs-md text-md-10 ms-2 mt-4 mb-3">Author</h5>
                <div class="ms-2 pt-0">
                    <div class="row">
                        {{-- @foreach ( as )
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="{{ $books->pengarang }}" disabled>
                        </div>
                        @endforeach --}}
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="{{ $books->pengarang }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="fw-bold fs-lg fs-md text-md-10 ms-2 mt-4 mb-3">Publisher</h5>
                <div class="ms-2 pt-0">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="{{ $books->penerbit }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="fw-bold fs-lg fs-md text-md-10 ms-2 mt-4 mb-3">Files</h5>
                <div class="ms-2 pt-0">
                    <div class="row">
                        <div class="col-12">
                            {{-- <a href="{{ route('pdf.show', ['filename' => $books->file]) }}" target="_blank" title="{{ $books->file }}">Tampilkan PDF</a> --}}
                            <a href="{{ asset('storage/'.$books->file) }}" target="_blank">
                                <i class="fas fa-file-pdf"></i> Baca Buku 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addonsScript')
{{-- <script>
    PSPDFKit.load({
		container: "#pspdfkit",
  		document: "document.pdf" // Add the path to your document here.
	})
	.then(function(instance) {
		console.log("PSPDFKit loaded", instance);
	})
	.catch(function(error) {
		console.error(error.message);
	});
</script>
<script src="assets/pspdfkit.js"></script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let borrowLinks = document.querySelectorAll(".borrow-link");
        
        borrowLinks.forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                
                let bookId = this.getAttribute("data-id");
                borrowBook(bookId);
            });
        });
        
        function borrowBook(bookId) {
            fetch(`/books-approve/${bookId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success Swal.fire notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Buku berhasil dipinjam',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            // Reload halaman setelah notifikasi muncul
                            window.location.reload();
                        });
                    } else {
                        // Show error Swal.fire notification
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal meminjam buku',
                            text: 'Terjadi masalah saat meminjam buku.'
                        });
                    }
                })
                .catch(error => {
                    console.error("Terjadi kesalahan:", error);
                });
        }
    });
</script>
{{-- <script>
    document.addEventListener('livewire:load', function() {
            const inputs = document.querySelectorAll('.form-control');

            inputs.forEach(function(input) {
                const div = input.parentNode;
                const errorElement = div.querySelector('.text-danger');

                // Check initial input value
                if (input.value.trim() !== '') {
                    div.classList.add('is-filled');
                    if (input.checkValidity() && !errorElement) {
                        div.classList.add('is-valid');
                    }
                }

                // Check input on focusout
                input.addEventListener('focusout', function() {
                    if (input.value.trim() !== '') {
                        div.classList.add('is-filled');
                        if (input.checkValidity() && !errorElement) {
                            div.classList.add('is-valid');
                            div.classList.remove('is-invalid');
                        } else {
                            div.classList.remove('is-valid');
                            div.classList.add('is-invalid');
                        }
                    } else {
                        div.classList.remove('is-filled');
                        div.classList.remove('is-valid');
                        div.classList.remove('is-invalid');
                    }
                });
            });
        });

        function focused(input) {
            input.parentNode.classList.add('is-focused');
        }

        function defocused(input) {
            input.parentNode.classList.remove('is-focused');
        }
</script> --}}
<script>
    $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            window.addEventListener('close-modal', event => {
                $('#rentBook').modal('hide');
                toastr.success(event.detail.message);
            })
        });
</script>
<script src="{{ asset('js/plugins/bootstrap-select.min.js') }}"></script>
@endpush