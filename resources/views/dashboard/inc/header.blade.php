<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{-- <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" /> --}}
                    <!-- Light Logo icon -->
                    {{-- <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> --}}
                </b>
                <!--End Logo icon -->
                <span>
                 <!-- dark Logo text -->
                 {{-- <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" /> --}}
                 <!-- Light Logo text -->    
                 {{-- <img src="{{ asset('assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage" /> --}}
                </span> 
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown akun">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('berkas/'.Auth::user()->cama_foto) }}" alt="user" class="profile-pic" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="{{ asset('berkas/'.Auth::user()->cama_foto) }}" width="70px" alt="user" class="profile-pic" />
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->cama_nama }}</h4>
                                        <p class="text-muted">{{ Auth::user()->cama_email }}</p>{{-- <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">Edit Biodata</a> --}}
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider">
                            <li>
                                <a href="/password/ganti"><i class="ti-key"></i> Ganti Password</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>