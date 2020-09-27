<?php
$current_route=\Request::route()->getName();
?>
<div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                <div class="brand-logo" style="background: url({{asset(config('dashboard-setup.logo'))}}) no-repeat;"></div>
                <h2 class="brand-text mb-0">{{config('dashboard-setup.dashboard_name')[app()->getLocale()]}}</h2>
            </a></li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
    </ul>
</div>

<div class="shadow-bottom"></div>
<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="active nav-item"><a href="#" ><i class="feather icon-home"></i><span class="menu-title" >Dashboard</span></a>
        </li>
    </ul>
</div>