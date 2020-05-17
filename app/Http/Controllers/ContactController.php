<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contact;
use App\Http\Resources\Contact as ContactResource;


class ContactController extends Controller
{


    //noting passed in to the index function, it just returns all in the Contact Model
    public function index()
    {
        //get customers
        $contacts = Contact::all();

        //return the collection of contacts as a resource
        return ContactResource::collection($contacts);
    }



    //Request is passed in from the http request, it contains the info to save to the database
    public function store(Request $request)
    {
        $contact = new Contact;


        $contact->created_by = $request->input('created_by');
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->phone_1 = $request->input('phone_1');
        $contact->phone_2 = $request->input('phone_2');
        $contact->email_1 = $request->input('email_1');
        $contact->email_2 = $request->input('email_2');
        $contact->address_id = $request->input('address_id');

        if($contact->save()){
            return new ContactResource($contact);
        }


    }

    //Request and id are passed in, since it needs to know which record(id) to update with the info passed from request
    public function update(Request $request, $id){

        $contact = Contact::findOrFail($id);
        new Contact;

        //if statements are so that an unfilled cell doesn't overwrite data

        if ($request->filled('updated_by')) {
            $contact->updated_by = $request->input('updated_by');
        }
        if ($request->filled('first_name')) {
            $contact->first_name = $request->input('first_name');
        }
        if ($request->filled('last_name')) {
            $contact->last_name = $request->input('last_name');
        }
        if ($request->filled('phone_1')) {
            $contact->phone_1 = $request->input('phone_1');
        }
        if ($request->filled('phone_2')) {
            $contact->phone_2 = $request->input('phone_2');
        }
        if ($request->filled('email_1')) {
            $contact->email_1 = $request->input('email_1');
        }
        if ($request->filled('email_2')) {
            $contact->email_2 = $request->input('email_2');
        }
        if ($request->filled('address_id')) {
            $contact->address_id = $request->input('address_id');
        }

        if($contact->update()){
            return new ContactResource($contact);

        }
    }


    //id is passed in since it needs to know which record to show
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return new ContactResource($contact);
    }


    //id is passed in since it needs to know which record to delete
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        if($contact->delete())
        return new ContactResource($contact);
    }
}
