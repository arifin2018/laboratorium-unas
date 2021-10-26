<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UNAS <sup>1949</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/dashboard-caraosel*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard-caraosel.index') }}">
            <i class="fab fa-slideshare"></i>
            <span>Dashboard-Caraosel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Ruangan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/detail-ruangan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('detail-ruangan.index') }}">
            <i class="fas fa-house-user"></i>
            <span>Detail Ruangan</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/images-detail-ruangan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('images-detail-ruangan.index') }}">
            <i class="fas fa-images"></i>
            <span>Images Detail Ruangan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Berita
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/berita*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('berita.index') }}"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Detail Berita</span>
        </a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ request()->is('admin/images-berita*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('images-berita.index') }}">
            <i class="fas fa-images"></i>
            <span>Images Berita</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/category*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-tag"></i>
            <span>Category</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{ request()->is('admin/visi-misi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('visi-misi.index') }}">
            <i class="fas fa-images"></i>
            <span>Visi Misi</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('admin/prodi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('prodi.index') }}">
            <i class="fas fa-tag"></i>
            <span>Prodi</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('admin/jurusan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jurusan.index') }}">
            <i class="fas fa-tag"></i>
            <span>Jurusan</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ request()->is('admin/transaksi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaksi.index') }}">
            <i class="fas fa-file-import"></i>
            <span>Transaksi User</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/transaksi-detail*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaksi-detail.index') }}">
            <i class="fas fa-share-square"></i>
            <span>Transaksi Detail</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
