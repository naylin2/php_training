<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function html_email()
    {
        $data = array('name' => "Nay Nay");
        Mail::send('mail', $data, function ($message) {
            $message->to('test@gmail.com')
                ->subject('Testing Mail');
        });
        echo "HTML Email Sent. Check your inbox.";
    }

    public function mailPhone($id)
    {
        $where = array('id' => $id);
        $phone = Phone::where($where)->first();

        $data = [
            'name' => $phone->name,
            'detail' => $phone->detail,
        ];
        Mail::send('phones\mail', $data, function ($message) {
            $message->to('test@gmail.com')
                ->subject('Phone Info');
        });
        return back()
            ->with('success', 'Email Sent.');
    }
    public function create()
    {

        return view('email');
    }

    public function sendEmail(Request $request)
    {

        $data = [
            'subject' => $request->subject,
            'email' => $request->email,
            'content' => $request->content,
        ];

        Mail::send('email-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}
