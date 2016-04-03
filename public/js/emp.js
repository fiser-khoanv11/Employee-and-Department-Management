var app = angular.module('EmpApp', ['ngMaterial', 'ngMessages']);

app.config(function ($mdThemingProvider, $mdDateLocaleProvider) {
	$mdThemingProvider.theme('default')
		.primaryPalette('teal');
		// .dark();

	// $mdDateLocaleProvider.parseDate = function(dateString) {
	//     var m = moment(dateString, 'L', true);
	//     return m.isValid() ? m.toDate() : new Date(NaN);
 //  	};

	// $mdDateLocaleProvider.formatDate = function (date) {
	// 	return moment(date).format('L');
	// };
});

app.controller('EmpCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {emp:'md-raised', dep:'', log:''};
	$scope.newEmp = {name:null, job:null, dob:null, phone:null, email:null, dep:null};
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
			$scope.loadEmps();
			$scope.toggleEmpInsertSidenav();
			$scope.newEmp = {name:null, job:null, dob:null, phone:null, email:null, dep:null};
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
			$scope.loadEmps();
			$scope.closeEmpUpdateSidenav();
			var toast = $mdToast.simple().textContent('Updated!')
			$mdToast.show(toast);

			// TODO: update info in select-nav
		});
	}

	$scope.openEmpSelectSidenav = function (id) {
		$http.get(loc + "emp-select-single/" + id).then(function (response) {
			$scope.selectEmp = response.data.record[0];
			console.log($scope.selectEmp);
			$mdSidenav('emp-select-sidenav').open();
		});
	}

	$scope.closeEmpSelectSidenav = function () {
		$mdSidenav('emp-select-sidenav').close();
	}

	$scope.toggleEmpInsertSidenav = function () {
		$mdSidenav('emp-insert-sidenav').toggle();
	}

	$scope.openEmpUpdateSidenav = function (id) {
		$http.get(loc + "emp-select-single/" + id).then(function (response) {
			$scope.updateEmp = response.data.record[0];
			$scope.updateEmp.emp_dob = new Date($scope.updateEmp.emp_dob);
			// console.log($scope.updateEmp);
			$mdSidenav('emp-update-sidenav').open();
		});
	}

	$scope.closeEmpUpdateSidenav = function () {
		$mdSidenav('emp-update-sidenav').close();
	}

	$scope.showEmpDeleteDialog = function (id) {
		var confirm = $mdDialog.confirm()
			.title('Confirm')
			.textContent('Are you sure?')
			.ariaLabel()
			.ok('Delete')
			.cancel('Cancel');

		$mdDialog.show(confirm).then(function () {
			$http.get(loc + "emp-delete/" + id).then(function () {
				$scope.loadEmps();
				$scope.closeEmpSelectSidenav();
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