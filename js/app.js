// var app = angular.module('dps', ['ngRoute'])
angular.module('dps')

.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider

        .when('/', {
            templateUrl: 'partials/authors.html',
            controller: 'MainController'
        })
        .when('/authors', {
            templateUrl: 'partials/authors.html',
            controller: 'MainController'
        })
        .when('/advisors', {
            templateUrl: 'partials/advisors.html',
            controller: 'MainController'
        })
        .when('/subjects', {
            templateUrl: 'partials/subjects.html',
            controller: 'MainController'
        })
        .when('/external-publications', {
            templateUrl: 'partials/external-publications.html',
            controller: 'MainController'
        })
        .when('/averages', {
            templateUrl: 'partials/averages.html',
            controller: 'MainController'
        })
        .when('/dissertation-count', {
            templateUrl: 'partials/dissertation-count.html',
            controller: 'MainController'
        })
        .when('/subject-years', {
            templateUrl: 'partials/subject-years.html',
            controller: 'MainController'
        })
        .when('/method-years', {
            templateUrl: 'partials/method-years.html',
            controller: 'MainController'
        })

        /*
        $routeProvider.when('/search/:search_query', {
            templateUrl: 'partials/main.html',
            controller: 'MainController'
        });
        */

        .otherwise({
            redirectTo: '/'
        });
    }
]);
