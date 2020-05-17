<?php

use App\Contact;
use App\listing;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//users routes

Route::prefix('/user')->group( function() {
    Route::post('/login', 'api\v1\LoginController@login');
    Route::middleware('auth:api')->get('/all', 'api\v1\user\UserController@index');
    Route::middleware('auth:api')->get('/current', 'api\v1\user\UserController@currentUser');
});

Route::prefix('/listings')->group( function() {
    Route::get('listings', 'ListingController@index');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//CONTACTS CRUD-----------------------------------------------

//Show all contacts

Route::get('contacts', 'ContactController@index');



//Show single contact by id

Route::get('contacts/{id}', 'ContactController@show');

//Create a new contact

Route::post('contacts', 'ContactController@store');

//Update contact

Route::put('contacts/{id}', 'ContactController@update');

//Delete Contact

Route::delete('contacts/{id}', 'ContactController@destroy');


//LISTINGS CRUD---------------------------------------------------



//Show all listings

Route::get('listings', 'ListingController@index');


//Show listing by id

Route::get('listing/{id}', 'ListingController@show');

//Create a new listing

Route::post('listings', 'ListingController@store');

//Update listing

Route::put('listings/{id}', 'ListingController@update');

//Delete Contact

Route::delete('listing/{id}', 'ListingController@destroy');

//Route::post('listings/search', 'ListingController@filter');

//Route::get('listings/search', "listingController@getbykeys");


//GET ALL YEARS FOR DROP DOWNS-----------------------------------------------------------------------------

Route::get('years', 'YearController@index');

//GET MAKE BASED ON YEAR INPUT-------------------------------------------------------------------------------

Route::get('makes', 'MakeController@show');

//SEARCH BY LINK OR VIN OR PHONE-----------------------------------------------------------------------------

Route::get('search', 'listingController@search');

//GET TWILIO MESSAGE FROM FORM AND SEND IT TO TWILIO--------------------------------------------------------

Route::post('sendText', function(Request $request) {

    require_once '../vendor/autoload.php';



// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
    $sendto = $request->sendTo;
    $body = $request->message;
    $sid    = "AC2bf730ccf504ed4234e3ab3ad35fad25";
    $token  = "f40d75f5791d9fbd72d7dbfb3042d322";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create("+1$sendto", // to
            [
                "body" => "$body",
                "from" => "+15714103765",
                "statusCallback" => "http://4cb060cf.ngrok.io/api/fromTwilio"
            ]
        );

    print($message);

});

//MAKE A CALL

use Twilio\TwiML\VoiceResponse;
Route::post('makeCall', function (Request $request){


    $sid    = "AC2bf730ccf504ed4234e3ab3ad35fad25";
    $token  = "f40d75f5791d9fbd72d7dbfb3042d322";
    $twilio = new Client($sid, $token);

    $call = $twilio->calls
        ->create("+17032293764", // to
            "+1$request->numberFrom",// from
            $options = ([
            "twiml" => "<Response><Dial>$request->numberToCall</Dial></Response>"
            ]
        ));


    print($call->sid);

});

//HOW TO HANDLE THE RESPONSE BACK FROM TWILIO ABOUT STATUS OF THE MESSAGE BEING DELIVERED

Route::post('fromTwilio', 'TwilioResponseController@store');

Route::get('fromTwilio', 'TwilioResponseController@store');

//HOW TO HANDLE AN INCOMING TEXT MESSAGE -------------------------------------------------------------

Route::post('sms', 'SmsController@store');

    /*Route::any('search', function(Request $request, listing $listing, Contact $contact, Vehicle $vehicle) {


        $contact = $contact->newQuery();
        $vehicle = $vehicle->newQuery();
        $listing = $listing->newQuery();


        if ($request->has('link_url')) {
            $listing->where('link_url', $request->input('link_url'));
        }
        if ($request->has('vin')) {
            $vin = $vehicle->where('vin', $request->input('vin'))->pluck('id');
            $listing->orWherein('id', $vin);
        }
        if ($request->has('phone_1')) {
            $phone_1 = $contact->where('phone_1', $request->input('phone_1'))->pluck('id');
            $listing->orWherein('id', $phone_1);
        }

        return $listing->get();

    });*/




// this works pretty well, but the output is crappy, can't seem to put it through a resource, don't know why
/*Route::any('search', function(Request $request, listing $listing, Contact $contact, Vehicle $vehicle) {


    $contact = $contact->newQuery();
    $vehicle = $vehicle->newQuery();
    $listing = $listing->newQuery();


    if ($request->has('link_url')) {
        $listing->where('link_url', $request->input('link_url'));
    }
    if ($request->has('vin')) {
        $vin = $vehicle->where('vin', $request->input('vin'))->pluck('id');
        $listing->orWherein('id', $vin);
    }
    if ($request->has('phone_1')) {
        $phone_1 = $contact->where('phone_1', $request->input('phone_1'))->pluck('id');
        $listing->orWherein('id', $phone_1);
    }

    return $listing->get();

});*/

    /*Route::any('search', function(Request $request, listing $listing, Contact $contact, Vehicle $vehicle){

        $listing = $listing->newQuery();
        $contact = $contact->newQuery();
        $vehicle = $vehicle->newQuery();

        if ($request->has('link')) {
            $listing->where('link', $request->input('link'));
        }
        if ($request->has('phone_1')) {
            $contacts = $contact->where('phone_1', $request->input('phone_1'))->pluck('id');
            $listings = $listing->wherein('contact_id', $contacts);
            $listings->get();
        }
        if ($request->has('vin')) {
            $vehicles = $vehicle->where('vin', $request->input('vin'))->pluck('id');
            $listings = $listing->wherein('vehicle_id', $vehicles);
            $listings->get();
        }

        return $listing->get();
    });*/


//VEHICLES CRUD-----------------------------------------------------

    Route::get('vehicle/{id}', 'VehicleController@show');

    Route::get('vehicles', 'VehicleController@index');


//SEARCH ROUTES - WILL GO TO SearchController

    //Route::post('search', 'Search@index');

