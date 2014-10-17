var factoryApp = angular.module('FactoryApp', []);

factoryApp.controller('ModuleTemplateCtrl', function ($scope, $http) {

	$scope.fields = [{}];

	$http.get('polyiigon-smart-field').success(function(data) {

		$scope.smartFields = data.sort(function(a, b){ return (a.title == b.title) ? 0 : (a.title > b.title ? 1 : -1); });
	});

	$scope.save = function(){
		data = {
			name: 'Teste',
			fields: $scope.fields
		}

		$http.post('polyiigon-module-template', data).success(function(data) {
			console.log(data);
		});
	}

	$scope.doIt = function(){
		console.log($scope.fields);
	}
});