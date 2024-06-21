<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['admin.dashboard']) }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            <li class="menu-header">Starter</li>
            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li> --}}
            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                        Page</span></a></li> --}}
            <li class="dropdown {{ setSidebarActive(['admin.hero']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Section</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setSidebarActive(['admin.hero']) }}"><a class="nav-link"
                            href="{{ route('admin.hero') }}">Hero</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setSidebarActive(['admin.category.index', 'admin.category.create', 'admin.category.edit', 'admin.location.index', 'admin.location.create', 'admin.location.edit']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-th"></i>
                    <span>Listing</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ setSidebarActive(['admin.category.index', 'admin.category.create', 'admin.category.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Categories</a>
                    </li>

                    <li
                        class="{{ setSidebarActive(['admin.location.index', 'admin.location.create', 'admin.location.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.location.index') }}">Locations</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
