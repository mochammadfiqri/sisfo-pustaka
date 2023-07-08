@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | E-Catalog')
@section('navbar1', 'E-Catalog')
@section('navbar2', 'E-Catalog')

@push('addonsStyle')
    <!-- Material Bootstrap Choices -->
    {{-- <link rel="stylesheet" href="{{ asset('css/choices.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" /> --}}
    {{-- <script src="{{ asset('js/plugins/choices.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <livewire:admin-area.index-catalog />
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
            });
    </script> --}}
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
    {{-- <script>
        $('.selectpicker').on('hide.bs.select', function (e) {
        var target = $(e.relatedTarget);
        if (target.is('input[type="text"]')) {
        e.preventDefault();
        e.stopPropagation();
        }
        });
    </script> --}}
@endpush