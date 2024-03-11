<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath() : '/login';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->flash();

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $errors = ['email' => 'Email yang anda masukkan belum terdaftar. Silakan daftar terlebih dahulu.'];
        } elseif (!password_verify($password, $user->password)) {
            $errors = ['password' => 'Kata Sandi yang anda masukkan salah. Silakan coba lagi.'];
        } else {
            $errors = ['email' => 'Terjadi kesalahan. Silakan coba lagi.'];
        }

        throw ValidationException::withMessages($errors)
            ->redirectTo($this->loginPath());
    }


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('home.admin');
        } elseif ($user->role == 'pembeli') {
            return redirect()->route('home.pembeli');
        } else {
            return redirect()->route('welcome');
        }
    }
}
