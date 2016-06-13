<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Directory</title>
	<!-- Angular Material style sheet -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet' type='text/css'>

	<style>
		html, body {
			height: 100%;
		}

		body {
			margin: 0;
			padding: 0;
			width: 100%;
			display: table;
			font-weight: 100;
		}

		.container {
			color: gray;
			text-align: center;
			display: table-cell;
			vertical-align: middle;
			margin-top: 150px;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 150px;
		}
	</style>
</head>
<body ng-app="App" ng-controller="AppCtrl" ng-cloak style="font-family:'Catamaran'">

	<div layout="column">
		<md-toolbar>
			<div class="md-toolbar-tools">
				<span style="font-family:'Lobster';font-size:x-large">Employee Directory</span>
				<span flex></span>
<!-- 				<md-button href="{{url('/emp')}}">Employees</md-button>
				<md-button href="{{url('/dep')}}">Departments</md-button> -->
			</div>
		</md-toolbar>
		<md-content class="container">
			<div class="content">
				<div layout="row"  layout-align="center center">
                <div class="title">404</div>
                <div style="margin-right:50px;"></div>
                <div layout="column" layout-align="center center">
                	<div style="font-size:50px;">ERROR!</div>
                	<div style="font-size:35px;">PAGE NOT FOUND</div>
                </div>
            </div>
		</md-content>
	</div>

	<!-- Angular Material requires Angular.js Libraries -->
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
	<!-- Angular Material Library -->
	<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>

	<script type="text/javascript">
		var app = angular.module('App', ['ngMaterial', 'ngMessages']);

		app.config(function ($mdThemingProvider, $mdDateLocaleProvider) {
			$mdThemingProvider.theme('default')
				.primaryPalette('teal');
				// .dark();
		});

		app.controller('AppCtrl', function ($scope, $mdSidenav, $mdDialog, $http, $mdToast) {
			
		});
	</script>
	
</body>
</html>