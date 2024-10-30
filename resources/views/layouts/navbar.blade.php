<!-- Navbar -->
<nav class="main-header">
    <div class="navbar-left">
        <button class="sidebar-toggle"><i class='bx bx-menu'></i></button>
        <input type="text" placeholder="Search...">
    </div>
    <div class="navbar-right">
        <a href="#" class="nav-link"><i class='bx bxs-bell'></i></a>
        <a href="#" class="nav-link user-menu">
            <i class='bx bxs-user-circle'></i>
            <span class="user-name">{{ Auth::user()->name }}</span>
        </a>
        <div class="user-dropdown">
            <div class="user-dropdown-header">
                <i class='bx bxs-user-circle'></i>
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <span class="user-email">{{ Auth::user()->email }}</span>
                </div>
            </div>
            <hr>
            <a href="{{ route('profile.edit') }}">
                <i class='bx bxs-user'></i> My Profile
            </a>
            <hr>
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i> Logout
                </a>
            </form>
        </div>
    </div>
</nav>

<style>
    .navbar-right {
        display: flex;
        align-items: center;
    }

    .user-menu {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .user-name {
        font-size: 14px;
        display: none;
    }

    @media (min-width: 768px) {
        .user-name {
            display: inline;
        }
    }

    .user-dropdown {
        min-width: 200px;
        padding: 8px 0;
    }

    .user-dropdown-header {
        display: flex;
        align-items: center;
        padding: 8px 15px;
        gap: 10px;
    }

    .user-dropdown-header i {
        font-size: 32px;
        color: #ffd700;
    }

    .user-info {
        display: flex;
        flex-direction: column;
    }

    .user-info .user-name {
        font-weight: 500;
        display: block;
    }

    .user-info .user-email {
        font-size: 12px;
        color: #666;
    }

    .user-dropdown hr {
        margin: 8px 0;
    }

    .user-dropdown a {
        padding: 8px 15px;
    }

    .user-dropdown form {
        margin: 0;
    }

    .user-dropdown form a {
        color: #dc3545;
    }

    .user-dropdown form a:hover {
        background-color: #fff1f1;
    }
</style>