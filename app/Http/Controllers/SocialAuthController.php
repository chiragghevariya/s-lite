<?php

namespace App\Http\Controllers;

use App\SocialAccountService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {

        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/home');
    }
}
