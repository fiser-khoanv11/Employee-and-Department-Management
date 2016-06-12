app.controller('AppCtrl', function ($scope, $mdSidenav, $mdDialog, $http) {
	$scope.tab = {home:'md-raised'};
	var loc = 'http://' + location.host + '/';
	
	$scope.count = {emp:0, dep:0, acc:0};
	
	$scope.setTotal = function() {
		$http.get(loc + 'count').then(function (response) {
			$scope.count = response.data.records[0];
		});
	}

	$scope.setTotal();

	$scope.loadEmps = function () {
		$http.get('emp-select/1/6/0').then(function (response) {
			$scope.emps = response.data.records;
		});
	}

	$scope.loadEmps();
});
