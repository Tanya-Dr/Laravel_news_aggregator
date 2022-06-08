<?php

namespace App\Services;

use App\Services\Contract\Social;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use App\Models\User;

class SocialService implements Social
{
    public function loginOrRegisterViaSocialNetwork(SocialUser $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        if($user) {
            $user->name = !empty($socialUser->getName()) ? $socialUser->getName() : (!empty($socialUser->getNickname()) ? $socialUser->getNickname() : 'No name');
            $user->avatar = $socialUser->getAvatar();

            if($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account.index');
            }
        } else {
            $user = User::create([
                'name' => !empty($socialUser->getName()) ? $socialUser->getName() : (!empty($socialUser->getNickname()) ? $socialUser->getNickname() : 'No name'),
                'email' => $socialUser->getEmail(),
                'password' => '',
                'avatar' => !empty($socialUser->getAvatar()) ? $socialUser->getAvatar() : '',
            ]);
            if($user) {
                Auth::login($user);
                return route('account.index');
            }

            return route('register');
        }

        throw new ModelNotFoundException('Model Not Found');
    }
}
