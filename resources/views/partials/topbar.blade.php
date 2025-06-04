<div class="topbar">
    <div class="topbar-content">
        <a href="{{ route('dashboard') }}" class="logo">
            <i class="fas fa-leaf"></i>
            <span>BeeswaxApp</span>
        </a>
        
        <nav class="topbar-nav">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="fas fa-leaf"></i> Products
            </a>
            <a href="{{ route('orders.index') }}" class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i> Cart
            </a>
        </nav>

        <div class="user-menu">
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
                <div class="user-avatar">
                    {{ substr(Auth::user()->name ?? 'G', 0, 1) }}
                </div>
                <i class="fas fa-chevron-down" style="font-size: 0.8rem; margin-left: 0.5rem;"></i>
            </div>

            <div class="user-dropdown">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-question-circle"></i>
                    <span>Help</span>
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="dropdown-item" style="width: 100%; border: none; background: none; text-align: left;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>