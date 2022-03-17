<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use function dd;
use function encrypt;
use function redirect;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function logout()
    {
        Auth()->logout();
        return redirect()->url('/');
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $isUser = User::where('fb_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return response()->json(['data' => 'usuario logado']);
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                $data = Auth::login($createUser);
                return response()->json($data);
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
