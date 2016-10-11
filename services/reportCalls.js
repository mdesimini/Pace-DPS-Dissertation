angular.module('dpsControllers').service('reportService', function($resource) {
  return {
    getAverages : $resource('./data/getAverages.php'),
    getDissCount : $resource('./data/getDissCount.php'),
    getSubjectYears : $resource('./data/getSubjectYears.php'),
    getMethodYears : $resource('./data/getMethodYears.php')
  };
});
