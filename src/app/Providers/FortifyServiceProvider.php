<?php

namespace App\Providers;
use Laravel\Fortify\Contracts\LogoutResponse;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Validation\ValidationException;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
        $this->app->singleton(UpdatesUserProfileInformation::class, UpdateUserProfileInformation::class);
        $this->app->singleton(UpdatesUserPasswords::class, UpdateUserPassword::class);
        $this->app->singleton(ResetsUserPasswords::class, ResetUserPassword::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Fortify::registerView(fn () => view('register'));
    Fortify::loginView(fn () => view('login'));

    RateLimiter::for('login', function (Request $request) {
        return Limit::perMinute(5)->by(
            Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip())
        );
    });

    Fortify::authenticateUsing(function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return $user;
        }

        throw ValidationException::withMessages([
            'password' => trans('auth.failed'),
        ]);
    });

    $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
        public function toResponse($request) {
            return redirect('/login')->with('result', 'ログアウトしました');
        }
    });

    $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
        public function toResponse($request) {
            return redirect('/admin')->with('result', '会員登録が完了しました');
        }
    });

    $this->app->instance(LoginResponse::class, new class implements LoginResponse {
        public function toResponse($request) {
            return redirect('/admin')->with('result', 'ログインしました');
        }
    });
}
}