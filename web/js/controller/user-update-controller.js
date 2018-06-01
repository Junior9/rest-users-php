angular.module('main-user').controller('userUpdateController',function ($scope, $http, $location, $rootScope, userService){

	$scope.user = {};
	$scope.user.andresses = [];
	$scope.id = sessionStorage.getItem('id');
	$scope.andress = "";

	$http.get('/users/public/user/get/'+$scope.id)
	.success(function(user){
		$scope.user = user;
	})
	.catch(function(error){
		console.log(error);
	});

	$scope.update = function(){
		userService.update($scope.user,$scope.id);
	}

	$scope.addAndress = function(){	
		console.log($scope.andress);
		//$scope.user.andresses.push($scope.andress);
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