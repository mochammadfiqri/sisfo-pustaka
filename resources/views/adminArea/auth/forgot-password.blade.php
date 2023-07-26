<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>SISFO-PUSTAKA | Lupa Password</title>
    {{--
    <x-partials.head /> --}}
    @livewireStyles
    @include('components.partials.stylesheet')
    {{-- @stack('addonsStyle') --}}
</head>

<body class="g-sidenav-show bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                @include('adminArea.auth.navbar')
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        @include('sweetalert::alert')
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Lupa Password</h4>
                                    <div class="row mt-3">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="input-group input-group-outline mt-0 mb-2">
                                        <label class="form-label">Masukan Email</label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            oninput="checkInput(this)" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Reset
                                            Password Link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!--   JS Files   -->
    @include('components.partials.javascript')
    @livewireScripts
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
</body>

</html>