'use strict';

/* Controllers */

var CustomerList = angular.module('CustomerList', []);

CustomerList.controller('SearchCtrl', function($scope, $http) {
  $http.get('customerDBtoJSON.php').success(function(data) {
    $scope.customers = data;
  });

  $scope.orderProp = 'RegisterDate';
});

/*
var JsonGet = function($scope, $http){
	var jsonData = $http({
		method: 'POST',
		url: '/json'
	});
	jsonData.success(function(response, status, headers, config){
		$scope.name = response.name;
	});
}
*/