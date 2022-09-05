<!-- add dashboard -->
 <li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="fa fa-th-large"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('meterDatas.index') }}"
       class="nav-link {{ Request::is('admin/meterDatas*') ? 'active' : '' }}">
        <i class="fa fa-th-large"></i>
        <p>Meter Datas</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('meterDatas.grid') }}"
       class="nav-link {{ Request::is('admin/meterdatas/grid') ? 'active' : '' }}">
      <i class="fa fa-table"></i>
        <p>Meter Datas Grid</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('settings.index') }}"
       class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}">
        <i class="fa fa-cog"></i>
        <p>Settings</p>
    </a>
</li>


