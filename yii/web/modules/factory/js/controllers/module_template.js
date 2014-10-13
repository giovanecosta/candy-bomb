var factoryApp = angular.module('FactoryApp', []);

factoryApp.controller('ModuleTemplateCtrl', function ($scope, $http) {

	$scope.fields = [{}];

	$http.get('polyiigon-smart-field').success(function(data) {

		$scope.smartFields = data;
	});

	$scope.doIt = function(){
		console.log($scope.fields);
	}
});