app.controller('AppCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {emp:'', dep:'md-raised'};
	$scope.newDep = {name:null, phone:null, address:null, manager:null};
	var loc = 'http://' + location.host + '/';
	$scope.page = 1;
	$scope.perPage = 5;

	// Load data
	$scope.loadDeps = function () {
		// Set data for $scope.deps
		$http.get(loc + 'dep-select/' + $scope.page + "/" + $scope.perPage).then(function (response) {
			$scope.deps = response.data.records;
		});

		// Get number of results
		$http.get(loc + 'dep-count').then(function (response) {
			$scope.count = response.data;
		});
	}

	$scope.loadDeps();

	// Set current page to 1 and reload data
	$scope.setPageToOne = function () {
		$scope.page = 1;
		$scope.loadDeps();
	}

	// Next page, reload data
	$scope.previous = function () {
		$scope.page --;
		$scope.loadDeps();
	}

	// Previous page, reload data
	$scope.next = function () {
		$scope.page ++;
		$scope.loadDeps();
	}

	// Check if the current page is the last page
	$scope.isMax = function () {
		if ($scope.page < ($scope.count / $scope.perPage)) {
			return false;
		}

		return true;
	}

	// Submit new department
	$scope.submitNewDep = function () {
		console.log($scope.newDep);
		$http({
			method: 'POST',
			url: loc + 'dep-insert',
			data: $scope.newDep,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// Reload data
			$scope.loadDeps();

			// Close sidenav
			$scope.toggleDepInsertSidenav();

			// Reset $scope.newDep
			$scope.newDep = {name:null, phone:null, address:null, manager:null};

			// Show toast
			var toast = $mdToast.simple().textContent('Inserted!');
			$mdToast.show(toast);
		});
	}

	// Submit update department
	$scope.submitUpdateDep = function () {
		console.log($scope.updateDep);
		$http({
			method: 'POST',
			url: loc + 'dep-update',
			data: $scope.updateDep,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// Reload data
			$scope.loadDeps();

			// Close sidenav
			$scope.closeDepUpdateSidenav();

			// Show toast
			var toast = $mdToast.simple().textContent('Updated!');
			$mdToast.show(toast);
		});
	}

	$scope.openDepSelectSidenav = function (id) {
		// Set data for $scope.selectDep
		$http.get(loc + "dep-select-single/" + id).then(function (response) {
			$scope.selectDep = response.data.record[0];
			console.log($scope.selectDep);

			// Open sidenav
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
		// Set data for $scope.updateDep
		$http.get(loc + "dep-select-single/" + id).then(function (response) {
			$scope.updateDep = response.data.record[0];

			// Open sidenav
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
				// Reload data
				$scope.loadDeps();

				// Close sidenav
				$scope.closeDepSelectSidenav();

				// Show toast
				var toast = $mdToast.simple().textContent('Deleted!');
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