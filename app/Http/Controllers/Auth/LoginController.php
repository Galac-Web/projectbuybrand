<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    private $aliases = [
        'vk' => 'vkontakte',
    ];

    private $driver;

    public function __construct()
    {
        $this->redirectTo = URL::previous();
        $this->middleware('guest')->except('logout');
    }

    private function setDriver($driver) {
        return $this->driver = array_key_exists($driver, $this->aliases)
            ? $this->aliases[$driver]
            : $driver;
    }
    
    public function redirectToProvider(string $driver)
    {
        $this->setDriver($driver);

        if (!config("services.{$this->driver}")) {
            return redirect()->route('login')->with(['error' => trans('auth.socialite.failed-driver')]);
        }

        return Socialite::driver($this->driver)->redirect();
    }

    public function handleProviderCallback(string $driver, Social $socialite)
    {
        $this->setDriver($driver);

        $social = Socialite::driver($this->driver)->user();

        $socialite = $socialite->where([
            'email' => $social->email,
            'driver' => $driver
        ]);

        if ($socialite->exists()) {
            $user = User::find($socialite->first()->user_id);
        } else {
            $user = User::firstOrCreate(
                ['email' => $social->email],
                ['password'  => bcrypt(Str::random(24))]
            );
            $user->socialite()->create([
                'email'     => $social->email,
                'social_id' => $social->getId() ?? null,
                'driver'    => $driver,
            ]);
        }
        
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
