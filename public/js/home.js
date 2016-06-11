app.controller('AppCtrl', function ($scope, $timeout,$mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {home:'md-raised'};
	var loc = 'http://' + location.host + '/';
	
	$scope.count = {emp:0, dep:0, acc:0};
	
	$scope.setTotal = function() {
		$http.get(loc + 'count').then(function (response) {
			$scope.count = response.data.records[0];
		});
	}

	$scope.setTotal();
});
