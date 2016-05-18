var ctManagerApp = angular.module('ctManager', ['ngRoute', 'ngAnimate', 'angularMoment', 'satellizer'])
		.constant('API_URL', 'http://localhost/ctmanager/public/api/v1/');

/* ROUTES */
var urlBase = 'app/partials/';
		
ctManagerApp.config(function ($routeProvider) {
	
	$routeProvider
		.when('/',
			{
				controller: 'seamenListController',
 				templateUrl: urlBase + 'seamen_list.php'
				
			})
		.when('/admin',
			{
				redirectTo: 'admin/Users'
				
			})
		.when('/admin/Users',
			{
				controller: 'adminController',
 				templateUrl: urlBase + 'admin.php'
				
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