var app = angular.module('EmpApp', ['ngMaterial', 'ngMessages']);

app.config(function ($mdThemingProvider) {
	$mdThemingProvider.theme('default')
		.primaryPalette('teal');
		// .dark();
});

app.controller('EmpCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.newEmp = {name:null, job:null, phone:null, email:null, dep:null};
	$scope.search = {dep:document.getElementById('para').innerHTML, nam:''};
	var loc = 'http://' + location.host + '/';

	$scope.loadEmps = function () {
		$str = loc + 'emp-select/' + $scope.search.dep;

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
			url: loc + 'emp-insert',
			data: $scope.newEmp,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// console.log(response);
			$scope.loadEmps();
			$scope.toggleEmpInsertSidenav();
			$scope.newEmp = {name:null, job:null, phone:null, email:null, dep:null};
			var toast = $mdToast.simple().textContent('Inserted!')
			$mdToast.show(toast);
		});
	}

	$scope.submitUpdateEmp = function () {
		console.log($scope.updateEmp);
		$http({
			method: 'POST',
			url: loc + 'emp-update',
			data: $scope.updateEmp,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// console.log(response);
			$scope.loadEmps();
			$scope.toggleEmpUpdateSidenav(0);
			var toast = $mdToast.simple().textContent('Updated!')
			$mdToast.show(toast);
		});
	}

	$scope.toggleEmpSelectSidenav = function (id) {
		if (id != 0) {
			$http.get(loc + "emp-select-single/" + id).then(function (response) {
				$scope.selectEmp = response.data.record[0];
				console.log($scope.selectEmp);
				$mdSidenav('emp-select-sidenav').toggle();
			});
		} else {
			$mdSidenav('emp-select-sidenav').toggle();
		}
	}

	$scope.toggleEmpInsertSidenav = function () {
		$mdSidenav('emp-insert-sidenav').toggle();
	}

	$scope.toggleEmpUpdateSidenav = function (id) {
		if (id != 0) {
			$http.get(loc + "emp-select-single/" + id).then(function (response) {
				$scope.updateEmp = response.data.record[0];
				$scope.selectEmp = response.data.record[0];
				console.log($scope.updateEmp);
				$mdSidenav('emp-update-sidenav').toggle();
			});
		} else {
			$mdSidenav('emp-update-sidenav').toggle();
		}
	}

	$scope.showEmpDeleteDialog = function (id, isOpen) {
		var confirm = $mdDialog.confirm()
			.title('Confirm')
			.textContent('Are you sure?')
			.ariaLabel()
			.ok('Delete')
			.cancel('Cancel');

		$mdDialog.show(confirm).then(function () {
			$http.get(loc + "emp-delete/" + id).then(function () {
				$scope.loadEmps();
				if (isOpen == 1) {
					$scope.toggleEmpSelectSidenav(0);
				}
				var toast = $mdToast.simple().textContent('Deleted!')
				$mdToast.show(toast);
			});
		});
	}

	$scope.toggleLoginSidenav = function () {
		$mdSidenav('login-sidenav').toggle();
	}

	$scope.clearSearch = function () {
		$scope.search = {dep:0, nam:''};
		$scope.loadEmps();
	}
});

app.controller('selectCtrl', function ($scope, $http) {
	var loc = 'http://' + location.host + '/';

	$http.get(loc + "dep-select-names").then(function (response) {
		$scope.deps = response.data.records;
	});
});