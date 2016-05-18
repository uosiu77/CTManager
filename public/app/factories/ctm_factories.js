ctManagerApp.factory( "seamenFactory", function( $http, API_URL, $routeParams, $rootScope ){

	var sFactory = {};
		
	sFactory.query_path 	= "seamen_list";
	sFactory.skipLimit 	= 10;
	sFactory.skip		= 0;
	sFactory.searchValue	= "";
	
 	sFactory.broadcast = function( keyword ){
		$rootScope.$broadcast( "handleBroadcast", keyword);
	}
	 
	sFactory.getSeamen = function(){

		if( $routeParams.skip > 0 )
		{
			sFactory.skip 		= $routeParams.skip; 
			sFactory.skipPrev 	= parseInt( sFactory.skip ) - parseInt( sFactory.skipLimit );
			sFactory.skipNext 	= parseInt( sFactory.skip ) + parseInt( sFactory.skipLimit );
		}
		else
		{
			sFactory.skip		= 0;
			sFactory.skipPrev 	= 0;
			sFactory.skipNext 	= sFactory.skipLimit;
		}	
		
		if( sFactory.skip == 0 ){
			$(".skipPrev").removeClass('btn-primary');
			$(".skipPrev").addClass('btn-disabled');
		}
		
		var completeQuery = API_URL + 
				sFactory.query_path + "/" + 
				sFactory.skip + "/" + 
				sFactory.skipLimit;
		
		if( sFactory.searchValue != "" ){
			completeQuery += "/" + sFactory.searchValue;
		}

		//console.log( "sFactory searchValue: " + sFactory.searchValue );
		//console.log( "sFactory query: " + completeQuery );
		
		return 	$http.get( completeQuery );
	};
	
	return sFactory;
	
});



ctManagerApp.factory( "seamanDetailsFactory", function( $http, API_URL, $routeParams, $rootScope ){

	var sdFactory = {};

	sdFactory.query_path 	= "seaman_details";
	sdFactory.seaman_id 	= $routeParams.seamanID;

	sdFactory.getSeamanDetails = function(){
		
		var completeQuery = API_URL +
				sdFactory.query_path + "/" +
				sdFactory.seaman_id;
				
		return $http.get( completeQuery );
		
	}
	
	return sdFactory;

});


ctManagerApp.factory( "vesselsFactory", function( $http, API_URL, $routeParams, $rootScope ){

	var vFactory = {};
		
	vFactory.query_path 	= "vessels_list";
	vFactory.skipLimit 	= 10;
	vFactory.skip		= 0;
	vFactory.searchValue	= "";
	
 	vFactory.broadcast = function( keyword ){
		$rootScope.$broadcast( "handleBroadcast", keyword);
	}
	 
	vFactory.getVessels = function(){

		if( $routeParams.skip > 0 )
		{
			vFactory.skip 		= $routeParams.skip; 
			vFactory.skipPrev 	= parseInt( vFactory.skip ) - parseInt( vFactory.skipLimit );
			vFactory.skipNext 	= parseInt( vFactory.skip ) + parseInt( vFactory.skipLimit );
		}
		else
		{
			vFactory.skip		= 0;
			vFactory.skipPrev 	= 0;
			vFactory.skipNext 	= vFactory.skipLimit;
		}	
		
		if( vFactory.skip == 0 ){
			$(".skipPrev").removeClass('btn-primary');
			$(".skipPrev").addClass('btn-disabled');
		}
		
		var completeQuery = API_URL + 
				vFactory.query_path + "/" + 
				vFactory.skip + "/" + 
				vFactory.skipLimit;
		
		if( vFactory.searchValue != "" ){
			completeQuery += "/" + vFactory.searchValue;
		}

		console.log( "vFactory searchValue: " + vFactory.searchValue );
		console.log( "vFactory query: " + completeQuery );
		
		return 	$http.get( completeQuery );
	};
	
	return vFactory;
	
});