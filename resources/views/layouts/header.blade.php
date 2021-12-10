


<header id="page-topbar">

    <div class="navbar-header">
        @if(Auth::guard('member')->check())
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box" style="background-color: #556ee6;">
                    <a href="{{url('member/home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="30">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="35">
                                </span>
                    </a>

                    <a href="{{url('member/home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="30">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="35">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-3.jpg')}}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::guard('member')->user()->name }} ({{ Auth::guard('member')->user()->designation_id }})</span>
                    </button>
                </div>

            </div>

        @elseif(Auth::guard('admin')->check())
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{url('admin/home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="30">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="35">
                                </span>
                    </a>

                    <a href="{{url('admin/home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="30">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/images/invezza-logo-white.png')}}" alt="" height="35">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" >
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-3.jpg')}}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::guard('admin')->user()->name }}</span>

                    </button>
                </div>

            </div>

        @endif
    </div>
</header>

  

 

    







