@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Daftar Buku')
@section('navbar1', 'Daftar Buku')
@section('navbar2', 'Daftar Buku')

@push('addonsStyle')
    <!-- Material Bootstrap Choices -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
@endpush

@section('content')
    <style>
        .dropdown-menu-scrollable {
            max-height: 150px;
            /* Ubah ketinggian sesuai kebutuhan */
            overflow-y: auto;
        }
    </style>
    <livewire:member-area.index-daftar-buku />
@endsection

@push('addonsScript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var multipleCancelButton = new Choices(
                '#choices-multiple-remove-button',
                {
                    allowHTML: true,
                    removeItemButton: true,
                }
            );
        });
    </script>
@endpush