<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class ContactController extends Controller
{

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:100',
            'email' => 'required',
            'message' => 'required',
        ));
        $name = strip_tags(htmlspecialchars($request->name));
        $email = strip_tags(htmlspecialchars($request->email));
        $message = strip_tags(htmlspecialchars($request->message));

        // Create the email and send the message
        $to = 'a.afmeti@bluehat.al';
        $email_subject = "Website Contact From:  $name";
        $email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: a.afmeti@bluehat.al\n";
        $headers .= "Reply-To: $email";
        mail($to, $email_subject, $email_body, $headers);
        Session::flash('success', 'The message was successfully sent.');

        return redirect()->route('contact');
    }
}