var app = angular.module('App', ['ngMaterial', 'ngMessages']);

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

app.controller('ToolbarCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.toggleLoginSidenav = function () {
		$mdSidenav('login-sidenav').toggle();
	}

	$scope.toggleAccInsertSidenav = function () {
		$mdSidenav('acc-insert-sidenav').toggle();	
	}
});