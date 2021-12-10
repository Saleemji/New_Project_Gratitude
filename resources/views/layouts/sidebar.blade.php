
<div class="vertical-menu">
    <div data-simplebar="init" class="h-100">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer">

                </div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <div id="sidebar-menu">
                                <!-- Left Menu Start -->
                                @php
                                    $id = Auth::id();
                                    $route_name = Request::route()->getName();
                                    $route_path = Request::path();
                                @endphp
                                <ul class="metismenu list-unstyled" id="side-menu">


                                    <li class="menu-title" key="t-menu">Menu</li>

                                    <li class="{{ ($route_path =='admin/home' ? 'mm-active' : '') }}">
                                        <a href="{{url('admin/home')}}" class="waves-effect">
                                            <i class="bx bxs-home"></i>
                                             <span>Home</span>
                                        </a>
                                    </li>

                                    <li {{ ($route_path =='admin/question' ? 'mm-active' : '') }}>
                                        <a href="{{url('admin/question')}}" class="waves-effect">
                                            <i class="bx bxs-user"></i>
                                             <span>Question</span>
                                        </a>
                                    </li>

                           

                                    <li >
                                        <a href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                                            <i class="bx bx-power-off"></i>
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>


                                </ul>
                            </div>
                            <!-- Sidebar -->
                        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 1465px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 42px; transform: translate3d(0px, 190px, 0px); display: block;"></div></div></div>
</div>
