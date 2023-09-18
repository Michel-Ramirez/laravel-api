<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function message(Request $request)
    {
        //dati dalla request provenienti dal form
        $data = $request->all();

        //validazione classe facedes

        $validator = Validator::make($data, [
            'name' => 'nullable',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ], [
            'email.required' => 'La main è obbligatoria',
            'email.email' => 'email non valida',
            'subject.required' => 'il messaggio deve contenere un oggetto',
            'message' => 'Il messaggio deve avere un contenuto'
        ]);

        //funzione fails che ci dice se è fallita o meno la validazione, la risposta è un booleano
        // Se ci sono errori gli mando indietro con un oggetto

        if ($validator->fails()) {
            //primo parametro del json array di errori che trasformo in un oggetto
            //secondo parametro risponde bad request 400
            return response()->json(['errors' => $validator->errors()], 400);
        }

        //ISTANZIO LA CLASSE
        $mail = new ContactMessageMail(
            sender: $data['email'],
            subject: $data['subject'],
            content: $data['message'],
        );

        //UTILIZZO LA FACEDES PER INVIARE LA MAIL
        Mail::to(env('MAIL_TO_ADDRESS'))->send($mail);
        return response(null, 204);
    }
}
