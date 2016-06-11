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

	$scope.submitChangePass = function () {
		console.log($scope.newAcc);
		$http({
			method: 'POST',
			url: loc + 'acc-update',
			data: $scope.pass,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			if (response == 'done') {
				$scope.toggleAccUpdateSidenav();
				$scope.pass = {old:null, 'new':null, confirm:null};
				var toast = $mdToast.simple().textContent("Changed!");
				$mdToast.show(toast);
			} else {
				var toast = $mdToast.simple().textContent("Fail!");
				$mdToast.show(toast);
			}
		});
	}

	$scope.toggleAccUpdateSidenav = function () {
		$mdSidenav('acc-update-sidenav').toggle();
	}
});
