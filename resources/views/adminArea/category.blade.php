@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Category')
@section('navbar1', 'Category')
@section('navbar2', 'Category')

@section('content')
    <div>
        <livewire:admin-area.index-category>
    </div>
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
    
                window.addEventListener('close-modal', event => {
                    $('#addCategory').modal('hide');
                    $('#updateCategory').modal('hide');
                    $('#deleteCategory').modal('hide');
                    toastr.success(event.detail.message);
                })
            });
    </script>
@endpush