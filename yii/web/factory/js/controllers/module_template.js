var factoryApp = angular.module('FactoryApp', []);

factoryApp.controller('ModuleTemplateCtrl', function ($scope, $http) {
	$http.get('factory/polyiigon-smart-field').success(function(data) {

		$scope.fields = data;
	});
});