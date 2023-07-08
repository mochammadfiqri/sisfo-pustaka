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
@endpush