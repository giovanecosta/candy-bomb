factoryApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
    when('/module_template/:action/:id?', {
      templateUrl: '/modules/factory/views/module_template_form.html',
      controller: 'ModuleTemplateCtrl'
    }).
    when('/module_template', {
      templateUrl: '/modules/factory/views/module_template_list.html',
      controller: 'ModuleTemplateCtrl'
    }).
    otherwise({
      redirectTo: '/'
    });
}]);