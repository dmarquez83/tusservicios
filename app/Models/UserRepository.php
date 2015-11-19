<?php namespace App\Models;

use Response;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Model as Model;
use App\Http\Controllers\Controller;


class UserRepository  extends Controller{

      public function findByUserNameOrCreate($userData,$provider) {

           $user = User::where('provider_id', '=', $userData->id)->first();
           if(!$user) {
           /*  $user = User::create([
             'provider_id' => $userData->id,
             'name' => $userData->name,
             'username' => $userData->nickname,
             'email' => $userData->email,
             ]);*/

             $user = User::create([
               'provider' => '',
               'provider_id' => '',
               'name' => '',
               'username' => '',
               'email' => '',
               'id_tipo_usuario' => '',
             ]);

            }

            $this->checkIfUserNeedsUpdating($userData, $user, $provider);
            return $user;
      }

      public function checkIfUserNeedsUpdating($userData, $user, $provider) {

            $socialData = [
              'email' => $userData->email,
              'name' => $userData->name,
              'username' => $userData->nickname,
              'provider_id' => $userData->id,
              'provider' => $provider,
              'id_tipo_usuario' => '2',
            ];

            $dbData = [
              'email' => $user->email,
              'name' => $user->name,
              'username' => $user->username,
              'provider_id' => $userData->id,
              'provider' => $provider,
              'id_tipo_usuario' => '2',
            ];

            if (!empty(array_diff($socialData, $dbData))) {
              $user->email = $userData->email;
              $user->name = $userData->name;
              $user->username = $userData->nickname;
              $user->provider_id = $userData->id;
              $user->provider = $provider;
              $user->id_tipo_usuario = '2';
              $user->save();
            }
      }
}