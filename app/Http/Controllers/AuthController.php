<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        if (backpack_auth()->check()) {
            return redirect()->to('admin/dashboard');
        }
        if (Auth::check()) {
            return redirect()->to('/');
        }
        return view('login');
    }

    public function redirect()
    {
        return Socialite::driver('google')->scopes(['https://www.googleapis.com/auth/drive'])->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('login')->with('message', $e->getMessage());
        }

        $user = User::where('email', $googleUser->email)->first();
        if (is_null($user) || $user->role === User::ROLE_MEMBER) {
            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'avatar' => $googleUser->avatar,
                'role' => User::ROLE_MEMBER,
            ]);
            Auth::login($user);
            return redirect()->intended('/')->withCookie(cookie('token', $googleUser->token, 60));
        }
        $user->name = $googleUser->name;
        $user->avatar = $googleUser->avatar;
        $user->save();
        backpack_auth()->login($user);
        return redirect()->intended('admin/dashboard')->withCookie(cookie('token', $googleUser->token, 60));
    }

    public function destroy()
    {
        if (backpack_auth()->check()) {
            backpack_auth()->logout();
        }
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('login')->with('message', 'Berhasil logout.')->withCookie(cookie('token', '', 60));
    }
}
