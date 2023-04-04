@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | E-Catalog')
@section('navbar1', 'E-Catalog')
@section('navbar2', 'E-Catalog')

@section('content')
    <livewire:admin-area.index-catalog />
@endsection
@section('script')
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
@endsection