@extends('layouts.app')
@section('title', 'SISFO-PUSTAKA | Users')
@section('navbar1', 'Users')
@section('navbar2', 'Users')

@section('content')
    <div>
        <livewire:admin-area.index-users>
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
                    $('#registeredUsers').modal('hide');
                    $('#validApprove').modal('hide');
                    $('#removeUser').modal('hide');
                    toastr.success(event.detail.message);
                })
            });
</script>
{{-- <script>
    Livewire.on('show-toast', function (data) {
            alert(data.message);
        });
</script> --}}
{{-- <script>
    Livewire.on('userApproved', () => {
        Livewire.emit('refreshRegisteredUsers');
    });
</script> --}}
@endpush