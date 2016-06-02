app.controller('AppCtrl', function ($scope, $timeout,$mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {home:'md-raised'};
	var loc = 'http://' + location.host + '/';
	
	$scope.count = {emp:0, dep:0, acc:0};
	$scope.setTotal = function() {
		$http.get(loc + 'count').then(function (response) {
			$scope.total = response.data.records[0];
			$scope.loadCount();
		});
	}

	$scope.setTotal();

	$scope.loadCount = function() {
		while ($scope.count.emp < $scope.total.emp) {
			$timeout(function(){
			
			},80);

			$scope.count.emp ++;
		}

		while ($scope.count.dep < $scope.total.dep) {
			$timeout(function(){
			
			},80);

			$scope.count.dep ++;
		}

		while ($scope.count.acc < $scope.total.acc) {
			$timeout(function(){
			
			},80);

			$scope.count.acc ++;
		}
	}   
});
