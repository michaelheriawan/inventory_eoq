<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                {{-- <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a> --}}
                <!-- Sidenav Menu Heading (Core)-->
                <div style="padding-top: 1.7rem;"></div>
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Home
                </a>
                <div class="sidenav-menu-heading" style="padding-top: .5rem;">Data Master</div>
                <!-- Sidenav Data Master (Dashboard)-->

                {{-- <a class="nav-link {{ Request::is('barang*') ? 'active' : '' }}" href="{{ route('barang.index') }}">
                    <div class="nav-link-icon"><i data-feather="package"></i></div>
                    Barang
                </a> --}}
                <a class="nav-link {{ Request::is('barang*') && !Request::is('barang-masuk*') && !Request::is('barang-keluar*') ? 'active' : '' }} collapsed"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false"
                    aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i data-feather="layers"></i></div>
                    Barang
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('barang') ? 'active' : '' }}"
                            href="{{ route('barang.index') }}">Daftar Barang</a>
                        <a class="nav-link {{ Request::is('barang/create') ? 'active' : '' }}"
                            href="{{ route('barang.create') }}">Tambah Barang</a>
                        <a class="nav-link {{ Request::is('kategori') ? 'active' : '' }}"
                            href="{{ route('kategori.index') }}">Atur Kategori</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Users
                </a>

                <a class="nav-link {{ Request::is('supplier*') ? 'active' : '' }}"
                    href="{{ route('supplier.index') }}">
                    <div class="nav-link-icon"><i data-feather="truck"></i></div>
                    Supplier
                </a>
                <a class="nav-link {{ Request::is('eoq-barang*') ? 'active' : '' }}"
                    href="{{ route('eoq-barang.index') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    EOQ
                </a>

                <!-- Sidenav Heading (Custom)-->
                <div class="sidenav-menu-heading">Inventory</div>
                <!-- Sidenav Accordion (Pages)-->
                <a class="nav-link {{ Request::is('barang-masuk*') ? 'active' : '' }}"
                    href="{{ route('barang-masuk.index') }}">
                    <div class="nav-link-icon"><i data-feather="arrow-up-circle"></i></div>
                    Barang Masuk
                </a>
                <a class="nav-link {{ Request::is('barang-keluar*') ? 'active' : '' }}"
                    href="{{ route('barang-keluar.index') }}">
                    <div class="nav-link-icon"><i data-feather="arrow-down-circle"></i></div>
                    Barang Keluar
                </a>
                <a class="nav-link {{ Request::is('stock-opname*') ? 'active' : '' }}"
                    href="{{ route('stock-opname.index') }}">
                    <div class="nav-link-icon"><i data-feather="package"></i></div>
                    Stock Opname
                </a>
                <a class="nav-link collapsed {{ Request::is('laporan*') ? 'active' : '' }}" href="javascript:void(0);"
                    data-bs-toggle="collapse" data-bs-target="#collapseFlows2" aria-expanded="false"
                    aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Laporan
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFlows2" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('laporan_barang_masuk.index') }}">Barang Masuk</a>
                        <a class="nav-link" href="{{ route('laporan_barang_keluar.index') }}">Barang Keluar</a>
                        <a class="nav-link" href="{{ route('barang-keluar.index') }}">EOQ Barang</a>
                    </nav>
                </div>


            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">Michael</div>
            </div>
        </div>
    </nav>
</div>
