<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class ContactController extends Controller
{

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:100',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10',
        ));

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message
        );
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to('a.afmeti@techalin.com');
            $message->subject("New Message @ InTirana.com");
            $message->replyTo($data['email']);
        });

        Session::flash('success', 'The message was successfully sent.');

        return redirect()->route('contact');
    }
}