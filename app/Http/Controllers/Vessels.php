<?php

namespace App\Http\Controllers;

use App\Vessels;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Vessels extends Controller
{
    /**      
	* Display a listing of the resource.      
	*      
	* @return Response      
	*/     
	public function index($offset = 0, $limit = 20, $search = "") {         
		return Vessels::orderBy('name', 'desc')
				->leftJoin('flags', 'flags.id', '=', 'vessels.flag_id')
				->leftJoin('vesseltypes', 'vesseltypes.type_id', '=', 'vessels.vesseltype_id')
				->skip($offset)
				->take($limit)
				->where("name", "LIKE", $search."%")
				->get();          
		/*		return Vessels::orderBy('vessel_id', 'desc')
				->skip($offset)
				->take($limit)
				->get();         */
	}  
}
