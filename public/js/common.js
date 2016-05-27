var app = angular.module('App', ['ngMaterial', 'ngMessages']);

app.config(function ($mdThemingProvider, $mdDateLocaleProvider) {
	$mdThemingProvider.theme('default')
		.primaryPalette('teal')
		.accentPalette('orange');
		// .dark();
});

app.controller('ToolbarCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast, $mdBottomSheet) {
	var loc = 'http://' + location.host + '/';

	$scope.toggleLoginSidenav = function () {
		$mdSidenav('login-sidenav').toggle();
	}

	$scope.toggleAccInsertSidenav = function () {
		$mdSidenav('acc-insert-sidenav').toggle();	
	}

	$scope.toggleAccUpdateSidenav = function () {
		$mdSidenav('acc-update-sidenav').toggle();
	}

	$scope.showLogoutDialog = function () {
		var confirm = $mdDialog.confirm()
			.title('Confirm')
			.textContent('Are you sure?')
			.ariaLabel()
			.ok('Log out')
			.cancel('Cancel');

		$mdDialog.show(confirm).then(function () {
			window.location.replace(loc + 'acc-logout');
		});
	}

	$scope.openBottomSheet = function() {
		$mdBottomSheet.show({
			templateUrl: 'bottom-sheet.html'
		});
	};

	$scope.changeLanguage = function() {
		$http.get(loc + "language").then(function (response) {
			location.reload();
		});
	}
});

app.controller('AccSidenavCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.newAcc = {name:null, email:null};
	$scope.pass = {old:null, new:null, confirm:null};
	$scope.acc = {email:null, password:null};
	var loc = 'http://' + location.host + '/';

	$scope.toggleLoginSidenav = function () {
		$mdSidenav('login-sidenav').toggle();
	}

	$scope.toggleAccInsertSidenav = function () {
		$mdSidenav('acc-insert-sidenav').toggle();
	}

	$scope.toggleAccUpdateSidenav = function () {
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

	$scope.login = function () {
		$http({
			method: 'POST',
			url: loc + 'acc-login',
			data: $scope.acc,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			if (response == 'logon') {
				location.reload();
			} else {
				var toast = $mdToast.simple().textContent("Fail!");
				$mdToast.show(toast);
			}
		});
	}
});

app.directive("emailUsed", function ($http) {
	return {
		restrict: 'A',
		require: 'ngModel',

		link: function(scope, element, attr, ctrl) {
			function customValidator(ngModelValue) {
				var loc = 'http://' + location.host + '/';
				$http.get(loc + 'acc-email/' + ngModelValue).then(function (response) {
					if (response.data == 'ok') {
						ctrl.$setValidity('used', true);
					} else {
						ctrl.$setValidity('used', false);
					}
				});

				return ngModelValue;
			}

			ctrl.$parsers.push(customValidator);
		}
	}
});