<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('css')
	<title>Employee Directory</title>
</head>
<body ng-app="EmpApp" ng-controller="EmpCtrl" ng-cloak style="background-color:grey">
	<!--
		Your HTML content here
	-->
	<div layout="column">
		<md-toolbar>
			<div class="md-toolbar-tools">
				<span>Employee Directory</span>
				<span flex></span>
				<md-button class="@{{tab.emp}}" href="{{url('/emp')}}">Employees</md-button>
				<md-button class="@{{tab.dep}}" href="{{url('/dep')}}">Departments</md-button>
				<md-button class="@{{tab.log}}" ng-click="toggleLoginSidenav()">Log in</md-button>
				<p>Welcome, {{$session}}</p>
			</div>
		</md-toolbar>
		<md-content style="padding:30px 50px; margin:0px 50px; border-radius:0px 0px 15px 15px">
			@yield('content')
		</md-content>
	</div>

	@include('sidenavs.acc-login')
		
	@include('libs.js')
	
	<!-- Your application bootstrap  -->
	@yield('js')
	
</body>
</html>

<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
-->