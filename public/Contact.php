<?php

$contact = App\Contact::all();

foreach ($contacts as $contact) {
    echo $contact->first_name;
}
