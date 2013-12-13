'use strict';

/* Controllers */

var CustomerList = angular.module('CustomerList', []);

CustomerList.controller('SearchCtrl', function($scope, $http) {
  $http.get('memberDBtoJSON.php').success(function(data) {
    $scope.customers = data;
  });

  $scope.orderProp = 'RegisterDate';

});
