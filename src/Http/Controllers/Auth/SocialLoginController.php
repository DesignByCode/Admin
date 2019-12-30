<?php

namespace DesignByCode\Admin\Http\Controllers\Auth;

use Socialite;
use Illuminate\Http\Request;
use DesignByCode\Admin\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['social', 'guest']);
    }

    
    public function redirect($service, Request $request) 
    {
        return Socialite::driver($service)->redirect();
    }    

    public function callback($service, Request $request) 
    {
        $serviceUser = Socialite::driver($service)->user();

        $user = $this->getExistingUser($serviceUser, $service);

        if(!$user) {
            $user = User::create([
                'name' => $serviceUser->getName(),
                'email' => $serviceUser->getEmail(),
                'password' => bcrypt($this->randomPassword())
            ]);
        }

        if($this->needsToCreateSocial($user, $service)) {
            $user->social()->create([
                'social_id' => $serviceUser->getId(),
                'service' => $service
            ]);
        }

        Auth::login($user);

        return redirect()->intended();

    }



    protected function needsToCreateSocial(User $user, $service) 
    {
        return !$user->hasSocialLinked($service);
    }

    protected function getExistingUser($serviceUser, $service)
    {
        return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function($q) use ($serviceUser, $service) {
            $q->where('social_id', $serviceUser->getId())->where('service', $service);
        })->first();
    }

    protected function randomPassword($num = 10) 
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

        $pass = array(); //remember to declare $pass as an array

        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

        for ($i = 0; $i < $num; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
