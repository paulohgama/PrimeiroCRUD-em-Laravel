<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send(Request $request){
        Mail::send('emails.send', ['title' => 'Olá, Seja bem vindo', 'content' => 'Este é um email automatico, não responda'], function ($message)
        {

            $message->from('santosps1990@gmail.com', 'Paulo Henrique');

            $message->to($request->email);

        });        
    }
}
