
factoryApp.controller('ModuleCtrl', function ($scope, $http, $routeParams, $location, $q, Slug) {

	$scope.i18n = false;

	$scope.updateList = function() {
		$http.get('polyiigon-module').success(function(data) {

			$scope.modules = data;
		});
	}

	$scope.loadFields = function() {
		$http.get('polyiigon-module-template-field').success(function(data) {

			$scope.moduleTemplateFields = data;
		});
	}

	if (['create', 'edit'].indexOf($routeParams.action) >= 0){

		$http.get('polyiigon-module-template').success(function(data) {

			$scope.moduleTemplates = data;
		});
		$http.get('polyiigon-module').success(function(data) {

			$scope.modules = data;
		});
	} else {
		$scope.updateList();
	}

	$scope.delete = function(module){
		$http.delete('polyiigon-module/delete?id='+module.id).success(function(data) {
			$scope.updateList();
		});
	}

	$scope.save = function(){

		if ($scope.moduleForm.$valid){
			moduleData = {
				title: $scope.name,
				slug: Slug.slugify($scope.name),
				parent_slug: $scope.mParent ? $scope.mParent.slug : null,
				sub_module: Number(Boolean($scope.mParent)),
				i18n: Number($scope.i18n),
				polyiigon_module_template_id: $scope.mTemplate.id
			};

			if ($routeParams.id){
				moduleData.id = $routeParams.id;
			}

			$http.post('polyiigon-module/create', moduleData).success(function(moduleData) {
				mId = moduleData.id;

				promises = [];

				for (f of $scope.moduleTemplateFields){

					if (f.polyiigon_module_template_id != $scope.mTemplate.id) {
						continue;
					}

					fieldData = {
						title: f.title,
						polyiigon_module_template_field_id: f.id,
						polyiigon_module_id: mId
					};
					if (f.id){
						fieldData.id = f.id
					}

					promises.push( $http.post('polyiigon-module-field/create', fieldData) );
					
				}

				$q.all(promises).then(function(data){
					$http.put('polyiigon-module/update?id='+moduleData.id+'&create_table=true', moduleData).success(function(data){

						$location.path('/module');
					});
				});

			});
		} else {

			$scope.moduleForm.submited = true;
		}
	}

	
});