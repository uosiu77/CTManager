<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
     protected $primaryKey = 'seaman_id';
	 
	 protected $fillable = array(
		'seaman_id', 
		'ben_surname', 
		'ben_forename', 
		'ben_postal_code',
		'ben_city',
		'ben_street',
		'ben_country',
		'ben_bank_name',
		'ben_bank_code',
		'ben_bank_city',
		'ben_bank_street',
		'ben_bank_country',
		'ben_bank_account_no',
	);
}
