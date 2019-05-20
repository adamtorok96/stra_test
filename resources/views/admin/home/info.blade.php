<h1>Adminisztráció</h1>

<h2>Bejelentkezve, mint: {{ $user->username }}</h2>

<h3>Szerepkörök</h3>
<ul>
    @foreach($user->roles as $role)
        <li>
            <b>{{ $role->name }}</b>
            <ul>
                @foreach($role->permissions as $permission)
                    <li>
                        {{ $permission->name }}
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

Utolsó bejelentkezés ideje: {{ $user->last_login->format('Y. m. d. H:i') }}
