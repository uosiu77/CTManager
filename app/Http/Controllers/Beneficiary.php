<?php

namespace App\Http\Controllers;


use App\Beneficiary;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Beneficiary extends Controller
{
    public function show($seaman_id) {
		return Beneficiary::find( $seaman_id );
	}
}
