ctManagerApp.factory( "redirectWhenLoggedOut", function ($q, $injector) {

	var rwloFactory = {};
	
	rwloFactory.responseError = function(rejection) {

			// Need to use $injector.get to bring in $state or else we get
			// a circular dependency error
			// var $state = $injector.get('$state');

			// Instead of checking for a status code of 400 which might be used
			// for other reasons in Laravel, we check for the specific rejection
			// reasons to tell us if we need to redirect to the login state
			var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

			// Loop through each rejection reason and redirect to the login
			// state if one is encountered
			angular.forEach(rejectionReasons, function(value, key) {

				if(rejection.data.error === value) {

					// If we get a rejection corresponding to one of the reasons
					// in our array, we know we need to authenticate the user so 
					// we can remove the current user from local storage
					localStorage.removeItem('user');

					// Send the user to the auth state so they can login
					//$location.path('auth');
					console.log('user logged out and redirected');
				}
			});

			return $q.reject(rejection);
		}

	return rwloFactory;
} );


ctManagerApp.factory( "usersFactory", function( $http, API_URL, $routeParams, $rootScope ){

	var uFactory = {};

	uFactory.query_path 	= "authenticate/usersIndex";
	uFactory.users;
	uFactory.error;

	uFactory.getUsers = function(){
		
		// This request will hit the index method in the AuthenticateController
		// on the Laravel side and will return the list of users
		return $http.get( API_URL +  uFactory.query_path );
		
	}
	
	return uFactory;

});

ctManagerApp.factory( "authFactory", function( $http, API_URL, $routeParams, $rootScope, $auth ){
	
	var aFactory = {};
	
	aFactory.refreshRootScopeInfo = function (){
		
		$rootScope.currentUser = JSON.parse( localStorage.user );
		$rootScope.authenticated = localStorage.authenticated;
		
	}
	
	aFactory.removeLocalInfo = function (){
		
		$rootScope.authenticated = null;
		$rootScope.currentUser = null;
		
		localStorage.removeItem('authenticated');
		localStorage.removeItem('user');
	}
	
	aFactory.redirectToAuth = function(){
		window.location.href = '/ctmanager/public/#/auth';
	}

	aFactory.checkUserAuth = function (){
		
		if( localStorage.authenticated && JSON.parse ( localStorage.authenticated ) === true )
		{
			console.log( 'checkUserAuth authenticated in local storage');
			
			if( $auth.isAuthenticated() === true ) 
			{
				console.log( 'checkUserAuth isAuthenticated true - token valid');
				
				return true;
			}
			else // token not valid or missing
			{
				console.log( 'checkUserAuth isAuthenticated false - token invalid');
				
				aFactory.removeLocalInfo();
				
				return false;
			}
			
		}
		else
		{
			console.log( 'checkUserAuth NOT authenticated in local storage: ' + localStorage.authenticated);	
			//aFactory.removeLocalInfo();			
			return false;
		}
		
	}	
	
	aFactory.logoutUser = function (){
		$auth.logout().then(function() {

                // Remove the authenticated user from local storage
                localStorage.removeItem('user');

                // Flip authenticated to false so that we no longer
                // show UI elements dependant on the user being logged in
                $rootScope.authenticated = false;
				localStorage.removeItem('authenticated');

                // Remove the current user info from rootscope
                $rootScope.currentUser = null;
				
				window.location.href = '/ctmanager/public/#/auth';
				
            });
	}
	
	aFactory.logUser = function ( credentials ) {
		
		// Use Satellizer's $auth service to login
		$auth.login( credentials ).then( function(data) {

			// Return an $http request for the now authenticated
			// user so that we can flatten the promise chain
			return $http.get('api/v1/authenticate/user');
		
		}, function ( error ) {
			
			aFactory.loginError = true;
			aFactory.loginErrorText = error.data.error;
			
			console.log( "aFactory.loginErrorText = " + error.data.error );
			
		}).then(function( response ) {

			// Stringify the returned data to prepare it
			// to go into local storage
			var user = JSON.stringify(response.data.user);

			// Set the stringified user data into local storage
			localStorage.setItem('user', user);

			// The user's authenticated state gets flipped to
			// true so we can now show parts of the UI that rely
			// on the user being logged in
			$rootScope.authenticated = true;
			//zapisuję to w localstorage, żeby po odświeżeniu strony nadal mieć info, czy zalogowany
			localStorage.setItem('authenticated', true);
			
			
			// Putting the user's data on $rootScope allows
			// us to access it anywhere across the app
			$rootScope.currentUser = response.data.user;

			// Everything worked out so we can now redirect to
			// the users state to view the data
			//$state.go('users');
							
			console.log( 'login successful: rootScope.authenticated = ' + $rootScope.authenticated );				
			console.log( 'login successful: localStorage user = ' + localStorage.getItem('user') );				
							
			window.location.href = '/ctmanager/public/#/admin'
			
		});
		
	}
	
	return aFactory;
		
});


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