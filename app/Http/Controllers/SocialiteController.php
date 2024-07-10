<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $oauthUser = Socialite::driver('google')->user();
        $email = $oauthUser->email ?? null;

        if ($email) {
            $user = User::where('email', $email)->first();

            if ($user) {
                Auth::login($user);
                // Redirect sesuai peran pengguna setelah login
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.home');
                }
            } else {
                // Email belum terdaftar, lakukan redirect atau tampilkan pesan kesalahan
                return redirect()->route('login')->withErrors(['email' => 'Email not registered']);
            }
        } else {
            // Tangani kasus ketika email tidak ditemukan dalam respon OAuth
            return redirect()->route('login')->withErrors(['email' => 'Unable to retrieve email from Google.']);
        }
    }

}
