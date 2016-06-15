ctManagerApp.controller('UserController', function ($scope, $http, usersFactory, $rootScope) {
	
	console.log("it's UserController and this is the rootScope: ");
	console.log( $rootScope.currentUser );
	console.log( $rootScope );
	
	$scope.getUsers = function() {
	
		usersFactory.getUsers()
				.success( function( goodResponse ) {
					$scope.users = goodResponse;
					console.log("goodResponse!");
					console.log(goodResponse);
				}).error( function( badResponse ) {
					console.log("badResponse :(");
					console.log(badResponse);
					$scope.error = badResponse;
				});
	}
		
});	
	


ctManagerApp.controller('AuthController', function ($scope, $http, $rootScope, authFactory) {

        $scope.loginError = false;
        $scope.loginErrorText;
		
		console.log( 'AuthController start. going to check if userAuth == true in local storage' );
		//jeśli user jest zalogowany, nie ma czego tu szukać
		if( authFactory.checkUserAuth() ){
			window.location.href = '/ctmanager/public/#/seamenList';
		}
		
		$scope.logout = function(){
		
			console.log( 'logging out' );
		
			authFactory.logoutUser();
			
		}
		
        $scope.login = function() {

			console.log('login clicked');
		
            var credentials = {
                username: $scope.username,
                password: $scope.password
            }
            
			console.log( credentials );
			
			authFactory.logUser( credentials );
			
        }

});


ctManagerApp.controller('seamenListController', function($scope, $http, seamenFactory) {
    
	//$scope.parseInt = parseInt;

	function getSeaman(){
		seamenFactory.getSeamen()
			.success(function(goodResponse) {
				$scope.seamen = goodResponse;
			})
			.error(function(badResponse){
				console.log ( badResponse );
			});
	}
	
	getSeaman();
	
	$scope.skipPrev = seamenFactory.skipPrev;
	$scope.skipNext = seamenFactory.skipNext;

	$scope.$on('handleBroadcast', function(event, keyword) {
		$scope.searchValue = keyword;
		getSeaman();
    });      	
	
	
});


ctManagerApp.controller('searchController', function($scope, seamenFactory) {
	
	$scope.$watch( "searchKeyword", function(searchKeyword){
		if ( typeof(searchKeyword) === "undefined" ) { searchKeyword = ""; }
		seamenFactory.searchValue = searchKeyword;
		seamenFactory.broadcast( searchKeyword );
	} );
	
});

ctManagerApp.controller('seamenDetailsController', function($scope, seamanDetailsFactory ) {
	
	var seaman = {};
	
	$scope.parseInt = parseInt;
	
	
	seamanDetailsFactory.getSeamanDetails()
			.success(function(goodResponse) {
				console.log( 'seamenDetailsController getSeamanDetails goodResponse' )
				console.log( goodResponse )
				$scope.seaman = goodResponse;
			})
			.error(function(badResponse){
				var w = window.open( '', '_blank' );
				w.document.body.innerHTML = badResponse;
			});
	
	
});

ctManagerApp.controller('vesselsListController', function($scope, $http, vesselsFactory) {
    
	function getVessels(){
		vesselsFactory.getVessels()
			.success(function(goodResponse) {
				console.log('vesselsListController getVessels' + angular.toJson( goodResponse, 1) );
				$scope.vessels = goodResponse;
			})
			.error(function(badResponse){
				var w = window.open( '', '_blank' );
				w.document.body.innerHTML = badResponse;
			});
	}
	
	getVessels();
	
	$scope.skipPrev = vesselsFactory.skipPrev;
	$scope.skipNext = vesselsFactory.skipNext;

	$scope.$on('handleBroadcast', function(event, keyword) {
		$scope.searchValue = keyword;
		getVessels();
    });      	
	
	
});


/* 

ctManagerApp.controller('seamenDetailsController', function($scope, $http, API_URL, $routeParams) {
    
	var seaman_id = $routeParams.seamanID;
	var seaman_id_path = "";
	
	if( seaman_id != undefined && seaman_id != "")
	{
		seaman_id_path = '/' + seaman_id;
		console.log('param seaman_id_path: '+seaman_id_path);
	}
	else{
		seaman_id = "";
		console.log("seamenController::nie określono ID." + seaman_id_path);
	}


    //retrieve seaman details from API
    $http.get(API_URL + "seamen_list" + seaman_id_path)
            .success(function(response) {
				//console.log('seamenDetailsController response: ' + angular.toJson(response, 1));
                $scope.seamen = response;
				console.log("Seaman response success! Seaman seaman_id_path: " +seaman_id_path);
				console.log('scope.seaman: ' + angular.toJson($scope.seaman, 1));
            });

    //show modal form
	
    $scope.toggle = function(modalstate, item_id) {
        $scope.modalstate = modalstate;
		console.log( "toggle! state:" +modalstate + " id: " + item_id);
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Seaman";
				console.log('toggle add');
                break;
            case 'edit':
                $scope.form_title = "Edit Seaman Details";
                $scope.id = item_id;
                $http.get(API_URL + 'seamen/' + item_id)
                        .success(function(response) {
                            console.log(response);
                            $scope.seaman = response;
                        });
                break;
            default:
                break;
        }
        console.log(item_id);
        $('#seamanModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "seamen";
        
        //append seaman id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.seaman),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'seamen/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }


			
});


 */
ctManagerApp.controller('NavbarController', function ($scope, $location) {
    $scope.getClass = function (path) {
	    if ( $location.path().search( path ) ) {
            return true
        } else {
            return false;
        }
    }
});
