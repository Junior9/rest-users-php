angular.module('main-user').controller('userController',function ($scope, $http, $location, $rootScope,userService){

	$scope.users = {};
	$scope.user = {};
	$scope.user.andresses = [];
	$scope.andress = "";
	$scope.id = sessionStorage.getItem('id');

	$http.get('/users/public/user/all')
	.success(function(users){
		$scope.users = users;
	})
	.catch(function(error){
		console.log(error);
	});
	
	$scope.save = function(){
		userService.save($scope.user);	
	}
	
	$scope.delete = function(id){
		userService.delete(id);
		$scope.users = $scope.remove(id,$scope.users);
	}
	
	$scope.update = function(id){
		sessionStorage.setItem('id',id);
		$location.path("/user/update");
	}


	$scope.remove = function(id,data){	
		for (var i = data.length - 1; i >= 0; i--) {
			if( data[i].id  == id){
				data.splice(i,1);
			}
		}
		return data;
	}
		
	$scope.addAndress = function(){	
		$scope.user.andresses.push($scope.andress);
		$scope.andress = "";
	}

	$scope.removeAndress = function(data){		
		for (var i = $scope.user.andresses.length - 1; i >= 0; i--) {
			if( $scope.user.andresses[i] == data){
				$scope.user.andresses.splice(i,1);	
			} 
		}
	}

});