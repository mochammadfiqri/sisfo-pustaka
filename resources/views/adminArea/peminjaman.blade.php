@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Peminjaman Buku')
@section('navbar1', 'Peminjaman Buku')
@section('navbar2', 'Peminjaman Buku')

@push('addonsStyle')
<!-- Material Bootstrap Choices -->
{{-- <link rel="stylesheet" href="{{ asset('css/choices.min.css') }}" />
<script src="{{ asset('js/plugins/choices.min.js') }}"></script> --}}

<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <livewire:admin-area.index-peminjaman>
@endsection

@push('addonsScript')
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
                var multipleCancelButton = new Choices(
                    '#choices-multiple-remove-button',
                    {
                        allowHTML: true,
                        removeItemButton: true,
                    }
                );

                var singleNoSearch = new Choices(
                    '#choices-single-default', 
                    {
                        allowHTML: true,
                        searchEnabled: true,
                    }
                );
                });
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
    
                window.addEventListener('success', event => {
                    $('#addbookrent').modal('hide');
                    toastr.success(event.detail.message);
                })

                window.addEventListener('error', event => {
                    $('#addbookrent').modal('hide');
                    toastr.error(event.detail.message);
                })
            });
</script>
<script src="{{ asset('js/plugins/bootstrap-select.min.js') }}"></script>
{{-- <script>
    $(document).ready(function() {
            $('.selectpicker').selectpicker({
                dropupAuto: false
            });
        });
</script> --}}
@endpush