'use strict';

/* Controllers */

var CustomerList = angular.module('CustomerList', []);

CustomerList.controller('SearchCtrl', function($scope, $http) {
  $http.get('../json/customers.json').success(function(data) {
    $scope.customers = data;
  });

  $scope.orderProp = 'RegisterDate';
});
