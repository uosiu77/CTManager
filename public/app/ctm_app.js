var ctManagerApp = angular.module('ctManager', ['ngRoute', 'ngAnimate', 'angularMoment', 'satellizer'])
		.constant('API_URL', 'http://localhost/ctmanager/public/api/v1/');

/* ROUTES */
var urlBase = 'app/partials/';

ctManagerApp.run(function( $rootScope, authFactory ){
	
	if ( !authFactory.checkUserAuth() )
	{
		authFactory.redirectToAuth();
	}
	else
	{
		authFactory.refreshRootScopeInfo();	
	}
	
})

	 
ctManagerApp.config(function ($routeProvider, $authProvider, $httpProvider) {


	// Push the new factory onto the $http interceptor array
	//$httpProvider.interceptors.push('redirectWhenLoggedOut');


	// Satellizer configuration that specifies which API
	// route the JWT should be retrieved from
	$authProvider.baseUrl =  '/ctmanager/public';
	$authProvider.loginUrl =  '/api/v1/authenticate';
	
	$routeProvider
		.when('/',
			{
				//redirectTo: '/auth', 
				controller: 'seamenListController',
 				templateUrl: urlBase + 'seamen_list.php'
				
			})		
		.when('/auth',
			{
				controller: 'AuthController',
 				templateUrl: urlBase + 'auth_view.php'
				
			})	
		.when('/admin',
			{
				redirectTo: 'admin/Users'
				
			})
		.when('/admin/Users',
			{
				controller: 'UserController',
 				templateUrl: urlBase + 'user_list.php'
				
			})
		.when('/seamenList',
			{
				controller: 'seamenListController',
 				templateUrl: urlBase + 'seamen_list.php'
				
			})
		.when('/seamenList/:skip',
			{
				controller: 'seamenListController',
 				templateUrl: urlBase + 'seamen_list.php'
			})
		.when('/seamenList/:skip/:search',
			{
				controller: 'seamenListController',
 				templateUrl: urlBase + 'seamen_list.php'
				
			})
		.when('/seamanDetails',
			{
				redirectTo: '/seamenList' 
				
			})
		.when('/seamanDetails/:seamanID',
			{
				controller: 'seamenDetailsController',
 				templateUrl: urlBase + 'seamen_details.php' 
				
			})
		.when('/vesselsList',
			{
				controller: 'vesselsListController',
 				templateUrl: urlBase + 'vessels_list.php'
				
			})			
		.when('/vesselsList/:skip',
			{
				controller: 'vesselsListController',
 				templateUrl: urlBase + 'vessels_list.php'
				
			})		
		.when('/vesselsList/:skip/:search',
			{
				controller: 'vesselsListController',
 				templateUrl: urlBase + 'vessels_list.php'
				
			})			
		//Define a route that has a route parameter in it (:customerID)
		/* .when('/partial2',
			{
				controller: 'RoutingController',
				templateUrl: urlBase + '7_Partial2.html'
			}) */
		/* .otherwise({ redirectTo: urlBase + 'seamen_list.php' }); */
		.otherwise({ template: "this route isn't set" });
});		

ctManagerApp.directive("redirect", ['$location', function(location){
	return {
		link: function (scope, element, attrs)	{
			element.bind("click",function(){
				scope.$apply(function(){
					if(!attrs.seamanId) {attrs.seamanId = ''}
					location.path( '/' + attrs.redirect + "/" + attrs.seamanId );
				});
			});
		}		
	}
}]);

ctManagerApp.filter('abs', function () {
  return function(val) {
    return Math.abs(val);
  }
});


// slight update to account for browsers not supporting e.which
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
// To disable f5
    /* jQuery < 1.7 */
$(document).bind("keydown", disableF5);
/* OR jQuery >= 1.7 */
$(document).on("keydown", disableF5);	
