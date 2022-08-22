<?php

namespace App\Http\Controllers\Subscription;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\MailRequest;
use App\Models\Subscription\Mail;

class MailController extends Controller
{
    public function subscribe(MailRequest $request)
    {
        Mail::create([
            'email' => $request->email,
            'user_id' => auth()->id(),
        ]);

        return Response::message(trans('Subscribed successfully'), $request->ajax());
    }
}
