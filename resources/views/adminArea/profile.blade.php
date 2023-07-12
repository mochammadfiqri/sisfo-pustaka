@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Profile')
@section('navbar1', 'Category')
@section('navbar2', 'Category')

@section('content')
    <div>
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2"> 
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('img/user.png') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ Auth::user()->username }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Founder
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3 my-sm-0 ms-sm-auto me-sm-0 mx-auto">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 flex-column on-resize" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mb-0 px-0 py-1 active" id="#-tab" data-bs-toggle="tab"
                                        data-bs-target="#" type="button" role="tab" aria-controls="#" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">home</i>
                                        <span class="ms-1">App</span>                                        
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mb-0 px-0 py-1" id="#-tab" data-bs-toggle="tab" data-bs-target="#"
                                        type="button" role="tab" aria-controls="#" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">settings</i>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-header mt-1">
                                <h5>Basic Info</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Mochammad Fiqri" onfocus="focused(this)"
                                            onfocusout="defocused(this)" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Ash'ari" onfocus="focused(this)" onfocusout="defocused(this)"
                                            disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <label class="form-label mt-4 ms-0">Gender</label>
                                        <input type="text" class="form-control" placeholder="Male" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-5 col-5">
                                                <label class="form-label mt-4 ms-0">Birth Date</label>
                                                <input type="text" class="form-control" placeholder="Oktober" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                                            </div>
                                            <div class="col-sm-4 col-3">
                                                <label class="form-label mt-4 ms-0">&nbsp;</label>
                                                <input type="text" class="form-control" placeholder="17" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                                            </div>
                                            <div class="col-sm-3 col-4">
                                                <label class="form-label mt-4">&nbsp;</label>
                                                <input type="text" class="form-control" placeholder="2000" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
