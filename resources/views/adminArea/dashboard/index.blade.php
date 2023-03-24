@extends('layouts.app')
@section('title', 'Dashboard')
@section('navbar1', 'Dashboard')
@section('navbar2', 'Dashboard')

@section('content')
    {{-- @include('livewire.admin-area.dashboard.html') --}}
    <livewire:admin-area.dashboard/>
@endsection