<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar justify-content-center">
        <div class="pt-4 pb-3">
            {{-- <center>
                <img class="img-fluid" src="{{ asset('adminkit.png') }}" alt="Responsive image" width="100"
                    height="100">
            </center> --}}
            <h3 class="text-white text-center"> <b>Lembongan Ocean Adventure</b> </h3>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            {{-- <li class="sidebar-item {{ isActive('dashboard') }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ isActive('package') }}">
                <a class="sidebar-link" href="{{ route('package.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Paket Tour</span>
                </a>
            </li>
            <li class="sidebar-item {{ isActive('banner') }}">
                <a class="sidebar-link" href="{{ route('banner.index') }}">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Banner</span>
                </a>
            </li>
            <li class="sidebar-item {{ isActive('profile') }}">
                <a class="sidebar-link" href="{{ route('profile.edit') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profil</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
