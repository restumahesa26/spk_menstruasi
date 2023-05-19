<!-- Toggler -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<!-- Brand -->
<a class="navbar-brand pt-0" href="./index.html">
<img src="{{ url('backend/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
</a>
<!-- User -->
<ul class="nav align-items-center d-md-none">
<li class="nav-item dropdown">
    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ url('backend/assets/img/theme/team-1-800x800.jpg') }}">
            </span>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
        <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Selamat Datang!</h6>
        </div>
        <a href="{{ route('profile.edit') }}" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>My profile</span>
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fa fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </form>
    </div>
</li>
</ul>
