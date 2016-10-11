angular.module('dpsControllers').service('tableService', function($resource) {
  return {
    getAuthors : $resource('./data/getAuthorInfo.php'),
    getAdvisors : $resource('./data/getAdvisorInfo.php'),
    getSubjects : $resource('./data/getSubjectInfo.php'),
    getExPubs : $resource('./data/getExternalPubs.php')
  };
});
