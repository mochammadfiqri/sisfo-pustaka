<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>SISFO-PUSTAKA | Login</title>
    @include('components.partials.stylesheet')
</head>

<body>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                @include('adminArea.auth.navbar')
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        @include('sweetalert::alert')
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url({{ asset('img/illustrations/illustration-signup.jpg') }}); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-body">
                                    <h4 class="font-weight-bolder mb-0">Sign Up</h4>
                                    <p class="mb-2">Enter your Data to register</p>
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">E-Mail</label>
                                            <input for="email" type="email" name="email" id="email" class="form-control" oninput="checkInput(this)"
                                                onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                        {{-- <div class="input-group input-group-outline mb-3">
                                            <input for="username" type="text" name="username" id="username" class="form-control" placeholder="Username">
                                        </div> --}}
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Username</label>
                                            <input for="username" type="text" name="username" id="username" class="form-control" oninput="checkInput(this)"
                                                onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                        {{-- <div class="input-group input-group-outline mb-3">
                                            <input for="password" type="password" name="password" id="password" class="form-control" placeholder="Password">                         
                                        </div> --}}
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input for="password" type="password" name="password" id="password" class="form-control" oninput="checkInput(this)"
                                                onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                        {{-- <div class="input-group input-group-outline mb-3">
                                            <input for="no_hp" type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone">
                                        </div> --}}
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">No. Handphone</label>
                                            <input for="no_hp" type="number" name="no_hp" id="no_hp" class="form-control" oninput="checkInput(this)"
                                                onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                        {{-- <div class="input-group input-group-outline mb-3">
                                            <textarea name="alamat" id="alamat" rows="4" class="form-control" placeholder="Alamat"></textarea>
                                        </div> --}}
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" id="alamat" rows="4" class="form-control" oninput="checkInput(this)"
                                                onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                                        </div>
                                        <div class="form-check form-check-info text-start ps-0">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">I agree the <a href="javascript:;"
                                                    class="text-dark font-weight-bolder">Terms and Conditions</a>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="login"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('components.partials.javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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