app.controller('AppCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.pass = {old:null, new:null, confirm:null};
	var loc = 'http://' + location.host + '/';

	$scope.submitUpdateAcc = function () {
		console.log($scope.newAcc);
		$http({
			method: 'POST',
			url: loc + 'acc-update',
			data: $scope.pass,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			if (response == 'done') {
				$scope.pass = {old:null, 'new':null, confirm:null};
				var toast = $mdToast.simple().textContent("Changed!");
				$mdToast.show(toast);
				location.reload();
			} else {
				var toast = $mdToast.simple().textContent("Fail!");
				$mdToast.show(toast);
			}
		});
	}
});