<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact');
    }
    public function sendContact(Request $request)
    {
        $request->validateWithBag('contact', [
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email'],
            'cellphone' => ['required', 'min:16', 'max:17'],
            'subject' => ['required', 'min:3', 'max:100'],
            'content' => ['required']
        ], [], []);
        Contact::create($request->except('_token'));
        return redirect()->back()->with('flash', 'Contato enviado com sucesso. Aguarde nosso retorno em até 2 dias.');
    }
}
