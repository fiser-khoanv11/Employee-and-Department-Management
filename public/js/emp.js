var app = angular.module('EmpApp', ['ngMaterial', 'ngMessages']);

app.controller('EmpCtrl', function ($scope, $mdSidenav, $mdDialog, $http) {
	$scope.newEmp = {name:null, job:null, phone:null, email:null, dep:null};
	// $scope.updateEmp = {id:null,name:null, job:null, phone:null, email:null, dep:1};
	$scope.search = {dep:0, nam:''};

	$scope.loadEmps = function () {
		$str = 'emp-select/' + $scope.search.dep

		if ($scope.search.nam != '') {
			$str += '/' + $scope.search.nam;
		}

		$http.get($str).then(function (response) {
			$scope.emps = response.data.records;
		});
	}

	$scope.loadEmps();

	$scope.submitNewEmp = function () {
		console.log($scope.newEmp);
		$http({
			method: 'POST',
			url: 'emp-insert',
			data: $scope.newEmp,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// console.log(response);
			$scope.loadEmps();
			$scope.toggleEmpInsertSidenav();
			$scope.newEmp = {name:null, job:null, phone:null, email:null, dep:null};
		});
	}

	$scope.submitUpdateEmp = function () {
		console.log($scope.updateEmp);
		$http({
			method: 'POST',
			url: 'emp-update',
			data: $scope.updateEmp,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// console.log(response);
			$scope.loadEmps();
			$scope.toggleEmpUpdateSidenav(0);
		});
	}

	$scope.toggleEmpInsertSidenav = function () {
		$mdSidenav('emp-insert-sidenav').toggle();
	}

	$scope.toggleEmpUpdateSidenav = function (id) {
		if (id != 0) {
			$http.get("emp-select-single/" + id).then(function (response) {
				$scope.updateEmp = response.data.record[0];
				console.log($scope.updateEmp);
				$mdSidenav('emp-update-sidenav').toggle();
			});
		} else {
			$mdSidenav('emp-update-sidenav').toggle();
		}
	}

	$scope.showEmpDeleteDialog = function (id) {
		var confirm = $mdDialog.confirm()
			.title('Confirm')
			.textContent('Are you sure?')
			.ariaLabel()
			.ok('Delete')
			.cancel('Cancel');

		$mdDialog.show(confirm).then(function () {
			$http.get("emp-delete/" + id).then(function () {
				$scope.loadEmps();
			});
		});
	}

	$scope.clearSearch = function () {
		$scope.search = {dep:0, nam:''};
		$scope.loadEmps();
	}
});

app.controller('selectCtrl', function ($scope, $http) {
	$http.get("dep-select-names").then(function (response) {
		$scope.deps = response.data.records;
	});
});