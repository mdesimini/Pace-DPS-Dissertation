// var controllers = angular.module('dpsControllers', ['ngResource']);
angular.module('dpsControllers')

//main controller
.controller('MainController', function($scope, $rootScope, $http, $routeParams, $location, $resource, tableService, reportService) {

    $scope.authInfo;
    $scope.descAuthInfo;
    $scope.papersBySubjInfo;
    $scope.advisorInfo;
    $scope.subjectInfo;
    $scope.externalPubs;
    $scope.averages;
    $scope.dissCount;
    $scope.subjectYears;
    $scope.methodYears;
    $scope.sortType = 'dissertationtitle';
    $scope.sortReverse = false;
    $scope.searchTerm = '';

    //Tables Functions    
    
    $scope.getAuthorInfo = function() {
        tableService.getAuthors.get().$promise.then(function(data) {
            $scope.authInfo = data.records;
        })
    };

    $scope.getAdvisorInfo = function() {
        tableService.getAdvisors.get().$promise.then(function(data) {
            $scope.advisorInfo = data.records;
        })
    };

    $scope.getSubjectInfo = function() {
        tableService.getSubjects.get().$promise.then(function(data) {
            $scope.subjectInfo = data.records;
        })
    };

    $scope.getExternalPubs = function() {
        tableService.getExPubs.get().$promise.then(function(data) {
            $scope.externalPubs = data.records;
        })
    };

    //Reports Functions

    $scope.getAverages = function() {

        reportService.getAverages.get().$promise.then(function(data) {
            $scope.averages = data.records;
        })
    };

    $scope.getDissCount = function() {
        reportService.getDissCount.get().$promise.then(function(data) {
            $scope.dissCount = data.records;
        })
    };

    $scope.getSubjectYears = function() {

        reportService.getSubjectYears.get().$promise.then(function(data) {
            $scope.subjectYears = data.records;
        })
    };

    $scope.getMethodYears = function() {
        reportService.getMethodYears.get().$promise.then(function(data) {
            $scope.methodYears = data.records;
        })
    };


    $scope.getDescAuthInfo = function(authid) {

        var authid2 = authid;
        $http({
            //url: 'http://localhost/newdpsdb/data/getAdvisorInfo.php',
            url: 'http://www.mattdesimini.com/sites/in-progress/dps/data/getAuthorDescInfo.php?authid=' + authid2,
            method: "GET"
        }).then(function successCallback(response) {
            $scope.test = response.data.records.author;
            $scope.descAuthInfo = response.data.records;
            console.log('descAuthInfo success!');
            console.log($scope.descAuthInfo[0].author);
        }, function errorCallback(response) {
            console.error('error!');
        });
    };

    $scope.getPapersBySubject = function(subj) {

        $http({
            //url: 'http://localhost/newdpsdb/data/getAdvisorInfo.php',
            url: 'http://www.mattdesimini.com/sites/in-progress/dps/data/getPapersBySubject.php?subject=' + subj,
            method: "GET"
        }).then(function successCallback(response) {
            //$scope.test = response.data.records.author;
            $scope.papersBySubjInfo = response.data.records;
            console.log('papers by subject success!');
            console.log($scope.papersBySubjInfo.dissertationtitle);
        }, function errorCallback(response) {
            console.error('error!');
        });
    };

    var init = function() {
        $scope.getAuthorInfo();
        $scope.getAdvisorInfo();
        $scope.getSubjectInfo();
        $scope.getExternalPubs();
        $scope.getAverages();
        $scope.getDissCount();
        $scope.getSubjectYears();
        $scope.getMethodYears();
        $("#table-tabs").fadeIn();
    };

    init();

});