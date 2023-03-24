@extends('layouts.app')
@section('title', 'E-Catalog')
@section('navbar1', 'E - Catalog')
@section('navbar2', 'E - Catalog')

@section('content')
    {{-- @include('livewire.admin-area.catalog.html') --}}
    <livewire:admin-area.catalog/>
@endsection
