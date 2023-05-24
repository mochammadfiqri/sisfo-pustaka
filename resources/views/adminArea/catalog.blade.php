@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | E-Catalog')
@section('navbar1', 'E-Catalog')
@section('navbar2', 'E-Catalog')

@push('addonsStyle')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <livewire:admin-area.index-catalog />
@endsection

@push('addonsScript')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
            $(document).ready(function(){
                $( '#select-multiple' ).select2( {
                theme: "bootstrap-5",
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
                } );
            });
        // $(document).ready(function() {
        //     $('.select-multiple').select2({
        //         placeholder: 'Pilih Kategori...',
        //         theme: "bootstrap-5",
        //         selectionCssClass: "select2--small", // For Select2 v4.1
        //         dropdownCssClass: "select2--small",
        //     });
        // });
    </script>
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
                    $('#addBooks').modal('hide');
                    $('#updateBooks').modal('hide');
                    $('#deleteBooks').modal('hide');
                    toastr.success(event.detail.message);
                })
            });
    </script>
@endpush