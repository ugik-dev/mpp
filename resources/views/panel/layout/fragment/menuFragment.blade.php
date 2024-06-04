<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <img src="{{ asset('assets/image/kab-bangka.png') }}" style="width: 30%" />
        <div class="sidebar-brand-text mx-3">MPP</div>
    </a>

    <hr class="sidebar-divider my-0">


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}" target="_blank">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Landing Page</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('panel.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Addons
    </div>

    @if (Auth::user()->role_id == 1)
        @include('panel.layout.datamenu.super')
    @elseif (Auth::user()->role_id == 7)
        @include('panel.layout.datamenu.admin')
    @endif
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and
            more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
