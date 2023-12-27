<?php

namespace App\Http\Controllers;

use App\Facade\AuthClient;
use App\Models\Client;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ClientController extends Controller
{
    public function login(Request $request)
    {
        switch ($request->action) {
            case 'login':
                return Socialite::driver('facebook')->redirect();
                break;
            case 'logout':
                $this->logout();
                return redirect()->route('website');
                break;

            default:
                # code...
                break;
        }
    }
    public function getToken(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        $client = null;
        if (!Client::where('facebook_id', $user->id)->exists()) {
            $client = Client::create([
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id' => $user->id,
                'profile_link' => $user->profileUrl,
                'profile_photo_link' => $user->avatar,
                'profile_photo_default' => $user->avatar
            ]);
            $client = $client->fresh();
        } else {
            $client = Client::where('facebook_id', $user->id)->first();
        }
        AuthClient::login($client);
        return redirect()->route('website');
    }

    public function depoiment(Request $request)
    {
       $request->validateWithBag('depoiment',[
            'note' => ['required','integer', 'min:0','max:5'],
            'work' => ['required','min:3', 'max:255'],
            'content' => ['required']
        ], [], [
            'note' => 'Avaliação',
            'work' => 'emprego, trabalho, função',
            'content' => 'depoimento',
        ]);
    }

    public function logout()
    {
        AuthClient::logout();
    }
}
