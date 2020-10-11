<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu"></i>
                                </a>
                            </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav float-right">

                    {{--<!-- Begin: Main Menu- change language-->--}}
                        <li class="dropdown dropdown-language nav-item">
                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@if ( app()->getLocale()== 'ar')<i class="flag-icon flag-icon-ps"></i>@else <i class="flag-icon flag-icon-us"></i> @endif<span class="selected-language"> {{ Config::get('dashboard_ui.languages')[App::getLocale()] }}</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                @foreach (Config::get('dashboard_ui.languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="#" data-language="ar">@if ( $lang== 'ar')<i class="flag-icon flag-icon-ps"></i>@else <i class="flag-icon flag-icon-us"></i> @endif{{$language}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    <!-- End: Main Menu- change language-->
                    <!-- Begin: Main Menu- user zoom screen-->
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                    <!-- End: Main Menu- user zoom screen-->
                    <!-- Begin: Main Menu- user profile-->
                <li class="dropdown dropdown-user nav-item">
                    <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:;" data-toggle="dropdown">
                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{user()->name}}</span></div>
                        <span><img class="round" src="{{asset('admin-layout/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"></span>
                    </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item" href="#">
                        <i class="feather icon-user"></i>Profile</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="feather icon-power"></i> Logout </a>

                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                </li>
                    <!-- End: Main Menu- user profile-->
                </ul>
            </div>
        </div>
    </div>
</nav>