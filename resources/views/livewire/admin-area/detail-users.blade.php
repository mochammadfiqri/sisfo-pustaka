@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Users')
@section('navbar1', 'Users / Detail')
@section('navbar2', 'Detail')

@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-0"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row">
            {{-- <div class="col-12 col-md-4 col-lg-3">
                <div class="h-100">
                    @if ($books->cover !== null)
                    <img src="{{ asset('storage/'.$books->cover) }}" class="w-100 border-radius-lg shadow-sm">
                    <img src="{{ Storage::url($books->cover) }}" class="w-100 border-radius-lg shadow-sm">
                    @else
                    <img src="{{ asset('img/cover-not-found.jpg') }}" class="w-100 border-radius-lg shadow-sm">
                    @endif
                </div>
            </div> --}}
            <div class="col-12 col-md-5 col-lg-6 d-flex align-items-top justify-content-top">
                <div class="w-100 me-10">
                    <h5 class="fw-bold fs-lg fs-md text-md-10 mb-1">{{ $user->username }}</h5>
                    <p class="font-weight-normal text-sm">{{ $user->no_hp }}</p>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 my-sm-0 ms-sm-auto me-sm-0 mx-auto">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 flex-column on-resize">
                        <li class="nav-item" role="presentation">
                            <a href="/users" class="nav-link mb-0 px-0 py-1 active" aria-selected="true">
                                <i class="material-icons text-lg position-relative">arrow_back</i>
                                <span class="ms-1">Kembali</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#" class="nav-link mb-0 px-0 py-1 active" aria-selected="true"><span class="ms-1">History Peminjaman</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            @if ($user->status == 'inactive')
                                <a href="/user-approve/{{ $user->id }}" class="nav-link mb-0 px-0 py-1 active" aria-selected="true"><span class="ms-1">Approve User</span></a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-12 col-md-3 col-lg-3 align-items-top justify-content-end mt-3 ">
                <button type="button" class="btn bg-gradient-success btn-sm">Kembali</button>
            </div> --}}
        </div>
        <div class="row">
            <div class="row">

            </div>
        </div>
    </div>
</div>
@endsection