
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                <div class="sidebar-brand-icon ">
                    <img src="/logo.png" alt="" width="50px">
                </div>
                <div class="sidebar-brand-text mx-3">E-Trash Clinic</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{$NAV == "HOME" ? "active" : ""}}">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan Sampah & Produk
            </div>

            <li class="nav-item {{$NAV == "SAMPAH" ? "active" : ""}}">
                <a class="nav-link" href="{{route('sampah')}}">
                    <i class="fas fa-fw  fa-trash"></i>
                    <span>Sampah</span></a>
            </li>

            <li class="nav-item {{$NAV == "PRODUKHASIL" ? "active" : ""}}">
                <a class="nav-link" href="{{route('produkhasil')}}">
                    <i class="fas fa-fw  fa-trash"></i>
                    <span>Produk Hasil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Konten & Media
            </div>

            <li class="nav-item {{$NAV == "INFORMASI" ? "active" : ""}}">
                <a class="nav-link" href="{{route('informasi')}}">
                    <i class="fas fa-fw  fa-newspaper"></i>
                    <span>Informasi</span></a>
            </li>

            <li class="nav-item {{$NAV == "ARTIKEL" ? "active" : ""}}">
                <a class="nav-link"href="{{route('artikel')}}">
                    <i class="fas fa-fw fa fa-file-word"></i>
                    <span>Artikel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                QRCode
            </div>

            <li class="nav-item {{$NAV == "QRCODE" ? "active" : ""}}">
                <a class="nav-link" href="{{route('qrcode')}}">
                    <i class="fas fa-fw  fa-qrcode"></i>
                    <span>QRCode</span></a>
            </li>
            <li class="nav-item {{$NAV == "LOGQRCODE" ? "active" : ""}}">
                <a class="nav-link" href="{{route('qrlog')}}">
                    <i class="fas fa-fw  fa-qrcode"></i>
                    <span>Log QRCode</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Users
            </div>

            <li class="nav-item {{$NAV == "PENGGUNA" ? "active" : ""}}">
                <a class="nav-link" href="{{route('pengguna')}}">
                    <i class="fas fa-fw  fa-qrcode"></i>
                    <span>Pengguna</span></a>
            </li> 

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="fas fa-fw  fa-qrcode"></i>
                    <span>Logout</span></a>
            </li> 
        </ul>
        <!-- End of Sidebar -->
