angular.module('main-user', ['ngRoute','ngResource','userService'])
.config(function($routeProvider,$locationProvider) {
	
	 $routeProvider.when('/home', {
         templateUrl: '/users/web/partials/user.html',
         controller: 'userController'
     });	 

     $routeProvider.when('/user/add', {
         templateUrl: '/users/web/partials/new-user.html',
         controller: 'userController'
     });	

     $routeProvider.when('/user/update', {
         templateUrl: '/users/web/partials/update-user.html',
         controller: 'userUpdateController'
     });	

	 $routeProvider.otherwise({redirectTo:'/home'});
	
});