<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Angular Material style sheet -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body ng-app="EmpApp" ng-controller="EmpCtrl" ng-cloak>
	<!--
		Your HTML content here
	-->
	<div layout="column" layout-fill>
		<md-toolbar>
			<div class="md-toolbar-tools">
				<span>Employee Directory</span>
				<span flex></span>
				<md-button class="md-raised" href="{{url('/emp')}}">Employees</md-button>
				<md-button class="md-raised" href="{{url('/dep')}}">Departments</md-button>
				<md-button class="md-raised" ng-click="toggleLoginSidenav()">Log in</md-button>
			</div>
		</md-toolbar>
		<md-content style="padding:30px 80px" id="content">
			@yield('content')
		</md-content>
	</div>

	@include('sidenavs.acc-login')
		
	<!-- Angular Material requires Angular.js Libraries -->
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
	<!-- Angular Material Library -->
	<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
	
	<!-- Your application bootstrap  -->
	@yield('js')
	
</body>
</html>

<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
-->