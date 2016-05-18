<?php

namespace App\Http\Controllers;

use App\Seaman;
use App\Beneficiary;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Seamen extends Controller
{
    /**      
	* Display a listing of the resource.      
	*      
	* @return Response      
	*/     
	public function index($offset = 0, $limit = 20, $search = "") {         
		/* return Seaman::orderBy('seaman_id', 'desc')
				->join('ranks', 'ranks.id', '=', 'seamen.rank_id')
				->skip($offset)
				->take($limit)
				->get();          */
				return Seaman::orderBy('seaman_id', 'desc')
				->join('ranks', 'ranks.id', '=', 'seamen.rank_id')
				->skip($offset)
				->take($limit)
				->where("surname", "LIKE", $search."%")
				->get();         
	}        

	/**      
	* Display details by id.      
	*      
	* @return Response      
	*/     
	public function details($seaman_id = null) {         
		if ($seaman_id == null) 
		{             
			return false;         
		} 
		else 
		{
			return $this->show($seaman_id);         
		}     
	}     
	
	
	/**      
	* Store a newly created resource in storage.      
	*      
	* @param  Request  $request      
	* @return Response      
	*/     
	public function store(Request $request) {
		$seaman = new Seaman;
		$seaman->surname 		= $request->input('surname');
		$seaman->forename 		= $request->input('forename');
		$seaman->pesel 			= $request->input('pesel'); 
		$seaman->date_of_birth 	= $request->input('date_of_birth'); 
		$seaman->place_of_birth = $request->input('place_of_birth'); 
		$seaman->rank_id 		= $request->input('rank_id'); 
		$seaman->nationality_id = $request->input('nationality_id');
		$seaman->giodo 			= $request->input('giodo');
		$seaman->save();

		return 'Seaman record successfully created with id ' . $seaman->id;     
	}     
	
	/**      
	* Display the specified resource.      
	*      
	* @param  int  $id      
	* @return Response      
	*/     
	public function show($seaman_id) {
		//return Seaman::find($seaman_id);     
 		return Seaman::where( "seamen.seaman_id", $seaman_id)
				->join('ranks', 'ranks.id', '=', 'seamen.rank_id')
				->join('flags', 'flags.id', '=', 'seamen.nationality_id')
				->first(); 
		/* $seaman =  DB::table( "seamen, flags" )
				->where( array ( "seamen.seaman_id" => $seaman_id ) )
				->first(); 
				
		return json_encode( $seaman ); */
		
/* 		return Seaman::with(['Beneficiary'])
				->where( array ( "seamen.seaman_id" => $seaman_id ) )
				->join('ranks', 'ranks.id', '=', 'seamen.rank_id')
				->join('flags', 'flags.id', '=', 'seamen.nationality_id')
				->first(); */
	}     
	
	public function beneficiary(){
		return $this->hasOne( 'App\Beneficiary' ,'seaman_id', 'seaman_id' );
	}
	
	/**      
	* Update the specified resource in storage.      
	*      
	* @param  Request  $request      
	* @param  int  $id      
	* @return Response      
	*/     
	public function update(Request $request, $id) {
		$seaman = Seaman::find($id);         
		$seaman->surname 		= $request->input('surname');
		$seaman->forename 		= $request->input('forename');
		$seaman->pesel 			= $request->input('pesel'); 
		$seaman->date_of_birth 	= $request->input('date_of_birth'); 
		$seaman->place_of_birth = $request->input('place_of_birth'); 
		$seaman->rank_id 		= $request->input('rank_id'); 
		$seaman->nationality_id = $request->input('nationality_id');
        $seaman->giodo 			= $request->input('giodo');
		$seaman->save();       
		
		return "Sucess updating seaman #" . $seaman->seaman_id;     
	
	}     
	
	/**      
	* Remove the specified resource from storage.      
	*      
	* @param  int  $id      
	* @return Response     
	*/     
	public function destroy(Request $request) {
		$seaman = Seaman::find($request->input('id'));
		$seaman->delete();
		return "Seaman record successfully deleted #" . $request->input('id');     
	}
}
