<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Personals extends Controller
{
    /**      
	* Display a listing of the resource.      
	*      
	* @return Response      
	*/     
	public function index($id = null) {         
		if ($id == null) 
		{             
			return Personal::orderBy('id', 'desc')->get();         
		} 
		else 
		{             
			return $this->show($id);         
		}     
	}     
	
	
	/**      
	* Store a newly created resource in storage.      
	*      
	* @param  Request  $request      
	* @return Response      
	*/     
	public function store(Request $request) {
		$personal = new Personal;
		$personal->postal_code 		= $request->input('postal_code'); 
		$personal->city 			= $request->input('city'); 
		$personal->street 			= $request->input('street'); 
		$personal->country_id 		= $request->input('country_id'); 
		$personal->email 			= $request->input('email');
		$personal->skype 			= $request->input('skype'); 
		$personal->phone 			= $request->input('phone'); 
		$personal->phone_2 			= $request->input('phone_2');
		$personal->bank_account 	= $request->input('bank_account');
		$personal->bank_name 		= $request->input('bank_name');
		$personal->bank_swift 		= $request->input('bank_swift');
		$personal->mothers_forename = $request->input('mothers_forename');
        $personal->mothers_surname 	= $request->input('mothers_surname');
        $personal->mothers_maiden 	= $request->input('mothers_maiden');
        $personal->fathers_forename = $request->input('fathers_forename');
        $personal->fathers_surname 	= $request->input('fathers_surname');
        $personal->nearest_airport 	= $request->input('nearest_airport');
		$personal->save();

		return 'Personal record successfully created with id ' . $personal->id;     
	}     
	
	/**      
	* Display the specified resource.      
	*      
	* @param  int  $id      
	* @return Response      
	*/     
	public function show($id) {
		return Personal::find($id);     
	}     
	
	/**      
	* Update the specified resource in storage.      
	*      
	* @param  Request  $request      
	* @param  int  $id      
	* @return Response      
	*/     
	public function update(Request $request, $id) {
		$personal = Personal::find($id);         
		$personal->postal_code 		= $request->input('postal_code'); 
		$personal->city 			= $request->input('city'); 
		$personal->street 			= $request->input('street'); 
		$personal->country_id 		= $request->input('country_id'); 
		$personal->email 			= $request->input('email');
		$personal->skype 			= $request->input('skype'); 
		$personal->phone 			= $request->input('phone'); 
		$personal->phone_2 			= $request->input('phone_2');
		$personal->bank_account 	= $request->input('bank_account');
		$personal->bank_name 		= $request->input('bank_name');
		$personal->bank_swift 		= $request->input('bank_swift');
		$personal->mothers_forename = $request->input('mothers_forename');
        $personal->mothers_surname 	= $request->input('mothers_surname');
        $personal->mothers_maiden 	= $request->input('mothers_maiden');
        $personal->fathers_forename = $request->input('fathers_forename');
        $personal->fathers_surname 	= $request->input('fathers_surname');
        $personal->nearest_airport 	= $request->input('nearest_airport');
		$personal->save(); 
		
		return "Sucess updating personal #" . $employee->id;     
	
	}     
	
	/**      
	* Remove the specified resource from storage.      
	*      
	* @param  int  $id      
	* @return Response     
	*/     
	public function destroy(Request $request) {
		$personal = Personal::find($request->input('id'));
		$personal->delete();
		return "Personal record successfully deleted #" . $request->input('id');     
	}
}
