<aside class="main-sidebar sidebar-dark-white elevation-3" style="background: rgb(15,32,124);
background: radial-gradient(circle, rgb(0 26 169 / 94%) 92%, rgba(9,21,85,1) 100%, rgb(77 70 252 / 91%) 100%); color:white;">
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light" style="color:white;font-weight:bold;">Galler</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
