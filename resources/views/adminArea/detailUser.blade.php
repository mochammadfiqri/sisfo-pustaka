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
        <div class="row justify-content-center align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ asset('img/user.png') }}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ $user->username }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{ $user->no_hp }}
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 my-sm-0 ms-sm-auto me-sm-0 mx-auto">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 flex-column on-resize" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mb-0 px-0 py-1 active" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                                <span class="ms-1">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mb-0 px-0 py-1" id="rentlog-tab" data-bs-toggle="tab"
                                data-bs-target="#rentlog" type="button" role="tab" aria-controls="rentlog"
                                aria-selected="true">
                                <span class="ms-1">History Peminjaman</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="/users" class="nav-link mb-0 px-0 py-1">
                                <i class="material-icons text-lg position-relative">arrow_back</i>
                                <span class="ms-1">Kembali</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            @if ($user->status == 'inactive')
                            <a href="/user-approve/{{ $user->id }}" class="nav-link mb-0 px-0 py-1 active"
                                aria-selected="true"><span class="ms-1">Approve User</span></a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4 mx-3 mx-md-4 py-auto">
        <div class="row">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-header mt-1">
                    <h5>Basic Info</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="{{ $user->username }}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder=" " onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>No. Handphone</label>
                                <input type="text" class="form-control" placeholder="{{ $user->no_hp }}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="{{ $user->alamat }}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="tab-pane fade mt-n9" id="rentlog" role="tabpanel" aria-labelledby="rentlog-tab">
                <x-rent-log-table :rentlog='$rentLogs' />
            </div> 
        </div>
        </div>
    </div>
</div>
<style>
    .hide-profile #profile {
        display: none;
    }

    .hide-rentlog #rentlog {
        display: none;
    }
</style>
@endsection
@push('addonsScript')
{{-- <script>
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
                    $('#addCategory').modal('hide');
                    $('#updateCategory').modal('hide');
                    $('#deleteCategory').modal('hide');
                    toastr.success(event.detail.message);
                })
            });
</script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileTab = document.getElementById("profile-tab");
        const rentlogTab = document.getElementById("rentlog-tab");
        const profileContent = document.getElementById("profile");
        const rentlogContent = document.getElementById("rentlog");

        profileTab.addEventListener("click", function () {
            profileContent.classList.remove("hide-profile");
            rentlogContent.classList.add("hide-rentlog");
        });

        rentlogTab.addEventListener("click", function () {
            profileContent.classList.add("hide-profile");
            rentlogContent.classList.remove("hide-rentlog");
        });
    });
</script>
@endpush