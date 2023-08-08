@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | E-Catalog')
@section('navbar1', 'E-Catalog')
@section('navbar2', 'E-Catalog')

@push('addonsStyle')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <livewire:admin-area.index-catalog />
@endsection

@push('addonsScript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#select2').select2({
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                dropdownParent: $( '#select2' ).parent(),
            });
        });
    </script> --}}
    {{-- <script>
        $('#select2-multiple').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
            dropdownParent: $('#select2-multiple').parent(),
        });
    </script> --}}
    <script>
        document.addEventListener('livewire:load', function() {
            const inputs = document.querySelectorAll('.form-control');

            inputs.forEach(function(input) {
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
                input.addEventListener('focusout', function() {
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
