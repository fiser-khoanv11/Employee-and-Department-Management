var app = angular.module('EmpApp', ['ngMaterial', 'ngMessages']);

app.config(function ($mdThemingProvider, $mdDateLocaleProvider) {
	$mdThemingProvider.theme('default')
		.primaryPalette('teal');
		// .dark();
});

app.controller('EmpCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {emp:'', dep:'md-raised', log:''};
	$scope.newDep = {name:null, phone:null, manager:null};
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
			$scope.loadDeps();
			$scope.toggleDepInsertSidenav();
			$scope.newDep = {name:null, phone:null, manager:null};
			var toast = $mdToast.simple().textContent('Inserted!')
			$mdToast.show(toast);
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
			$scope.loadDeps();
			$scope.closeDepUpdateSidenav();
			var toast = $mdToast.simple().textContent('Updated!')
			$mdToast.show(toast);

			// TODO: update info in select-nav
		});
	}

	$scope.openDepSelectSidenav = function (id) {
		$http.get(loc + "dep-select-single/" + id).then(function (response) {
			$scope.selectDep = response.data.record[0];
			console.log($scope.selectDep);
			$mdSidenav('dep-select-sidenav').open();
		});
	}

	$scope.closeDepSelectSidenav = function () {
		$mdSidenav('dep-select-sidenav').close();
	}

	$scope.toggleDepInsertSidenav = function () {
		$mdSidenav('dep-insert-sidenav').toggle();
	}

	$scope.openDepUpdateSidenav = function (id) {
		$http.get(loc + "dep-select-single/" + id).then(function (response) {
			$scope.updateDep = response.data.record[0];
			// console.log($scope.updateDep);
			$mdSidenav('dep-update-sidenav').open();
		});
	}

	$scope.closeDepUpdateSidenav = function (id) {
		$mdSidenav('dep-update-sidenav').close();
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
				$scope.closeDepSelectSidenav();
				var toast = $mdToast.simple().textContent('Deleted!')
				$mdToast.show(toast);
			});
		});
	}
});

app.controller('selectCtrl', function ($scope, $http) {
	var loc = 'http://' + location.host + '/';

	$http.get(loc + "emp-select-names").then(function (response) {
		$scope.emps = response.data.records;
	});
});