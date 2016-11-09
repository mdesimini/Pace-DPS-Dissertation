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
    $scope.abstract;
    $scope.dissertationsByKeyword;
    $scope.enteredKeyword = "";
    $scope.enteredKeywordTF = false;

    /* TO AUTO UPDATE KEYWORD SEARCH
    $scope.$watchCollection('enteredKeyword', function() {
        if(!$scope.enteredKeyword == "" || !$scope.enteredKeyword == " ") {
            $scope.getDissertationByKeyword($scope.enteredKeyword);    
        }
        else if ($scope.enteredKeyword == "" || $scope.enteredKeyword == " ") {
            console.log("blank");
        }
        else {
            console.log("blank");
        }
        
    });
    */
    
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
            //url: 'http://localhost/Pace-DPS-Dissertation/data/getAuthorDescInfo.php?authid=' + authid2,
            url: 'data/getAuthorDescInfo.php?authid=' + authid2,
            //url: 'http://www.mattdesimini.com/sites/in-progress/dps/data/getAuthorDescInfo.php?authid=' + authid2,
            method: "GET"
        }).then(function successCallback(response) {
            $scope.test = response.data.records.author;
            $scope.descAuthInfo = response.data.records;
            $scope.getAbstractById(authid2);
            console.log('descAuthInfo success!');
            console.log($scope.descAuthInfo[0].author);
        }, function errorCallback(response) {
            console.error('error!');
        });
    };

    
    $scope.getAbstractById = function(authid) {
        
        var authid2 = authid;
        //var ur = 'https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/new/data/getAbstractById.php?authid=' + authid2;
        var ur = 'data/getAbstractById.php?authid=' + authid2;
        
        $scope.abstract = "exists";
        
        //$scope.descAuthInfo[0].abstract.push(ur);
        
        $("#abstract-modal-body").load(ur);  
        
        //get all authid's AND disstitles from sql query. Query ALL dissertations that CONTAIN the keyword entered.
        
        //return authid and title of ALL dissertations that contain keyword
        
        /*        
            mysql_query("
            SELECT *
            FROM `table`
            WHERE `column` LIKE '%{$needle}%'
            ");
        */
        
        /*
            mysqli_query("
            SELECT authorid, dissertationtitle
            FROM dissertation
            WHERE abstract LIKE '%methodologies%'
            ");
        */
        
        console.log('this is it');
        console.log($scope.descAuthInfo[0].abstract);
    };   
    
    $scope.getDissertationByKeyword = function(keyword) {

        $http({
            url: 'data/getDissertationByKeywords.php?keyword=' + keyword,
            method: "GET"
        }).then(function successCallback(response) {
            $scope.enteredKeywordTF = true;
            $scope.dissertationsByKeyword = response.data.records;
            //$scope.getAbstractById(authid2);
            $("#keywordbold").html($scope.enteredKeyword);
        }, function errorCallback(response) {
            console.error('keyword error!');
        });        
        
    };

    $scope.getPapersBySubject = function(subj) {

        $http({
            //url: 'http://localhost/newdpsdb/data/getAdvisorInfo.php',
            //url: 'http://www.mattdesimini.com/sites/in-progress/dps/data/getPapersBySubject.php?subject=' + subj,
            url: 'data/getPapersBySubject.php?subject=' + subj,
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
    
    
    //method years
    $scope.getNODChartData = function() {

        var labels = []; //= ["Case Study", "Interview", "Mathematics", "Modeling", "Simulation", "Survey"];
        var data = [];//= [15, 3, 4, 16, 26, 10];  dissertationCount
                
        for(var i=0; i<$scope.methodYears.length; i++) {
            labels[i] = $scope.methodYears[i].primarymethodused;
            data[i] = $scope.methodYears[i].dissertationCount;
            console.log($scope.methodYears[i].primarymethodused);    
            console.log($scope.methodYears[i].dissertationCount);    
        }
            console.log(labels);        
        
        var ctx = document.getElementById("chartModalSY-NOD-Chart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: '# of Dissertations',
                    data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }; 
    
    
    //subject years
    $scope.getNODChartDataSY = function() {

        var labels = []; //= ["Case Study", "Interview", "Mathematics", "Modeling", "Simulation", "Survey"];
        var data = [];//= [15, 3, 4, 16, 26, 10];  dissertationCount
                
        for(var i=0; i<$scope.subjectYears.length; i++) {
            labels[i] = $scope.subjectYears[i].primarysubjectcategory;
            data[i] = $scope.subjectYears[i].dissertationCount;
            console.log($scope.subjectYears[i].primarysubjectcategory);    
            console.log($scope.subjectYears[i].dissertationCount);    
        }
            console.log(labels);        
        
        var ctx = document.getElementById("chartModalSY-NOD-Chart2");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: '# of Dissertations',
                    data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',                        
                        'rgba(244, 67, 54,0.2)',
                        'rgba(33, 150, 243,0.2)',
                        'rgba(139, 195, 74,0.2)',
                        'rgba(255, 87, 34,0.2)',
                        'rgba(63, 81, 181,0.2)',
                        'rgba(0, 188, 212,0.2)',
                        'rgba(96, 125, 139,0.2)',
                        'rgba(255, 152, 0,0.2)',
                        'rgba(3, 169, 244,0.2)',
                        'rgba(156, 39, 176,0.2)'
                        
                        
                        
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(244, 67, 54,1.0)',
                        'rgba(33, 150, 243,1.0)',
                        'rgba(139, 195, 74,1.0)',
                        'rgba(255, 87, 34,1.0)',
                        'rgba(63, 81, 181,1.0)',
                        'rgba(0, 188, 212,1.0)',
                        'rgba(96, 125, 139,1.0)',
                        'rgba(255, 152, 0,1.0)',
                        'rgba(3, 169, 244,1.0)',
                        'rgba(156, 39, 176,1.0)'                        
 
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    };     
    
    
    //method years
    $scope.getAYTCChartData = function() {

        var labels = []; //= ["Case Study", "Interview", "Mathematics", "Modeling", "Simulation", "Survey"];
        var data = []; //= [3.38, 2.86, 2.44, 2.64, 3.26, 3.17];
        //console.log(labels);
        
        for(var i=0; i<$scope.methodYears.length; i++) {
            labels[i] = $scope.methodYears[i].primarymethodused;
            data[i] = $scope.methodYears[i].years;
            console.log($scope.methodYears[i].primarymethodused);    
            console.log($scope.methodYears[i].years);    
        }
            console.log(labels);
        
        var ctx = document.getElementById("chartModalSY-AYTC-Chart");
        
        var data = {
            labels,
            datasets: [
                {  
                    data,
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#d35400",
                        "#8e44ad",
                        "#2ecc71",
                        "#e74c3c"
                    ],
                    hoverBackgroundColor: [
                        "#d32247",
                        "#2279b4",
                        "#feb70a",
                        "#a74200",
                        "#62237c",
                        "#269254",
                        "#e22714"
                    ]
                }]
        };        
        
        var myPieChart = new Chart(ctx,{
            type: 'doughnut',
            data: data
        });        
        
    };
    
    //subject years
    $scope.getAYTCChartDataSY = function() {

        var labels = []; //= ["Case Study", "Interview", "Mathematics", "Modeling", "Simulation", "Survey"];
        var data = []; //= [3.38, 2.86, 2.44, 2.64, 3.26, 3.17];
        //console.log(labels);
        
        for(var i=0; i<$scope.subjectYears.length; i++) {
            labels[i] = $scope.subjectYears[i].primarysubjectcategory;
            data[i] = $scope.subjectYears[i].years;
            console.log($scope.subjectYears[i].primarysubjectcategory);    
            console.log($scope.subjectYears[i].years);    
        }
            console.log(labels);
        
        var ctx = document.getElementById("chartModalSY-AYTC-Chart2");
        
        var data = {
            labels,
            datasets: [
                {  
                    data,
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#d35400",
                        "#8e44ad",
                        "#2ecc71",
                        "#e74c3c",
                        "#F44336",
                        "#2196F3",
                        "#FF9800",
                        "#00BCD4",
                        "#3F51B5",
                        "#9C27B0",
                        "#4CAF50",
                        "#607D8B"
                    ],
                    hoverBackgroundColor: [
                        "#d32247",
                        "#2279b4",
                        "#feb70a",
                        "#a74200",
                        "#62237c",
                        "#269254",
                        "#e22714"
                    ]
                }]
        };        
        
        var myPieChart = new Chart(ctx,{
            type: 'doughnut',
            data: data
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
/*


.controller('AuthorController', function($scope, $rootScope, $http, $routeParams, $location, $resource, tableService, reportService) {

    $scope.getAuthorInfo = function() {
        tableService.getAuthors.get().$promise.then(function(data) {
            $scope.authInfo = data.records;
        })
    };    
    
    
    var init = function() {
        $scope.getAuthorInfo();
        $("#table-tabs").fadeIn();
    };

    init();


});

*/