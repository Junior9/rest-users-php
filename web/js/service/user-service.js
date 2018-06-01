angular.module('userService', ['ngResource'])
.factory('userService', function($resource,$q,$http,$location, $rootScope ) {
	var service = {};


	service.get = function (id){
		$http.get('/users/public/user/get/'+ id)
		.success(function(user){
			return user;
		})
		.catch(function(error){
			console.log(error);
		});

	}

	service.save = function(user){
		$http.post('/users/public/user/save',user)
		.success(function(data){
			console.log(" Data : " + data);
			$location.path("/home");
		})
		.catch(function(error){
			console.log(error);
		});
	}

	service.update = function(user,id){
		$http.put('/users/public/user/update/'+id ,user)
		.success(function(data){
			console.log(data);
			$location.path("/home");
		})
		.catch(function(error){
			console.log(error);
		});
	}

	service.delete = function(id){
		$http.delete('/users/public/user/delete/'+id)
		.success(function(data){

		})
		.catch(function(error){
			console.log(error);
		});
	}
	
	return service;
});	