<div class="header header-one">
    <a href="{{ route('home') }}"
        class="d-inline-flex d-sm-inline-flex align-items-center d-md-inline-flex d-lg-none align-items-center device-logo">
        <img src="{{ url('/') }}/assets/icons/DTDC_icon.png" class="img-fluid logo2" alt="Logo" style="width:150px; height:40px">
    </a>
    <div class="main-logo d-inline float-start d-lg-flex align-items-center d-none d-sm-none d-md-none">
        <div class="logo-white">
            <a href="{{ route('home') }}">
                <img src="{{ url('/') }}/assets/icons/DTDC_icon.png" class="img-fluid logo-blue" alt="Logo-Full" style="width:150px; height:40px">
            </a>
            <a href="{{ route('home') }}">
                <img src="{{ url('/') }}/assets/icons/dtdc_logo.png" class="img-fluid logo-small" alt="Logo-Small">
            </a>
        </div>
        <div class="logo-color">
            <a href="{{ route('home') }}">
                <img src="{{ url('/') }}/assets/icons/DTDC_icon.png" class="img-fluid logo-blue" alt="Logo-Full" style="width:150px; height:40px">
            </a>
            <a href="{{ route('home') }}">
                <img src="{{ url('/') }}/assets/icons/dtdc_logo.png" class="img-fluid logo-small" alt="Logo-small">
            </a>
        </div>
    </div>

    <a href="javascript:void(0);" id="toggle_btn">
        <span class="toggle-bars">
            <span class="bar-icons"></span>
            <span class="bar-icons"></span>
            <span class="bar-icons"></span>
            <span class="bar-icons"></span>
        </span>
    </a>

    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav nav-tabs user-menu">

        <li class="nav-item  has-arrow dropdown-heads ">
            <a href="javascript:void(0);" class="win-maximize">
                <i class="fe fe-maximize"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="user-link  nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ url('/') }}/assets/icons/dtdc_logo.png" alt="img" class="profilesidebar">
                    <span class="animate-circle"></span>
                </span>
                <span class="user-content">
                    @if (Auth::user()->user_type = '1')
                    <span class="user-details">Admin</span>
                    @elseif (Auth::user()->user_type = '2')
                    <span class="user-details">Agent</span>
                    @endif
                    <span class="user-name">{{ Auth::user()->email }}</span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilemenu">
                    <div class="subscription-menu">
                        <ul>
                            <li>
                                <a class="dropdown-item" href="{{ route('company.edit', Auth::user()->id) }}">Company Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription-logout">
                        <ul>
                            <li class="pb-0">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out" class="me-1"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>

    </ul>

</div>
