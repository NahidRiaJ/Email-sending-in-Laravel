<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomEmail;
class MailController extends Controller
{
    //
    function sendEmail(Request $request){
        $to=$request->to;
        $msg=$request->msg;
        $subject=$request->subject;
        Mail::to($to)->send(new welcomEmail($msg,$subject) );
        return "Email Sent";
    }
   
}
