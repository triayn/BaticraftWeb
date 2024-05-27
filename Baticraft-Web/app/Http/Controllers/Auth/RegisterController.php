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

    public function registerPath()
    {
        return property_exists($this, 'registerPath') ? $this->registerPath() : '/register';
    }

    protected function sendFailedRegisterResponse(Request $request)
    {
        $errors = $this->validator($request->all())->errors()->getMessages();

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
            'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'no_telpon' => ['required', 'string', 'max:15', 'min:11', 'regex:/^\+?[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'regex:/^[\w\.-]+@gmail\.com$/'],
            'password' => ['required', 'string', 'min:6', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/', 'confirmed'],
        ], [
            'nama.required'             => 'Kolom nama wajib diisi.',
            'nama.max'                  => 'Panjang nama maksimal 255 karakter.',
            'nama.regex'                => 'Nama hanya boleh berisi huruf.',
            'no_telpon.required'        => 'Kolom nomor telepon wajib diisi.',
            'no_telpon.max'             => 'Panjang nomor telepon maksimal 15 karakter.',
            'no_telpon.min'             => 'Panjang nomor telepon minimal 11 karakter.',
            'no_telpon.regex'           => 'Nomor hanya boleh berisi angka dan karakter "+".',
            'email.required'            => 'Kolom email wajib diisi.',
            'email.email'               => 'Format email tidak valid.',
            'email.unique'              => 'Email sudah digunakan.',
            'email.regex'               => 'Email harus valid dan menggunakan domain .gmail.com.',
            'password.required'         => 'Kolom password wajib diisi.',
            'password.min'              => 'Panjang password minimal 6 karakter.',
            'password.regex'            => 'Password harus minimal 6 karakter dan mengandung huruf serta angka.',
            'password.confirmed'        => 'Konfirmasi kata sandi tidak sesuai.',
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
