<div class="card">
    <div class="card-body">
        <h5 class="card-title">Menü</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home.index') }}">Központi adminisztráció</a>
            </li>

            @can('show content editor')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.contentEditor.index') }}">Tartalomszerkesztők</a>
            </li>
            @endcan

            @can('show logged in users')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.loggedInUsers.index') }}">Bejelentkezett felhasználók</a>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}">Kijelentkezés</a>
            </li>
        </ul>
    </div>
</div>
