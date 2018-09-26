<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class dispararEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $nome;
    public $mensagem;
    public function __construct($email, $nome, $tipo)
    {
        $this->email = $email;
        $this->nome = $nome;
        $this->mensagem = $tipo;
    }

    public function build()
    {
        try{
            $nome = ['nome' => $this->nome, 'mensagem' => $this->mensagem];
            $envio = Mail::send('emails.corpodoemail', $nome, function($message){

                $message->to($this->email);
                $message->subject($this->mensagem.' '.$this->nome);
                $message->from('smtp@kbrtec.com.br');
            });
            $erros = Mail::failures();
            return $erros;
        }
        catch(\GuzzleHttp\Exception\ClientException $ex) {}
        
    }
}
