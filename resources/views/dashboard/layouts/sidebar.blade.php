<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="home"></span>
                     Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/users" class="nav-link {{ Request::is('users*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="users"></span>
                     Users
                </a>
            </li>
            <li class="nav-item">
                <a href="/products" class="nav-link {{ Request::is('products*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="archive"></span>
                     Products
                </a>
            </li><li class="nav-item">
                <a href="/outlets" class="nav-link {{ Request::is('outlets*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="briefcase"></span>
                     Outlets
                </a>
            </li>
            <li class="nav-item">
                <a href="/disc_h" class="nav-link {{ Request::is('disc_h*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="percent"></span>
                     Diskon H
                </a>
            </li><li class="nav-item">
                <a href="/disc_D" class="nav-link {{ Request::is('disc_D*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="percent"></span>
                     Diskon D
                </a>
            </li>
            <li class="nav-item">
                <a href="/order_h" class="nav-link {{ Request::is('order_h*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="shopping-cart"></span>
                     Order H
                </a>
            </li><li class="nav-item">
                <a href="/order_d" class="nav-link {{ Request::is('order_d*') ? 'active' : '' }}" aria-current="page">
                    <span data-feather="shopping-cart"></span>
                     Order D
                </a>
            </li>
        </ul>
    </div>
</nav>