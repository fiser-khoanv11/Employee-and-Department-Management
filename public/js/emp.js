app.controller('AppCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {emp:'md-raised', dep:''};
	$scope.newEmp = {name:null, job:null, dob:null, phone:null, email:null, dep:null, photo:null};
	$scope.search = {dep:document.getElementById('para').innerHTML, nam:''};
	var loc = 'http://' + location.host + '/';
	var image = document.getElementById('here');
	// if (image != null) {
		image.src = loc + 'images/default_photo.jpg';
	// }
	var change = 0;
	$scope.page = 1;
	$scope.perPage = 5;

	$scope.loadEmps = function () {
		$str = loc + 'emp-select/' + $scope.page + '/' + $scope.perPage + "/" + $scope.search.dep;

		if ($scope.search.nam != '') {
			$str += '/' + $scope.search.nam;
		}

		$http.get($str).then(function (response) {
			$scope.emps = response.data.records;
		});
	}

	$scope.previous = function () {
		$scope.page --;
		$scope.loadEmps();
	}

	$scope.next = function () {
		$scope.page ++;
		$scope.loadEmps();
	}

	$scope.catchSearch = function () {
		$scope.page = 1;
		$scope.loadEmps();
	}

	$scope.loadEmps();

	$scope.submitNewEmp = function () {
		// If DOB was set, increase it to 1 day before inserting into database
		if ($scope.newEmp.dob != null) {
			$scope.newEmp.dob = new Date($scope.newEmp.dob);
			$scope.newEmp.dob.setDate($scope.newEmp.dob.getDate() + 1);
		}

		// Insert photo
		$scope.newEmp.photo = image.src;

		// Insert into database
		$http({
			method: 'POST',
			url: loc + 'emp-insert',
			data: $scope.newEmp,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function (response) {
			// Reload employees
			$scope.loadEmps();

			// Close sidenav
			$scope.toggleEmpInsertSidenav();

			// Reset form
			$scope.newEmp = {name:null, job:null, dob:null, phone:null, email:null, dep:null, photo:null};
			// document.getElementById('here').src = 'images/default_photo.jpg';
			$scope.removePhoto('here');

			// Show toast
			var toast = $mdToast.simple().textContent('Inserted!')
			$mdToast.show(toast);
		});
	}

	$scope.submitUpdateEmp = function () {
		console.log($scope.updateEmp);

		// Increase DOB to 1 day if it was changed
		if (change == 1) {
			$scope.updateEmp.emp_dob = new Date($scope.updateEmp.emp_dob);
			$scope.updateEmp.emp_dob.setDate($scope.updateEmp.emp_dob.getDate() + 1);
		}

		$scope.updateEmp.emp_photo = document.getElementById('there').src;

		// Update database
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
		change = 0;
		$http.get(loc + "emp-select-single/" + id).then(function (response) {
			$scope.updateEmp = response.data.record[0];
			if ($scope.updateEmp.emp_dob != null) {
				$scope.updateEmp.emp_dob = new Date($scope.updateEmp.emp_dob);
			}
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

	$scope.clearSearch = function () {
		$scope.page = 1;
		$scope.search = {dep:0, nam:''};
		$scope.loadEmps();
	}

	$scope.changeDate = function () {
		change = 1;
		console.log('change');
	}

	$scope.removePhoto = function (id) {
		document.getElementById(id).src = loc + 'images/default_photo.jpg';
	}

	// $scope.checkPhoto = function (id) {
	// 	if (document.getElementById(id).src == 'images/default_photo.jpg') {
	// 		return true;
	// 	}

	// 	return false;
	// }
});

app.controller('selectCtrl', function ($scope, $http) {
	var loc = 'http://' + location.host + '/';

	$http.get(loc + "dep-select-names").then(function (response) {
		$scope.deps = response.data.records;
	});
});