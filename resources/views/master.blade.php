<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Directory</title>
	@include('libs.css')
</head>
<body ng-app="App" ng-controller="AppCtrl" ng-cloak style="background-color:grey;font-family:'Catamaran'">
	<!--
		Your HTML content here
	-->
	<div layout="column" style="background-color:grey;padding-bottom:50px">
		<md-toolbar class="md-primary" ng-controller="ToolbarCtrl">
			<div class="md-toolbar-tools">
				<span style="font-family:'Lobster';font-size:x-large">{{trans('common.employee_directory')}}</span>
				<span flex></span>
				<md-button class="@{{tab.home}}" href="{{url('/home')}}">{{trans('common.home')}}</md-button>
				<md-button class="@{{tab.emp}}" href="{{url('/emp')}}">{{trans('common.employees')}}</md-button>
				<md-button class="@{{tab.dep}}" href="{{url('/dep')}}">{{trans('common.departments')}}</md-button>
			@if ($status == 'n')
				<md-button ng-click="toggleLoginSidenav()">{{trans('common.log_in')}}</md-button>
			@elseif ($status == 'y')
				<!-- <md-button ng-click="toggleAccInsertSidenav()">Add Admin</md-button>
				<md-button ng-click="toggleAccUpdateSidenav()">Change Password</md-button>
				<md-button ng-click="showLogoutDialog()">Log out</md-button>
				<md-button ng-disabled=""><span style="color:white">Welcome, <b>{{$name}}</b></span></md-button> -->
			
				<md-button ng-click="openBottomSheet()">About Us</md-button>

				<md-fab-speed-dial md-direction="down" class="md-scale" style="top:105px">
					<md-fab-trigger>
						<md-button><span style="color:white"><b>{{$name}}</b></md-button>
					</md-fab-trigger>
					<md-fab-actions>
						<md-button class="md-fab md-mini md-accent" style="margin-top:20px" ng-click="toggleAccInsertSidenav()">
							<md-tooltip md-direction="left">{{trans('common.add_new_account')}}</md-tooltip>
							<i class="material-icons">person_add</i>
						</md-button>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="toggleAccUpdateSidenav()">
							<md-tooltip md-direction="left">{{trans('common.change_password')}}</md-tooltip>
							<i class="material-icons">security</i>
						</md-button>
						<md-button class="md-accent md-fab md-mini" style="margin-top:10px" ng-click="changeLanguage()">
							<md-tooltip md-direction="left">{{trans('common.language')}}</md-tooltip>
							<b>{{$lang}}</b>
						</md-button>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="showLogoutDialog()">
							<md-tooltip md-direction="left">{{trans('common.log_out')}}</md-tooltip>
							<i class="material-icons">exit_to_app</i>
						</md-button>
				  </md-fab-actions>
				</md-fab-speed-dial>
			@endif
			</div>
		</md-toolbar>
		<md-content style="padding:30px 50px; margin:0px 50px; border-radius:0px 0px 15px 15px">
			@yield('content')
		</md-content>
	</div>

	<div ng-controller="AccSidenavCtrl">
		@if ($status == 'n')
			@include('sidenavs.acc-login')
		@elseif ($status == 'y')
			@include('sidenavs.acc-insert')
			@include('sidenavs.acc-update')
		@endif
	</div>

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