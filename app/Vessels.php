<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vessels extends Model
{
    protected $fillable = array(
		'vessel_id', 
		'name', 
		'flag_id'

	);
}
