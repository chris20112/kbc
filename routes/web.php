<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/app', 'AppController@index')->name('app');

Route::get('contacts', 'ContactController@index');

Route::get('vehicles', 'VehicleController@index');


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


Route::any('search', function(Request $request, listing $listing, Contact $contact, Vehicle $vehicle) {


    $contact = $contact->newQuery();
    $vehicle = $vehicle->newQuery();
    $listing = $listing->newQuery();


    if ($request->has('link')) {
        $listing->where('link', $request->input('link'));
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

});


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
