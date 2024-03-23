<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // In your App\Http\Controllers\Auth\RegisterController.php

    protected function redirectTo()
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            return route('home.admin');
        } elseif ($user->role == 'pembeli') {
            return route('home');
        } else {
            return route('register');
        }
    }

    protected $redirectTo = 'App\Http\Controllers\Auth\RegisterController@redirectTo';

    // public function register(Request $request)
    // {
    //     $this->validateRegister($request);

    //     if ($this->attemptRegister($request)) {
    //         return $this->sendRegisterResponse($request);
    //     }

    //     return $this->sendFailedRegisterResponse($request);
    // }

    public function registerPath()
    {
        return property_exists($this, 'registerPath') ? $this->registerPath() : '/register';
    }

    protected function sendFailedRegisterResponse(Request $request)
    {
        $request->flash();

        $nama = $request->input('nama');
        $no_telpon  = $request->input('no_telpon');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation  = $request->input('password_confirmation');

        $user = User::where('nama', $nama)->first();

        if (!$user) {
            $errors = ['nama' => 'Nama tidak boleh kosong'];
        } elseif (!password_verify($no_telpon, $user->no_telpon)) {
            $errors = ['no_telpon' => 'Nomor Handphone tidak boleh kosong.'];
        } elseif (!password_verify($email, $user->email)) {
            $errors = ['email' => 'Kata Sandi yang anda masukkan salah. Silakan coba lagi.'];
        }elseif (!password_verify($password, $user->password)) {
            $errors = ['password' => 'Kata Sandi yang anda masukkan tidak sesuai.'];
        }elseif (!password_verify($password_confirmation, $user->password_confirmation)) {
            $errors = ['password_confirmation' => 'Kata Sandi yang anda masukkan tidak sesuai.'];
        } else {
            $errors = ['email' => 'Terjadi kesalahan. Silakan coba lagi.'];
        }

        throw ValidationException::withMessages($errors)
            ->redirectTo($this->registerPath());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'no_telpon' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'no_telpon' => $data['no_telpon'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    
}
