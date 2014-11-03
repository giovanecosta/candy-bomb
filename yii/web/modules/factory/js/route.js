factoryApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
    when('/module_template/:action/:id?', {
      templateUrl: '/modules/factory/views/module_template/form.html',
      controller: 'ModuleTemplateCtrl'
    }).
    when('/module_template', {
      templateUrl: '/modules/factory/views/module_template/list.html',
      controller: 'ModuleTemplateCtrl'
    }).
    when('/module/:action/:id?', {
      templateUrl: '/modules/factory/views/module/form.html',
      controller: 'ModuleCtrl'
    }).
    when('/module', {
      templateUrl: '/modules/factory/views/module/list.html',
      controller: 'ModuleCtrl'
    }).
    otherwise({
      redirectTo: '/'
    });
}]);