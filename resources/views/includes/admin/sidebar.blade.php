<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="mt-3">
        <div class="brand-logo d-flex align-items-center justify-content-between ms-4">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/LOGOFSPMI.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MENU</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('anggota-index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Data Anggota</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('iuran-index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-cash"></i>
                        </span>
                        <span class="hide-menu">Iuran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('pengaduan-index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-mail"></i>
                        </span>
                        <span class="hide-menu">Pengaduan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('pengeluaran-index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-report-money"></i>
                        </span>
                        <span class="hide-menu">Pengeluaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('laporan-index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-data"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-text"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li> --}}
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
