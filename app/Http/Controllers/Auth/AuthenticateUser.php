<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
#use App\Http\Requests;
use App\Http\Controllers\Controller;


use Validator;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Models\UserRepository;



class AuthenticateUser extends Controller
{

    private $socialite;
    private $auth;
    private $users;

    public function __construct(Socialite $socialite, Guard $auth, UserRepository $users) {
        $this->socialite = $socialite;
        $this->users = $users;
        $this->auth = $auth;
    }
    public function execute($request, $listener, $provider) {
        if (!$request) return $this->getAuthorizationFirst($provider);
      //  dd($this->getSocialUser($provider)); die();
        $user = $this->users->findByUserNameOrCreate($this->getSocialUser($provider),$provider);
        $this->auth->login($user, true);

         return $listener->userHasLoggedIn($user);
        //return redirect('/');
    }

    private function getAuthorizationFirst($provider) {
        return $this->socialite->driver($provider)->redirect();

    }

    private function getSocialUser($provider) {
        return $this->socialite->driver($provider)->user();
    }

}
