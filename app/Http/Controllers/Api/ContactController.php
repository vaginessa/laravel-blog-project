<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Validator;
use Mail;


class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $user = null;
        $this->authenticate($user);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->messages()], 400);
        }

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message
        );
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to('info@techalin.com');
            $message->subject("New Message @ YourBlog App");
            $message->replyTo($data['email']);
        });
        return response()->json(['message' => 'The message was successfully sent.'], 200);
    }

    private function authenticate(&$user)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['message' => 'Request unauthorized.'], 401);
        }
    }
}
