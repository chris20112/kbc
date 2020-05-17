<?php

namespace App\Http\Controllers;

use App\sms;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sms = new sms;

        $sms->MessageSid = $request->MessageSid;
        $sms->From = $request->From;
        $sms->To = $request->To;
        $sms->Body = $request->Body;
        $sms->NumMedia = $request->NumMedia;
        $sms->MediaUrl = $request->MediaUrl;
        $sms->save();

        //require_once '../../../vendor/autoload.php';
        $from = $request->From;
        $body = $request->Body;
        $sid    = "AC2bf730ccf504ed4234e3ab3ad35fad25";
        $token  = "f40d75f5791d9fbd72d7dbfb3042d322";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("+17032293764", // to
                [
                    "body" => "$from said '$body'",
                    "from" => "+15714103765",
                    "statusCallback" => "http://4cb060cf.ngrok.io/api/fromTwilio"
                ]
            );
        print($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(sms $sms)
    {
        //
    }
}
