var app = angular.module('EmpApp', ['ngMaterial', 'ngMessages']);

app.controller('EmpCtrl', function ($scope, $mdSidenav, $mdDialog, $http) {
	$scope.newDep = {name:null, phone:null};
	// $scope.updateEmp = {id:null,name:null, job:null, phone:null, email:null, dep:1};
	// $scope.search = {dep:0, nam:''};
	var loc = 'http://' + location.host + '/';

	$scope.loadDeps = function () {
		$http.get(loc + 'dep-select').then(function (response) {
			$scope.deps = response.data.records;
		});
	}

	$scope.loadDeps();

	$scope.submitNewDep = function () {
		console.log($scope.newDep);
		$http({
			method: 'POST',
			url: loc + 'dep-insert',
			data: $scope.newDep,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			console.log(response);
			$scope.loadDeps();
			$scope.toggleDepInsertSidenav();
			$scope.newDep = {name:null, phone:null};
		});
	}

	$scope.submitUpdateDep = function () {
		console.log($scope.updateDep);
		$http({
			method: 'POST',
			url: loc + 'dep-update',
			data: $scope.updateDep,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			console.log(response);
			$scope.loadDeps();
			$scope.toggleDepUpdateSidenav(0);
		});
	}

	$scope.toggleDepInsertSidenav = function () {
		$mdSidenav('dep-insert-sidenav').toggle();
	}

	$scope.toggleDepUpdateSidenav = function (id) {
		if (id != 0) {
			$http.get(loc + "dep-select-single/" + id).then(function (response) {
				$scope.updateDep = response.data.record[0];
				console.log($scope.updateDep);
				$mdSidenav('dep-update-sidenav').toggle();
			});
		} else {
			$mdSidenav('dep-update-sidenav').toggle();
		}
	}

	$scope.showDepDeleteDialog = function (id) {
		var confirm = $mdDialog.confirm()
			.title('Confirm')
			.textContent('Are you sure?')
			.ariaLabel()
			.ok('Delete')
			.cancel('Cancel');

		$mdDialog.show(confirm).then(function () {
			$http.get(loc + "dep-delete/" + id).then(function () {
				$scope.loadDeps();
			});
		});
	}
});