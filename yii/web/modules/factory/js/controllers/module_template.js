var factoryApp = angular.module('FactoryApp', []);

factoryApp.controller('ModuleTemplateCtrl', function ($scope, $http) {

	$scope.fields = [{}];

	$http.get('polyiigon-smart-field').success(function(data) {

		$scope.smartFields = data;
	});

	$scope.save = function(){

		if ($scope.moduleTemplateForm.$valid){
			data = {
				title: 'Teste',
				slug:'dfsdfsf',
				//fields: $scope.fields
			}

			$http.post('polyiigon-module-template/create', data).success(function(data) {
				console.log(data);
			});
		} else {

			$scope.moduleTemplateForm.submited = true;
		}
	}

	$scope.doIt = function(){
		console.log($scope.fields);
	}
});