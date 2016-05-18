<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = array(
		'id', 
		'seaman_id', 
		'postal_code', 
		'city', 
		'street', 
		'country_id', 
		'email',
		'skype', 
		'phone', 
		'phone_2',
		'phone_3',
		'bank_account',
		'bank_name',
		'bank_swift',
		'mothers_forename',
        'mothers_surname',
        'mothers_maiden',
        'fathers_forename',
        'fathers_surname',
        'nearest_airport',
        'post_type');		
}
