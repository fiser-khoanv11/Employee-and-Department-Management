var app = angular.module('App', ['ngMaterial', 'ngMessages']);

app.config(function ($mdThemingProvider, $mdDateLocaleProvider) {
	$mdThemingProvider.theme('default')
		.primaryPalette('teal');
		// .dark();
});

app.controller('ToolbarCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.toggleLoginSidenav = function () {
		$mdSidenav('login-sidenav').toggle();
	}

	$scope.toggleAccInsertSidenav = function () {
		$mdSidenav('acc-insert-sidenav').toggle();	
	}

	$scope.toggleAccUpdateSidenav = function () {
		console.log('hum');
		$mdSidenav('acc-update-sidenav').toggle();
	}
});

app.controller('AccSidenavCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.newAcc = {name:null, email:null};
	$scope.updateAcc = {old:null, 'new':null, confirm:null};
	var loc = 'http://' + location.host + '/';

	$scope.toggleLoginSidenav = function () {
		$mdSidenav('login-sidenav').toggle();
	}

	$scope.toggleAccInsertSidenav = function () {
		$mdSidenav('acc-insert-sidenav').toggle();	
	}

	$scope.toggleAccUpdateSidenav = function () {
		console.log('hum');
		$mdSidenav('acc-update-sidenav').toggle();
	}

	$scope.submitNewAcc = function () {
		console.log($scope.newAcc);
		$http({
			method: 'POST',
			url: loc + 'acc-insert',
			data: $scope.newAcc,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			$scope.toggleAccInsertSidenav();
			$scope.newAcc = {name:null, email:null};
			var toast = $mdToast.simple().textContent('Inserted!')
			$mdToast.show(toast);
		});
	}

	$scope.submitUpdateAcc = function () {
		console.log($scope.newAcc);
		$http({
			method: 'POST',
			url: loc + 'acc-update',
			data: $scope.newAcc,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			$scope.toggleAccUpdateSidenav();
			$scope.updateAcc = {old:null, 'new':null, confirm:null};
			var toast = $mdToast.simple().textContent('Updated!')
			$mdToast.show(toast);
		});
	}
});