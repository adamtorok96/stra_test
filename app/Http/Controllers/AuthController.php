<?php


namespace App\Http\Controllers;


use AdamTorok96\GoogleReCaptcha\GoogleReCaptcha;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(LoginRequest $request)
    {
        /**
         * @var $user User|null
         */
        $user = User::whereUsername($request->username)->first();

        $loginAttempt = $request->session()->get('login_attempt', 1);

        if( $loginAttempt > 3 ) {
            /**
             * @var $captcha GoogleReCaptcha
             */
            $captcha = app(GoogleReCaptcha::class);

            if( !$captcha->isValidRequest($request) ) {
                $request->session()->flash('error', 'Hibás vagy hiányzó captcha!');

                return redirect()->route('auth.index');
            }
        }

        if( isset($user) ) {
            if( Hash::check($request->password, $user->password) ) {
                Auth::login($user);

                $user->update([
                    'last_login' => Carbon::now()
                ]);

                $request->session()->put('login_attempt', 1);

                return redirect()->route('home.index');
            }
        }

        $request->session()->put('login_attempt', $loginAttempt + 1);

        $request->session()->flash('error', 'Hibás felhasználónév és/vagy jelszó!');

        return redirect()->route('auth.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}