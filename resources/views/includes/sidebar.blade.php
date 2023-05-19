<!-- Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ url('backend/assets/img/brand/blue.png') }}">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse"
                    data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                    aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item @if(Route::is('dashboard')) active @endif">
            <a class="nav-link @if(Route::is('dashboard')) active @endif " href="{{ route('dashboard') }}">
                <i class="fa fa-desktop text-primary"></i> Dashboard
            </a>
        </li>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Diagnosa</h6>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item @if(Route::is('diagnosa.index')) active @endif">
            <a class="nav-link @if(Route::is('diagnosa.index')) active @endif" href="{{ route('diagnosa.index') }}">
                <i class="fa fa-stethoscope text-primary"></i> Isi Diagnosa
            </a>
        </li>
        <li class="nav-item @if(Route::is('riwayat-*')) active @endif">
            <a class="nav-link @if(Route::is('riwayat-*')) active @endif" href="{{ route('riwayat-diagnosa.index') }}">
                <i class="fa fa-user-md text-primary"></i> Riwayat Diagnosa
            </a>
        </li>
    </ul>
    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'dokter')
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Data Master</h6>
    <!-- Navigation -->
    <ul class="navbar-nav">
        @if (Auth::user()->role == 'admin')
        <li class="nav-item @if(Route::is('gejala.*')) active @endif">
            <a class="nav-link @if(Route::is('gejala.*')) active @endif" href="{{ route('gejala.index') }}">
                <i class="fa fa-th text-primary"></i> Gejala
            </a>
        </li>
        <li class="nav-item @if(Route::is('penyakit.*')) active @endif">
            <a class="nav-link @if(Route::is('penyakit.*')) active @endif" href="{{ route('penyakit.index') }}">
                <i class="fa fa-map text-primary"></i> Penyakit
            </a>
        </li>
        @endif
        @if (Auth::user()->role == 'dokter')
        <li class="nav-item @if(Route::is('rule-*')) active @endif">
            <a class="nav-link @if(Route::is('rule-*')) active @endif" href="{{ route('rule-penyakit.index') }}">
                <i class="fa fa-sitemap text-primary"></i> Rule Penyakit
            </a>
        </li>
        @endif
    </ul>
    @endif
    @if (Auth::user()->role == 'admin')
        <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Data Pengguna</h6>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item @if(Route::is('data-pengguna.*')) active @endif">
            <a class="nav-link @if(Route::is('data-pengguna.*')) active @endif" href="{{ route('data-pengguna.index') }}">
                <i class="fa fa-users text-primary"></i> Pengguna
            </a>
        </li>
        <li class="nav-item @if(Route::is('data-dokter.*')) active @endif">
            <a class="nav-link @if(Route::is('data-dokter.*')) active @endif" href="{{ route('data-dokter.index') }}">
                <i class="fa fa-user-shield text-primary"></i> Dokter
            </a>
        </li>
        <li class="nav-item @if(Route::is('data-admin.*')) active @endif">
            <a class="nav-link @if(Route::is('data-admin.*')) active @endif" href="{{ route('data-admin.index') }}">
                <i class="fa fa-user-secret text-primary"></i> Admin
            </a>
        </li>
    </ul>
    @endif
</div>
