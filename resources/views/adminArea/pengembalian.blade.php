@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Pengembalian Buku')
@section('navbar1', 'Pengembalian Buku')
@section('navbar2', 'Pengembalian Buku')

@push('addonsStyle')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <livewire:admin-area.index-pengembalian>
@endsection

@push('addonsScript')
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

                    window.addEventListener('success', event => {
                        $('#addbookreturn').modal('hide');
                        toastr.success(event.detail.message);
                    })

                    window.addEventListener('error', event => {
                        $('#addbookreturn').modal('hide');
                        toastr.error(event.detail.message);
                    })
                });
    </script>
    <script src="{{ asset('js/plugins/bootstrap-select.min.js') }}"></script>
@endpush
