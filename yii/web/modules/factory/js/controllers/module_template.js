
factoryApp.controller('ModuleTemplateCtrl', function ($scope, $http, $routeParams, $location, $q, Slug) {

	$scope.fields = [{}];

	$scope.updateList = function() {
		$http.get('polyiigon-module-template').success(function(data) {

			$scope.moduleTemplates = data;
		});
	}

	if (['create', 'edit'].indexOf($routeParams.action) >= 0){

		$http.get('polyiigon-smart-field').success(function(data) {

			$scope.smartFields = data;
		});
	} else {
		$scope.updateList();
	}

	$scope.delete = function(moduleTemplate){
		$http.delete('polyiigon-module-template/delete?id='+moduleTemplate.id).success(function(data) {
			$scope.updateList();
		});
	}

	$scope.save = function(){

		if ($scope.moduleTemplateForm.$valid){
			data = {
				title: $scope.name,
				slug: Slug.slugify($scope.name),
			};

			if ($routeParams.id){
				data.id = $routeParams.action;
			}

			$http.post('polyiigon-module-template/create', data).success(function(data) {
				mtId = data.id;

				promises = [];

				for (f of $scope.fields){
					fieldData = {
						title: f.title,
						slug: Slug.slugify(f.title),
						polyiigon_smart_field_id: f.smartField.id,
						polyiigon_module_template_id: mtId
					};
					if (f.id){
						fieldData.id = f.id
					}
					promises.push( $http.post('polyiigon-module-template-field/create', fieldData) );
						
				}

				$q.all(promises).then(function(data){
					console.log(data);
					$location.path('/module_template');
				});
			});
		} else {

			$scope.moduleTemplateForm.submited = true;
		}
	}

	
});