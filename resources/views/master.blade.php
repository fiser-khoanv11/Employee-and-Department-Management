<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Directory</title>
	@include('libs.css')
</head>
<body ng-app="App" ng-controller="AppCtrl" ng-cloak style="background-color:grey">
	<!--
		Your HTML content here
	-->
	<div layout="column">
		<md-toolbar ng-controller="ToolbarCtrl">
			<div class="md-toolbar-tools">
				<span>Employee Directory</span>
				<span flex></span>
				<md-button class="@{{tab.emp}}" href="{{url('/emp')}}">Employees</md-button>
				<md-button class="@{{tab.dep}}" href="{{url('/dep')}}">Departments</md-button>
			@if ($status == 'n')
				<md-button class="@{{tab.log}}" ng-click="toggleLoginSidenav()">Log in</md-button>
			@elseif ($status == 'y')
				<md-button href="{{url('acc-logout')}}">Log out</md-button>
				<md-button ng-click="toggleAccInsertSidenav()">Add Admin</md-button>
			@endif
			</div>
		</md-toolbar>
		<md-content style="padding:30px 50px; margin:0px 50px; border-radius:0px 0px 15px 15px">
			@yield('content')
		</md-content>
	</div>

	@if ($status == 'n')
		@include('sidenavs.acc-login')
	@elseif ($status == 'y')
		@include('sidenavs.acc-insert')
	@endif

	@include('libs.js')
	
	<!-- Your application bootstrap  -->
	<script type="text/javascript" src="{{url('js/common.js')}}"></script>
	@yield('js')
	
</body>
</html>

<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
-->