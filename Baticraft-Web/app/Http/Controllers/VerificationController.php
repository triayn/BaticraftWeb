<?php

namespace App\Http\Controllers;

use App\Models\UserOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function showOTPForm()
    {
        return view('auth.otp');
    }

    public function verifyOTP(Request $request)
    {
        $otp = $request->otp;
        $user = Auth::user();

        // Cari OTP yang sesuai dengan pengguna yang sedang memverifikasi
        $userOTP = UserOTP::where('user_id', $user->id)
            ->where('otp_code', $otp)
            ->where('expired_at', '>=', now())
            ->first();

        if ($userOTP) {
            // OTP cocok, lakukan sesuatu, seperti masuk ke dalam sistem
            // Misalnya, tandai OTP sebagai diverifikasi
            $userOTP->verified = true;
            $userOTP->save();

            // Redirect ke halaman selanjutnya
            return redirect('/home');
        } else {    
            // OTP tidak cocok atau sudah kadaluarsa, kembalikan ke halaman OTP dengan pesan kesalahan
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

}