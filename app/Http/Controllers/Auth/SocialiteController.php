<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $authUser = $this->checkLogin($user);

        Auth::login($authUser);

        return redirect()->route('posts.index');
    }

    public function checkLogin($data)
    {
        {
            $user = User::where('provider_id', $data->id)->first() ? User::where('provider_id', $data->id)->first() : User::where('email', $data->email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'provider_id' => $data->token,
                ]);
            }
            return $user;
        }
    }



    
}






