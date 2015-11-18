(function (angular, $, Nav) {

  'use strict';

  var app = angular.module("myApp", ['ngRoute']);

  app.config(['$routeProvider', '$locationProvider', 

    function ($routeProvider, $locationProvider) {
      $locationProvider.html5Mode(true);

      $routeProvider

      // Default Homepage Route
      .when('/', {
        templateUrl: window.themeUrl + '/templates/home.html',
        controller: 'GetPage'
      })
      
      .when('/home', {
        templateUrl: window.themeUrl + '/templates/home.html',
        controller: 'GetPage'
      })
      
      // Contact Page uses a different template
      .when('/contact-us', {
        template: '<h1>Contact Us</h1>',
        controller: 'GetContactPage'
      })

      // This handles all other pages
      .when('/:page', {
        templateUrl: function($routeParams) {
          return window.themeUrl + '/php/template.php?page=' + $routeParams.page;
        },
        controller: 'GetPage'
      });
    }

  ]);

  // Main Page retrieval controller
  app.controller(
    'GetPage',              
    [
      '$scope',
      '$http',
      '$routeParams',
      '$sce',
      '$rootScope',
      
      function ($scope, $http, $routeParams, $sce, $rootScope) {

        $scope.title = '';
        $scope.content = '';

        var page = $routeParams.page ? $routeParams.page : 'home';

        // Call the WP JSON API to retrieve the page content
        $http.get('/api/get_page?slug=' + page)
        .success(function (data, status, headers, config) {
          $scope.content = $sce.trustAsHtml(data.page.content);
          $scope.title = data.page.title;
          $rootScope.pageTitle = $scope.title;
        })
        .error(function (data, status, headers, config) {
          if (status === 404)   {
            $scope.title = "Page not found";
            $rootScope.pageTitle = $scope.title;
            $scope.content = $sce.trustAsHtml('<p>Oops! The page you were looking for could not be found.</p>');
          }
        });
      }
    ]
  );
  
  // Load any info needed for the contact page
  app.controller(
    'GetContactPage', 
    [
      '$rootScope',  
      function($rootScope) {
        $rootScope.pageTitle = 'Contact Us';
      }
    ]
  );
  
  // This will return the info for navigation
  app.controller(
    'GetNav', 
    [
      '$scope',
      '$http',
      function ($scope, $http) {
        $scope.sidebar = {
          title: 'Awesome Sidebar'
        };
      }
    ]
  );

  // Directie for rendering the side bar
  app.directive('smSiteSidebar', function () {
    return {
      restrict: 'C',
      replace: true,
      templateUrl: window.themeUrl + '/templates/sidebar.html',
      controller: 'GetNav'
    };
  });

  app.controller(
    'GetPrimaryMenu',
    [
      '$scope',
      '$http',
      function ($scope, $http) {
        $http.get('/api/navigation/get_menu?name=primary')
        .success(function (data, status, headers, config) {
          $scope.nav = new Nav(data);
        })
        .error(function (data, status, headers, config) {
        
        });
      }
    ]
  );

  app.directive('smMenu', function () {
    return {
      restrict: 'C',
      replace: true,
      templateUrl: window.themeUrl + '/templates/menu.html',
      controller: 'GetPrimaryMenu'
    };
  });

})(angular, jQuery, smNav);