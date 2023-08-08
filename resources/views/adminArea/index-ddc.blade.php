@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Dewey Decimal Classification')
@section('navbar1', 'Dewey Decimal Classification')
@section('navbar2', 'Dewey Decimal Classification')

@push('addonsStyle')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    {{-- <livewire:admin-area.ddc-category /> --}}
    <livewire:admin-area.ddc-category>
@endsection

@push('addonsScript')
<script>
    document.addEventListener('livewire:load', function () {
            const inputs = document.querySelectorAll('.form-control');
    
            inputs.forEach(function (input) {
                const div = input.parentNode;
                const errorElement = div.querySelector('.text-danger');
    
                // Check initial input value
                if (input.value.trim() !== '') {
                    div.classList.add('is-filled');
                    if (input.checkValidity() && !errorElement) {
                        div.classList.add('is-valid');
                    }
                }
    
                // Check input on focusout
                input.addEventListener('focusout', function () {
                    if (input.value.trim() !== '') {
                        div.classList.add('is-filled');
                        if (input.checkValidity() && !errorElement) {
                            div.classList.add('is-valid');
                            div.classList.remove('is-invalid');
                        } else {
                            div.classList.remove('is-valid');
                            div.classList.add('is-invalid');
                        }
                    } else {
                        div.classList.remove('is-filled');
                        div.classList.remove('is-valid');
                        div.classList.remove('is-invalid');
                    }
                });
            });
        });
    
        function focused(input) {
            input.parentNode.classList.add('is-focused');
        }
    
        function defocused(input) {
            input.parentNode.classList.remove('is-focused');
        }
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
<script src="{{ asset('js/plugins/bootstrap-select.min.js') }}"></script>
@endpush