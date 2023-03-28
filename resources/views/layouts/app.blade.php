<!DOCTYPE html>
<html lang="en">

<head>
    <x-partials.head />
    @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-200">
    <!-- Sidebar -->
    @if (Auth::user()->role_id == 1)
        @include('layouts.sidebar.sidebarAdmin')
    @else
        @include('layouts.sidebar.sidebarMember')
    @endif
    <!-- End Sidebar -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        {{-- @include('layouts.navbar.navbar') --}}
        <x-partials.navbar />
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->

            <!-- Footer -->
            {{-- @include('layouts.footer.footer') --}}
            <x-partials.footer />

        </div>
    </main>
    <!-- Fixed Plugin -->
    <x-partials.fixed-plugin />

    <!--   JS Files   -->
    @include('components.partials.javascript')
    @livewireScripts
    <script>
    window.addEventListener('alert', event => { 
                toastr[event.detail.type](event.detail.message, 
                event.detail.title ?? ''), toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                });
    </script>
</body>
</html>