<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps ps--active-y bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">SISFO - PUSTAKA</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-0">
                <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav"
                    role="button" aria-expanded="false">
                    <img src="{{ asset('img/user.png') }}" class="avatar">
                    <span class="nav-link-text ms-2 ps-1 text-uppercase">{{ Auth::user()->username }}</span>
                </a>
                <div class="collapse" id="ProfileNav" style="">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a href="/profile_anggota" class="nav-link text-white {{ request()->routeIs('profile-admin') ? 'active' : '' }}">
                                <span class="material-icons-round">person</span>
                                <span class="sidenav-normal ms-3 ps-1">My Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="/logout">
                                <span class="material-icons-round">logout</span>
                                <span class="sidenav-normal ms-3 ps-1">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr class="horizontal light mt-0 mb-2">
            <li class="nav-item ">
                <a href="/dashboard" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-controls="dashboardsExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">dashboard</i>
                    <span class="nav-link-text ms-2 ps-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/daftar_buku" class="nav-link text-white {{ request()->routeIs('daftarbuku') ? 'active' : '' }}" aria-controls="catalogExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">book</i>
                    <span class="nav-link-text ms-2 ps-1">Daftar Buku</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="/kategori-buku" class="nav-link text-white {{ request()->routeIs('kategori') ? 'active' : '' }}" aria-controls="dashboardsExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">category</i>
                    <span class="nav-link-text ms-2 ps-1">Kategori Buku</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="/peminjaman_buku_anggota" class="nav-link text-white" aria-controls="dashboardsExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">credit_score</i>
                    <span class="nav-link-text ms-2 ps-1">Peminjaman Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pengembalian_buku_anggota" class="nav-link text-white" aria-controls="dashboardsExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">assignment_return</i>
                    <span class="nav-link-text ms-2 ps-1">Pengembalian Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/laporan_perpus_anggota" class="nav-link text-white" aria-controls="dashboardsExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">summarize</i>
                    <span class="nav-link-text ms-2 ps-1">Laporan Perpustakaan</span>
                </a>
            </li>
            <li class="nav-item">
                <hr class="horizontal light">
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">ACCOUNT</h6>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link text-white" aria-controls="dashboardsExamples"
                    role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">groups_2</i>
                    <span class="nav-link-text ms-2 ps-1">Daftar Pengunjung</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white"
                    aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">settings</i>
                    <span class="nav-link-text ms-2 ps-1">Pengatruan</span>
                </a>
                <div class="collapse" id="dashboardsExamples">
                    <ul class="nav ">
                        <li class="nav-item active">
                            <a class="nav-link text-white active" href="/setting_akun_anggota">
                                <i class="material-icons-round opacity-10">manage_accounts</i>
                                <span class="nav-link-text ms-2 ps-1">Manage Account</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item active">
                            <a class="nav-link text-white active" href="../../pages/dashboards/analytics.html">
                                <i class="material-icons-round opacity-10">settings_applications</i>
                                <span class="nav-link-text ms-2 ps-1">Kelola Data<br> Perpustakaan</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>