const companies= [
    {name: "Company One", category: "Finance", start: 1981, end: 2004},
    {name: "Company Two", category: "Retail", start: 1992, end: 2008},
    {name: "Company Three", category: "Auto", start: 1999, end: 2007},
    {name: "Company Four", category: "Retail", start: 1989, end: 2010},
    {name: "Company Five", category: "Technology", start: 2009, end: 2014},
    {name: "Company Six", category: "Finance", start: 1987, end: 2010},
    {name: "Company Seven", category: "Auto", start: 1986, end: 1996},
    {name: "Company Eight", category: "Technology", start: 2011, end: 2016},
    {name: "Company Nine", category: "Retail", start: 1981, end: 1989}
];

const ages = [33, 12, 20, 16, 5, 54, 21, 44, 61, 13, 15, 45, 25, 64, 32];

// foreach



// filter







  const listings =  [ { "id": 66, "source": { "source_id": 11, "source": "craigslist" }, "link_url": "www.cars.com", "status": { "status_id": 13, "status": "Contacted" }, "listing_notes": "here are some notes", "contact": { "first_name": "James", "last_name": "Morris", "phone_1": "7032293764", "phone_2": null, "email_1": "james@koons.com", "email_2": null }, "address": { "address_id": 24, "street_1": "555 Ashburn Drive", "street_2": "907", "city": "Vienna", "state": "VA", "zip": "22182" }, "vehicle": { "vehicle_id": 22, "vin": "444888444888444", "odometer": "24999", "notes": "Nice car, but smells like smoke", "year": { "value": 20, "text": "1019" }, "make": { "value": 20, "text": "Jeep" }, "model": { "model_id": 18, "model": "Grand Cherokee" }, "trim": { "trim_id": 17, "trim": "Summit" }, "drive": { "drive_id": 24, "drive": "4x4" }, "transmission": { "transmission_id": 21, "transmission": "Auto" }, "color": { "color_id": 14, "color": "Black" }, "appraisal": { "appraisal_id": 7, "appraised_by": null, "asking_original": "35000.00", "asking_now": "34000.00", "date_listed": "4/20/2020", "kbb_pp": "33000.00", "kbb_trade": "31000.00", "accu_ws": "32000.00", "accu_truecar": "30000.00", "vauto_app": "35000.00", "vauto_sell": "37000.00", "vauto_ctm": 85, "vauto_ptm": 95, "vauto_mds": 25, "est_recon": "1000.00", "est_gross": "2000.00", "notes": "nice car, should go fast", "created_at": "2020-04-29T21:19:51.000000Z", "updated_at": "2020-05-01T23:45:29.000000Z" } } },

    { "id": 67, "source": { "source_id": 12, "source": "craigslist" }, "link_url": "www.cars.com", "status": { "status_id": 14, "status": "uncontacted" }, "listing_notes": "here are some notes", "contact": { "first_name": "CHRISTOPHER", "last_name": "lambert", "phone_1": "7032293764", "phone_2": null, "email_1": "chris@avcs.com", "email_2": null }, "address": { "address_id": 25, "street_1": "123 main street", "street_2": "907", "city": "woodbridge", "state": "va", "zip": "22191" }, "vehicle": { "vehicle_id": 23, "vin": "88888888888888888", "odometer": "44444", "notes": "goodbye", "year": { "value": 21, "text": "2014" }, "make": { "value": 21, "text": "LIncoln" }, "model": { "model_id": 19, "model": "Suburban" }, "trim": { "trim_id": 18, "trim": "base" }, "drive": { "drive_id": 25, "drive": "4x4" }, "transmission": { "transmission_id": 22, "transmission": "clutch" }, "color": { "color_id": 15, "color": "purple" }, "appraisal": { "appraisal_id": 8, "appraised_by": null, "asking_original": "9900.00", "asking_now": "9200.00", "date_listed": "4/29/2020", "kbb_pp": "8800.00", "kbb_trade": "7500.00", "accu_ws": "8000.00", "accu_truecar": "8200.00", "vauto_app": "8400.00", "vauto_sell": "10000.00", "vauto_ctm": 85, "vauto_ptm": 95, "vauto_mds": 65, "est_recon": "1000.00", "est_gross": "1000.00", "notes": "nice car, should go fast", "created_at": "2020-05-01T15:10:23.000000Z", "updated_at": "2020-05-01T15:10:48.000000Z" } } },

    { "id": 68, "source": { "source_id": 13, "source": "craigslist" }, "link_url": "htttp://www.google.com", "status": { "status_id": 15, "status": "uncontacted" }, "listing_notes": "This is where you would put your notes", "contact": { "first_name": "Chris", "last_name": "Lamb", "phone_1": "7032293764", "phone_2": null, "email_1": "chris.avcs@gmail.com", "email_2": null }, "address": { "address_id": 26, "street_1": "903 Burke Drive", "street_2": null, "city": null, "state": null, "zip": null }, "vehicle": { "vehicle_id": 24, "vin": "12345678912345678", "odometer": "99999", "notes": "This is notes for the vehicle", "year": { "value": 22, "text": "2017" }, "make": { "value": 22, "text": "ford" }, "model": { "model_id": 20, "model": "pinto" }, "trim": { "trim_id": 19, "trim": "deluxe" }, "drive": { "drive_id": 26, "drive": "fwd" }, "transmission": { "transmission_id": 23, "transmission": "stick" }, "color": { "color_id": 16, "color": "blue" }, "appraisal": { "appraisal_id": 9, "appraised_by": null, "asking_original": null, "asking_now": null, "date_listed": null, "kbb_pp": null, "kbb_trade": null, "accu_ws": null, "accu_truecar": null, "vauto_app": null, "vauto_sell": null, "vauto_ctm": null, "vauto_ptm": null, "vauto_mds": null, "est_recon": null, "est_gross": null, "notes": "This is notes for the appraisal", "created_at": "2020-05-01T20:12:11.000000Z", "updated_at": "2020-05-01T20:12:11.000000Z" } } },

    { "id": 69, "source": { "source_id": 14, "source": "Cars.com" }, "link_url": "htttp://www.google.com", "status": { "status_id": 16, "status": "Contacted" }, "listing_notes": "Nice guy", "contact": { "first_name": "Atef", "last_name": "Ghuniem", "phone_1": "5712229999", "phone_2": null, "email_1": "atef@koons.com", "email_2": null }, "address": { "address_id": 27, "street_1": "100 Main Street", "street_2": null, "city": null, "state": null, "zip": null }, "vehicle": { "vehicle_id": 25, "vin": "12345678912345678", "odometer": "99999", "notes": "This is notes for the vehicle", "year": { "value": 23, "text": "2016" }, "make": { "value": 23, "text": "VW" }, "model": { "model_id": 21, "model": "GTI" }, "trim": { "trim_id": 20, "trim": "SE" }, "drive": { "drive_id": 27, "drive": "AWD" }, "transmission": { "transmission_id": 24, "transmission": "stick" }, "color": { "color_id": 17, "color": "Black" }, "appraisal": { "appraisal_id": 10, "appraised_by": null, "asking_original": null, "asking_now": null, "date_listed": null, "kbb_pp": null, "kbb_trade": null, "accu_ws": null, "accu_truecar": null, "vauto_app": null, "vauto_sell": null, "vauto_ctm": null, "vauto_ptm": null, "vauto_mds": null, "est_recon": null, "est_gross": null, "notes": "This is notes for the appraisal", "created_at": "2020-05-01T22:58:51.000000Z", "updated_at": "2020-05-01T22:58:51.000000Z" } } },

    { "id": 70, "source": { "source_id": 15, "source": "Cars.com" }, "link_url": "htttp://www.google.com", "status": { "status_id": 17, "status": "Contacted" }, "listing_notes": "Nice guy", "contact": { "first_name": "Atef", "last_name": "Ghuniem", "phone_1": "5712229999", "phone_2": null, "email_1": "atef@koons.com", "email_2": null }, "address": { "address_id": 28, "street_1": "100 Main Street", "street_2": null, "city": null, "state": null, "zip": null }, "vehicle": { "vehicle_id": 26, "vin": "12345678912345678", "odometer": "99999", "notes": "This is notes for the vehicle", "year": { "value": 24, "text": "2016" }, "make": { "value": 24, "text": "VW" }, "model": { "model_id": 22, "model": "GTI" }, "trim": { "trim_id": 21, "trim": "SE" }, "drive": { "drive_id": 28, "drive": "AWD" }, "transmission": { "transmission_id": 25, "transmission": "stick" }, "color": { "color_id": 18, "color": "Black" }, "appraisal": { "appraisal_id": 11, "appraised_by": null, "asking_original": null, "asking_now": null, "date_listed": null, "kbb_pp": null, "kbb_trade": null, "accu_ws": null, "accu_truecar": null, "vauto_app": null, "vauto_sell": null, "vauto_ctm": null, "vauto_ptm": null, "vauto_mds": null, "est_recon": null, "est_gross": null, "notes": "This is notes for the appraisal", "created_at": "2020-05-01T23:24:33.000000Z", "updated_at": "2020-05-01T23:24:33.000000Z" } } },

    { "id": 71, "source": { "source_id": 16, "source": "Autotrader.com" }, "link_url": "craigslist.com", "status": { "status_id": 18, "status": "Uncontacted" }, "listing_notes": "Very Sexy", "contact": { "first_name": "Marta", "last_name": "Lamb", "phone_1": "2403809898", "phone_2": null, "email_1": "marta@autofollowup.net", "email_2": null }, "address": { "address_id": 29, "street_1": "100 Main Street", "street_2": null, "city": null, "state": null, "zip": null }, "vehicle": { "vehicle_id": 27, "vin": "36524875965823657", "odometer": "45689", "notes": "looks clean", "year": { "value": 25, "text": "2013" }, "make": { "value": 25, "text": "Lexus" }, "model": { "model_id": 23, "model": "RX350" }, "trim": { "trim_id": 22, "trim": "Luxury" }, "drive": { "drive_id": 29, "drive": "AWD" }, "transmission": { "transmission_id": 26, "transmission": "Auto" }, "color": { "color_id": 19, "color": "White" }, "appraisal": { "appraisal_id": 12, "appraised_by": null, "asking_original": null, "asking_now": null, "date_listed": null, "kbb_pp": null, "kbb_trade": null, "accu_ws": null, "accu_truecar": null, "vauto_app": null, "vauto_sell": null, "vauto_ctm": null, "vauto_ptm": null, "vauto_mds": null, "est_recon": null, "est_gross": null, "notes": "nice car, needs tires", "created_at": "2020-05-02T01:10:54.000000Z", "updated_at": "2020-05-02T01:10:54.000000Z" } } },

    { "id": 74, "source": { "source_id": 19, "source": "Autotrader.com" }, "link_url": "craigslist.com", "status": { "status_id": 21, "status": "Uncontacted" }, "listing_notes": "Very Sexy", "contact": { "first_name": "Marta", "last_name": "Lamb", "phone_1": "2403809898", "phone_2": null, "email_1": "marta@autofollowup.net", "email_2": null }, "address": { "address_id": 32, "street_1": "100 Main Street", "street_2": null, "city": null, "state": null, "zip": null }, "vehicle": { "vehicle_id": 30, "vin": "36524875965823657", "odometer": "45689", "notes": "looks clean", "year": { "value": 28, "text": "2013" }, "make": { "value": 28, "text": "Lexus" }, "model": { "model_id": 26, "model": "RX350" }, "trim": { "trim_id": 25, "trim": "Luxury" }, "drive": { "drive_id": 32, "drive": "AWD" }, "transmission": { "transmission_id": 29, "transmission": "Auto" }, "color": { "color_id": 22, "color": "White" }, "appraisal": { "appraisal_id": 15, "appraised_by": null, "asking_original": null, "asking_now": null, "date_listed": null, "kbb_pp": null, "kbb_trade": null, "accu_ws": null, "accu_truecar": null, "vauto_app": null, "vauto_sell": null, "vauto_ctm": null, "vauto_ptm": null, "vauto_mds": null, "est_recon": null, "est_gross": null, "notes": "nice car, needs tires", "created_at": "2020-05-05T00:00:41.000000Z", "updated_at": "2020-05-05T00:00:41.000000Z" } } },

    { "id": 76, "source": { "source_id": 21, "source": "craigslist" }, "link_url": "https://washingtondc.craigslist.org/nva/cto/d/great-falls-2013-bmw-335i-xdrive/7119308860.html", "status": { "status_id": 23, "status": "uncontacted" }, "listing_notes": null, "contact": { "first_name": null, "last_name": null, "phone_1": null, "phone_2": null, "email_1": "5a1ba569031739b7ab49db3935ae4dad@sale.craigslist.org", "email_2": null }, "address": { "address_id": 34, "street_1": null, "street_2": null, "city": "Great Falls", "state": null, "zip": null }, "vehicle": { "vehicle_id": 32, "vin": null, "odometer": "122000", "notes": "can't tell the options from the pics", "year": { "value": 30, "text": "2013" }, "make": { "value": 30, "text": "BMW" }, "model": { "model_id": 28, "model": "335ix" }, "trim": { "trim_id": 27, "trim": null }, "drive": { "drive_id": 34, "drive": "xdrive" }, "transmission": { "transmission_id": 31, "transmission": "auto" }, "color": { "color_id": 24, "color": "Gray" }, "appraisal": { "appraisal_id": 17, "appraised_by": null, "asking_original": "11900.00", "asking_now": "11900.00", "date_listed": "2020-05-05", "kbb_pp": "10500.00", "kbb_trade": "9500.00", "accu_ws": "10500.00", "accu_truecar": "9500.00", "vauto_app": "10500.00", "vauto_sell": null, "vauto_ctm": 85, "vauto_ptm": null, "vauto_mds": 29, "est_recon": null, "est_gross": null, "notes": null, "created_at": "2020-05-06T00:21:25.000000Z", "updated_at": "2020-05-06T00:21:25.000000Z" } } } ]


/*const candrink = ages.filter(function (age) {
    if (age >= 21) {
        return true;
    }
})

const uc = listings.filter(function (status.status_id) {
    if (status.status_id >= 20){
        return true;
    }
});*/

/*const uc = listings.filter(function (listing) {
        if(listing.status.status_id === 23) {
            return true;
        }
});*/

const statusFilter = listings.filter(function (listing) {
    if(listing.status.status === 'uncontacted') {
        if(listing.source.source === 'craigslist') {
            return true
        }
    }
});

console.log(statusFilter);
