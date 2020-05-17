<?php

namespace App\Http\Controllers;

use App\Contact;
use App\listing;
use App\User;
use App\address;
use App\Vehicle;
use App\Vehicle_model;
use App\Year;
use App\Make;
use App\Trim;
use App\Drive;
use App\Transmission;
use App\Color;
use App\Status;
use App\Source;
use App\Appraisal;
use Illuminate\Http\Request;
use App\Http\Resources\Listing as ListingResource;

class ListingController extends Controller
{

//Show all listings -----------------------------------------------------------------------------------
    public function index(Request $request, listing $listing)
    {


        $listings = listing::paginate(15);


        return listingResource::collection($listings);

    }

//Show a specific listing by id------------------------------------------------------------------------
    public function show($id)
    {
        $listing = listing::findOrFail($id);


        return new listingResource($listing);
    }


//create new listing-----------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $listing = new Listing;
        $contact = new Contact;
        $address = new address;
        $vehicle = new vehicle;
        $year = new Year;
        $make = new Make;
        $model = new Vehicle_model;
        $trim = new Trim;
        $drive = new Drive;
        $transmission = new Transmission;
        $color = new Color;
        $status = new Status;
        $source = new Source;
        $appraisal = new Appraisal;

        $appraisal->asking_original = $request->asking_original;
        $appraisal->asking_now = $request->asking_now;
        $appraisal->date_listed = $request->date_listed;
        $appraisal->kbb_pp = $request->kbb_pp;
        $appraisal->kbb_trade = $request->kbb_trade;
        $appraisal->accu_ws = $request->accu_ws;
        $appraisal->accu_truecar = $request->accu_truecar;
        $appraisal->vauto_app = $request->vauto_app;
        $appraisal->vauto_ctm = $request->vauto_ctm;
        $appraisal->vauto_mds = $request->vauto_mds;
        $appraisal->est_recon = $request->est_recon;
        $appraisal->est_gross = $request->est_gross;
        $appraisal->notes = $request->appraisal_notes;
        $appraisal->save();

        $source->source = $request->source;
        $source->save();

        $status->status = $request->status;
        $status->save();

        $color->color = $request->color;
        $color->save();

        $transmission->transmission = $request->transmission;
        $transmission->save();

        $drive->drive = $request->drive;
        $drive->save();

        $trim->trim = $request->trim;
        $trim->save();

        $model->model = $request->model;
        $model->save();

        $make->make = $request->make;
        $make->save();

        $year->year = $request->year;
        $year->save();

        $vehicle->vin = $request->vin;
        $vehicle->odometer = $request->odometer;
        $vehicle->notes = $request->vehicle_notes;
        $vehicle->year_id = $year->id;
        $vehicle->make_id = $make->id;
        $vehicle->model_id = $model->id;
        $vehicle->trim_id = $trim->id;
        $vehicle->drive_id = $drive->id;
        $vehicle->transmission_id = $transmission->id;
        $vehicle->color_id = $color->id;
        $vehicle->appraisal_id = $appraisal->id;
        $vehicle->save();

        $address->street_1 = $request->street_1;
        $address->street_2 = $request->street_2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->save();

        $contact->address_id = $address->id;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone_1 = $request->phone_1;
        $contact->email_1 = $request->email_1;
        $contact->notes = $request->contact_notes;
        $contact->save();

        $listing->link_url = $request->link_url;
        $listing->vehicle_id = $vehicle->id;
        $listing->contact_id = $contact->id;
        $listing->notes = $request->notes;
        $listing->status_id = $status->id;
        $listing->source_id = $source->id;

        if ($listing->save()) {
            return new ListingResource($listing);

        };

    }

//UPDATE A LISTING---------------------------------------------------------------------------------

    public function update(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);


        //NO NEED TO CHECK FOR CONTACT ID, LISTING COULDN'T EXIST WITHOUT ONE

        $contact = Contact::findOrFail($listing->contact_id);

        if ($request->filled('first_name')) {
            $contact->first_name = $request->first_name;
        }
        if ($request->filled('last_name')) {
            $contact->last_name = $request->last_name;
        }
        if ($request->filled('phone_1')) {
            $contact->phone_1 = $request->phone_1;
        }
        if ($request->filled('phone_2')) {
            $vehicle->vin = $request->vin;
        }
        if ($request->filled('email_1')) {
            $contact->email_1 = $request->email_1;
        }
        if ($request->filled('email_2')) {
            $contact->email_2 = $request->email_2;
        }
        if ($request->filled('contact_notes')) {
            $contact->notes = $request->contact_notes;
        }
        $contact->save();

        //ADDRESS NEEDS THE CONTACT VARIABLE TO BE DEFINED ALREADY SO HAS TO GO UNDERNEATH IT

        $address = address::findOrFail($contact->address_id);

        if ($request->filled('street_1')) {
            $address = Address::updateorcreate(
                ['id' => $contact->address_id],
                ['street_1' => $request->street_1]
            );
            $contact->address_id = $address->id;
        }
        if ($request->filled('street_2')) {
            $address = Address::updateorcreate(
                ['id' => $contact->address_id],
                ['street_2' => $request->street_2]
            );
            $contact->address_id = $address->id;
        }
        if ($request->filled('city')) {
            $address = Address::updateorcreate(
                ['id' => $contact->address_id],
                ['city' => $request->city]
            );
            $contact->address_id = $address->id;
        }
        if ($request->filled('state')) {
            $address = Address::updateorcreate(
                ['id' => $contact->address_id],
                ['state' => $request->state]
            );
            $contact->address_id = $address->id;
        }
        if ($request->filled('zip')) {
            $address = Address::updateorcreate(
                ['id' => $contact->address_id],
                ['zip' => $request->zip]
            );
            $contact->address_id = $address->id;
        }

        $address->save();


        //I WAS THINKING OF CHECKING TO SEE IF THERE WAS A VEHICLE, BUT ALL LISTINGS MUST HAVE VEHICLE

        $vehicle = Vehicle::findOrFail($listing->vehicle_id);


        if ($request->filled('vin')) {
            $vehicle->vin = $request->vin;
        }
        if ($request->filled('odometer')) {
            $vehicle->odometer = $request->odometer;
        }
        if ($request->filled('vehicle_notes')) {
            $vehicle->notes = $request->vehicle_notes;
        }


        //THESE ALL NEED UPDATEORCREATE BECAUSE THEY ARE INDIVIDUAL TABLES THAT MIGHT NOT BE FILLED

        if ($request->filled('year')) {
            $year = Year::updateorcreate(
                ['id' => $vehicle->year_id],
                ['year' => $request->year]
            );
            $vehicle->year_id = $year->id;
        }
        if ($request->filled('make')) {
            $make = Make::updateorcreate(
                ['id' => $vehicle->make_id],
                ['make' => $request->make]
            );
            $vehicle->make_id = $make->id;
        }
        if ($request->filled('model')) {
            $model = Vehicle_model::updateorcreate(
                ['id' => $vehicle->model_id],
                ['model' => $request->model]
            );
            $vehicle->model_id = $model->id;
        }
        if ($request->filled('trim')) {
            $trim = Trim::updateorcreate(
                ['id' => $vehicle->trim_id],
                ['trim' => $request->trim]
            );
            $vehicle->trim_id = $trim->id;
        }
        if ($request->filled('drive')) {
            $drive = Drive::updateorcreate(
                ['id' => $vehicle->drive_id],
                ['drive' => $request->drive]
            );
            $vehicle->drive_id = $drive->id;
        }
        if ($request->filled('transmission')) {
            $transmission = Transmission::updateorcreate(
                ['id' => $vehicle->transmission_id],
                ['transmission' => $request->transmission]
            );
            $vehicle->transmission_id = $transmission->id;
        }
        if ($request->filled('color')) {
            $color = Color::updateorcreate(
                ['id' => $vehicle->color_id],
                ['color' => $request->color]
            );
            $vehicle->color_id = $color->id;
        }

        $vehicle->save();


        //APPRAISAL SECTION -----------------------------------------------------------

        $appraisal = Appraisal::findOrFail($vehicle->appraisal_id);

        if ($request->filled('asking_original')) {
            $appraisal->asking_original = $request->input('asking_original');
        }

        //$appraisal->user_id = $request->appraised_by;


        if ($request->filled('asking_original')) {
            $appraisal->asking_now = $request->asking_now;
        }
        if ($request->filled('asking_original')) {
            $appraisal->date_listed = $request->date_listed;
        }
        if ($request->filled('asking_original')) {
            $appraisal->kbb_pp = $request->kbb_pp;
        }
        if ($request->filled('asking_original')) {
            $appraisal->kbb_trade = $request->kbb_trade;
        }
        if ($request->filled('asking_original')) {
            $appraisal->accu_ws = $request->accu_ws;
        }
        if ($request->filled('asking_original')) {
            $appraisal->accu_truecar = $request->accu_truecar;
        }
        if ($request->filled('asking_original')) {
            $appraisal->vauto_app = $request->vauto_app;
        }
        if ($request->filled('asking_original')) {
            $appraisal->vauto_sell = $request->vauto_sell;
        }
        if ($request->filled('asking_original')) {
            $appraisal->vauto_ctm = $request->vauto_ctm;
        }
        if ($request->filled('asking_original')) {
            $appraisal->vauto_ptm = $request->vauto_ptm;
        }
        if ($request->filled('asking_original')) {
            $appraisal->vauto_mds = $request->vauto_mds;
        }
        if ($request->filled('asking_original')) {
            $appraisal->est_recon = $request->est_recon;
        }
        if ($request->filled('asking_original')) {
            $appraisal->est_gross = $request->est_gross;
        }
        if ($request->filled('asking_original')) {
            $appraisal->notes = $request->appraisal_notes;
        }

        $appraisal->save();


        new Contact;
        new address;
        new Listing;


        // LISTING STUFF TO UPDATE--------------------------------------------------

        if ($request->filled('link_url')) {
            $listing->link_url = $request->link_url;
        }
        if ($request->filled('notes')) {
            $listing->notes = $request->notes;
        }
        if ($request->filled('status')) {
            $status = Status::updateorcreate(
                ['id' => $listing->status_id],
                ['status' => $request->status]
            );
            $listing->status_id = $status->id;
        }
        if ($request->filled('source')) {
            $source = Source::updateorcreate(
                ['id' => $listing->source_id],
                ['source' => $request->source]
            );
            $listing->source_id = $source->id;
        }

        if ($listing->save()) {
            return new ListingResource($listing);

        };
    }


    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        if ($listing->delete())
            return new ListingResource($listing);
    }

    public function filter(Request $request, listing $listing, Contact $contact, Vehicle $vehicle)
    {

        $listing = $listing->newQuery();
        $contact = $contact->newQuery();
        $vehicle = $vehicle->newQuery();

        if ($request->has('link')) {
            $listing = $listing->where('link', $request->input('link'));
        }
        if ($request->has('phone_1')) {
            $contacts = $contact->where('phone_1', $request->input('phone_1'))->pluck('id');
            $listing = $listing->wherein('contact_id', $contacts);
            //$listings->get();
        }
        if ($request->has('vin')) {
            $vehicles = $vehicle->where('vin', $request->input('vin'))->pluck('id');
            $listing = $listing->wherein('vehicle_id', $vehicles);
            //$listings->get();
        }

        return $listing->get();


    }

    public function search(Request $request, listing $listing, Contact $contact, Vehicle $vehicle) {


       /* $contact = $contact->newQuery();
        $vehicle = $vehicle->newQuery();
        $listing = $listing->newQuery();*/


        if ($request->has('link_url')) {
            $ids_from_link = $listing->where('link_url', $request->input('link_url'))->pluck('id');
            $ids_from_linkarray = array($ids_from_link);
        }
        else $ids_from_link = [];

        if ($request->has('vin')) {
            $vin = $vehicle->where('vin', $request->input('vin'))->pluck('id');
            $ids_from_vin = $listing->Wherein('vehicle_id', $vin)->pluck('id');
            $ids_from_vinarray = array($ids_from_vin);
        }
        else $ids_from_vin = [];

        if ($request->has('phone_1')) {
            $phone_1 = $contact->where('phone_1', $request->input('phone_1'))->pluck('id');
            $ids_from_phone = $listing->Wherein('contact_id', $phone_1)->pluck('id');
            $ids_from_phonearray = array($ids_from_phone);
        }
        else $ids_from_phone = [];

        $listings = listing::find($ids_from_vin);
        $listings2 = listing::find($ids_from_link);
        $listings3 = listing::find($ids_from_phone);

        $merged = $listings->toBase()->merge($listings2);
        $merged2 = $merged->toBase()->merge($listings3);

        $unique_data = $merged2->unique()->values()->all();

        return listingResource::collection($unique_data);


    }
}

/*public function filter(Request $request, listing $listing, Contact $contact, Vehicle $vehicle)
{

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


}*/
//this works but once you apply filters it takes the other ones out, maybe thats why it's in filter...
/*listing = $listing->newQuery();
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

return $listing->get();*/



















/*$source->source = $request->source;
        $source->save();

        $status->status = $request->status;
        $status->save();

        $color->color = $request->color;
        $color->save();

        $transmission->transmission = $request->transmission;
        $transmission->save();*/

//$drive->drive = $request->drive;
//$drive->save();

//$trim->trim = $request->trim;
//$trim->save();

//$model->model = $request->model;
//$model->save();

//$make->make = $request->make;
//$make->save();

//$year->year = $request->year;
//$year->save();*/


/*$appraisal = Appraisal::findOrFail($vehicle->appraisal_id);
       new Appraisal;*/
//new vehicle;
/*$status = Status::findOrFail($listing->status_id);
new Status;
$source = Source::findOrFail($listing->source_id);
new Source;*/

//$listing->link_url = $request->link_url;
/*$listing->vehicle_id = $vehicle->id;
$listing->contact_id = $contact->id;*/
//$listing->notes = $request->notes;
/*$listing->status_id = $status->id;
$listing->source_id = $source->id;*/


//$vehicle->notes = $request->vehicle_notes;
//$vehicle->year_id = $year->id;
/*$vehicle->make_id = $make->id;
$vehicle->model_id = $model->id;
$vehicle->trim_id = $trim->id;
$vehicle->drive_id = $drive->id;*/
//$vehicle->transmission_id = $transmission->id;
/*$vehicle->color_id = $color->id;
$vehicle->appraisal_id = $appraisal->id;*/


/*$contact = Contact::findOrFail($listing->contact_id);
        $address = address::findOrFail($contact->address_id);
        $vehicle = vehicle::findOrFail($listing->vehicle_id);
        $appraisal = Appraisal::findOrFail($vehicle->appraisal_id);
        $source = Source::findOrFail($listing->source_id);
        $status = Status::findOrFail($listing->status_id);
        $year = Year::findorFail($vehicle->year_id);
        $make = Make::findOrFail($vehicle->make_id);
        $model = Vehicle_model::findOrFail($vehicle->model_id);
        $trim = Trim::findOrFail($vehicle->trim_id);
        $drive = Drive::findOrFail($vehicle->drive_id);
        $transmission = Transmission::findOrFail($vehicle->transmission_id);
        $color = Color::findOrFail($vehicle->color_id);
        $listing->first_name = $contact->first_name;
        $listing->last_name = $contact->last_name;
        $listing->phone_1 = $contact->phone_1;
        $listing->email_1 = $contact->email_1;
        $listing->street_1 = $address->street_1;
        $listing->street_2 = $address->street_2;
        $listing->city = $address->city;
        $listing->state = $address->state;
        $listing->zip = $address->zip;
        $listing->contact_notes = $contact->notes;
        $listing->vehicle_year = $year->year;
        $listing->vehicle_make = $make->make;
        $listing->vehicle_model = $model->model;
        $listing->vehicle_trim = $trim->trim;
        $listing->vehicle_drive = $drive->drive;
        $listing->vehicle_transmission = $transmission->transmission;
        $listing->vehicle_color = $color->color;
        $listing->vehicle_odometer = $vehicle->odometer;
        $listing->vehicle_vin = $vehicle->vin;
        $listing->vehicle_notes = $vehicle->notes;
        $listing->appraisal_id = $vehicle->appraisal_id;
        $listing->asking_original = $appraisal->asking_original;
        $listing->asking_now = $appraisal->asking_now;
        $listing->date_listed = $appraisal->date_listed;
        $listing->kbb_pp = $appraisal->kbb_pp;
        $listing->kbb_trade = $appraisal->kbb_trade;
        $listing->accu_ws = $appraisal->accu_ws;
        $listing->accu_truecar = $appraisal->accu_truecar;
        $listing->vauto_app = $appraisal->vauto_app;
        $listing->vauto_sell = $appraisal->vauto_sell;
        $listing->vauto_ctm = $appraisal->vauto_ctm;
        $listing->vauto_ptm = $appraisal->vauto_ptm;
        $listing->vauto_mds = $appraisal->vauto_mds;
        $listing->est_recon = $appraisal->est_recon;
        $listing->est_gross = $appraisal->est_gross;
        $listing->appraisal_notes = $appraisal->notes;
        $listing->source_name = $source->source;
        $listing->status_name = $status->status;
*/
