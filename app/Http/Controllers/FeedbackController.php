<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Subscriber;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        
        if (!Subscriber::where('phone',$request->phone)->exists()){
            $subscriber = new Subscriber();
            $subscriber->phone = $request->phone;
            $subscriber->save();
        }

        return response()->json(['success' => true], 200);
    }

    public function feedback(Request $request)
    {        
        $name = $request->get('name');
        $phone = $request->get('phone');
        $url = $request->get('url');

        $to = "innapronina211@gmail.com";
        $subject = "Заявка с сайта visa-time.testkz.ru";
        $sendfrom   = "no-reply@visa-time.testkz.ru";
        $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

        $message = "
        $subject<br>
        <b>Имя:</b> $name <br>
        <b>Телефон:</b> $phone <br>
        <b>URL:</b> $url";

        $send = mail($to, $subject, $message, $headers);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        
        if ($send)
        { 
            $feedback = new Feedback();
            $feedback->name = $request->name;
            $feedback->phone = $request->phone;
            $feedback->save();
        }

        return response()->json(['success' => true], 200);
    }
}
