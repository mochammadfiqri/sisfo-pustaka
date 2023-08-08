@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Dashboard')
@section('navbar1', 'Dashboard')
@section('navbar2', 'Dashboard')

@section('content')
<div class="row">
    {{-- @include('sweetalert::alert') --}}
    <div class="col-12 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">book</i>
                </div>
                <div class="text-start ms-7 pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Buku Dipinjam</p>
                    <h4 class="mb-0">{{ $RentBookCount }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                    last week</p>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Pengguna</p>
                    <h4 class="mb-0">{{ $user_count }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                    last month</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">category</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Kategori</p>
                    <h4 class="mb-0">{{ $category_count }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                    yesterday</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">supervisor_account</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Pengunjung Hari Ini</p>
                    <h4 class="mb-0">230</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                    yesterday</p>
            </div>
        </div>
    </div> --}}
</div>
<div class="row my-3">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">History Peminjaman</h6>
                </div>
            </div>
            {{-- nanti disini search --}}
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <x-rent-log-table :rentlog='$rentLogs' />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection