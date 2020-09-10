<?php


namespace App\Http\Controllers;

use App\Mail\contactme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('emails.contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        Mail::to(\request('email'))
            ->send(new contactme());

//        Mail::raw('Es funktioniert!', function ($message){
//            $message->to(\request('email'))
//                ->subject('Hallo');
//        });

        return redirect('/contact')
            ->with('message', 'E-Mail gesendet!');
    }
}
