<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbarDashboard">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/assets/images/Logo.png') }}" alt="Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"> Home </a>
                <a class="nav-link {{ request()->is('Laboratorium*') ? 'active' : '' }}" href="{{ route('Laboratorium') }}">Laboratorium</a>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('visi-misi') || request()->is('status') || request()->is('berita') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu mb-3" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="{{ route('visimisi') }}">Visi Misi</a>
                        <a class="nav-link" href="{{ route('semua-berita') }}">Berita</a>
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="{{ route('transaksi-status') }}">Status</a>
                    </div>
                </li>
                @auth
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Logout</button>
                    </form>
                @endauth
                @guest
                    <a class="btn btn-success" href="{{ url('/login') }}">Sign in</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
