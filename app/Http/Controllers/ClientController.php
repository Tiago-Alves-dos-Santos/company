<?php

namespace App\Http\Controllers;

use App\Facade\AuthClient;
use App\Facade\ServiceFactory;
use App\Models\Client;
use App\Models\Contact;
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
        $request->validateWithBag('depoiment', [
            'rating' => ['required', 'integer', 'min:0', 'max:5'],
            'work' => ['required', 'min:3', 'max:255'],
            'feedback' => ['required']
        ], [], [
            'rating' => 'Avaliação',
            'work' => 'emprego, trabalho, função',
            'feedback' => 'depoimento',
        ]);
        $feedback = ServiceFactory::createFeedback();
        $client = AuthClient::user();
        $client->work = $request->work;
        $data = [
            ...$request->except(['_token', 'work']),
            'client_id' => AuthClient::user()->id
        ];
        $client->save();
        $feedback->create($data);
        return redirect()->back()->with('flash', 'Depoimento enviado com sucesso. Agora está em fase de análise. ');
    }

    public function sendContact(Request $request)
    {
        $request->validateWithBag('contact', [
            'name' => ['required','min:5', 'max:255'],
            'email' => ['required', 'email'],
            'cellphone' => ['required','min:16','max:17'],
            'subject' => ['required','min:3','max:100'],
            'content' => ['required']
        ], [], []);
        Contact::create($request->except('_token'));
        return redirect()->back()->with('flash', 'Contato enviado com sucesso. Aguarde nosso retorno em até 2 dias.');

    }

    public function logout()
    {
        AuthClient::logout();
    }
    /*=============================ADMIN CONTROL================================*/
    public function viewFeedbacks()
    {
        return view('admin.feedback');
    }
}
