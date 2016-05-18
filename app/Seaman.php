<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seaman extends Model
{
    protected $primaryKey = 'seaman_id';
	
	protected $fillable = array(
		'seaman_id', 
		'surname', 
		'forename', 
		'pesel', 
		'place_of_birth', 
		'rank_id', 
		'nationality_id',
		'postal_code',
		'city',
		'street',
		'country_id',
		'email',
		'skype',
		'phone',
		'phone_2',
		'phone_3',
		'parents',
		'mothers_forename',
		'mothers_surname',
		'mothers_maiden',
		'fathers_forename',
		'fathers_surname',
		'school',
		'nearest_airport',
		'image_path',
		'giodo'
	);
}
