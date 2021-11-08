<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SocialModel;
use App\User;

class SocialController extends Controller
{
    //
    public function redirect($social)
    {
        switch ($social) {
            case 'facebook':
                return Socialite::driver($social)->redirect();
                break;
            case 'google':
                return Socialite::driver($social)->redirect();
                break;
        }
    }
    
    public function handle($provider)
    {
        $typeprovider = Socialite::driver($provider)->user();
        $account = SocialModel::where('provider', $provider)->where('provider_user_id', $typeprovider->getId())->first();
        if ($account) {
            $account_name = User::where('id', $account->user)->first();
            $login = [
                'username' => $account_name->username,
                'password' => $account->provider_pass
            ];
            if (Auth::attempt($login)) { //['username'=>$account_name->username, 'password'=>$account->provider_pass]
                // dd($account);
                return redirect('/');
            }
        } else {
            //create user
            Socialcontroller::HandleCreate($provider);
            //login
            $account = SocialModel::where('provider', $provider)->where('provider_user_id', $typeprovider->getId())->first();
            $account_name = User::where('id', $account->user)->first();
            $login = [
                'username' => $account_name->username,
                'password' => $account->provider_pass
            ];
            if (Auth::attempt($login)) {
                return redirect('/');
            }
        }
    }

    public static function HandleCreate($provider)
    {
        $typeprovider = Socialite::driver($provider)->user();
        $randomPassword = random_int(10000000, 999999999) . '<>';
        $data = new SocialModel([
            'provider_user_id' => $typeprovider->getId(),
            'provider' => $provider,
            'provider_pass' => $randomPassword
        ]);
        $user = User::where('email', $typeprovider->getEmail())->first();
        if (!$user) {
            $user = User::create([
                'username' => $typeprovider->getName(),
                'email' => $typeprovider->getEmail(),
                'password' => Hash::make($randomPassword),
            ]);
        }
        $data->login()->associate($user);
        $data->save();
    }
}
