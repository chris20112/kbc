<?php

namespace App\Http\Controllers;

use App\twilioResponse;
use Illuminate\Http\Request;

class TwilioResponseController extends Controller
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
       $twilio = new twilioResponse;

       $twilio->SmsSid = $request->SmsSid;
       $twilio->SmsStatus = $request->body;
       $twilio->MessageStatus = $request->MessageStatus;
       $twilio->MessageFrom = $request->From;
       $twilio->MessageTo = $request->To;
       $twilio->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\twilioResponse  $twilioResponse
     * @return \Illuminate\Http\Response
     */
    public function show(twilioResponse $twilioResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\twilioResponse  $twilioResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(twilioResponse $twilioResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\twilioResponse  $twilioResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, twilioResponse $twilioResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\twilioResponse  $twilioResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(twilioResponse $twilioResponse)
    {
        //
    }
}
