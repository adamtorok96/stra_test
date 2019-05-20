@extends('layouts.base')

@if(session()->get('login_attempt', 1) > 3)
    @inject('captcha', 'AdamTorok96\GoogleReCaptcha\GoogleReCaptcha')
    @push('scripts')
        @recaptchaJs()
    @endpush
@endif

@section('content')
    <form method="post" action="{{ route('auth.login') }}">
        @csrf

        <div class="form-group">
            <label for="username">Felhasználónév:</label>
            <input type="text" name="username" id="username" required placeholder="Felhasználónév" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Jelszó:</label>
            <input type="password" name="password" id="password" required placeholder="Jelszó" class="form-control">
        </div>

        @if(session()->get('login_attempt', 1) > 3)
            @recaptchaDom()
        @endif

        <button type="submit" class="btn btn-block btn-primary">Bejelentkezés</button>
    </form>

    @if( session()->has('error') )
    <div class="alert alert-danger mt-3" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif
@endsection