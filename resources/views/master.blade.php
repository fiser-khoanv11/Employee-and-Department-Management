<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Directory</title>
	<link rel="stylesheet" href="{{url('angular/angular-material.min.css')}}">
	<link rel="stylesheet" href="{{url('css/common.css')}}">
</head>
<body ng-app="App" ng-controller="AppCtrl" ng-cloak style="background-color:rgb(210,240,219);font-family:'Roboto';">
	<div layout="column" style="background-color:rgb(210,240,219);padding-bottom:50px">
		<md-toolbar class="md-primary" ng-controller="ToolbarCtrl">
			<div class="md-toolbar-tools">
				<span style="font-family:'Lobster';font-size:x-large">{{trans('common.employee_directory')}}</span>
				<span flex></span>
		@if ($stt != 0)		
				<md-button class="@{{tab.home}}" href="{{url('/home')}}">{{trans('common.dashboard_cap')}}</md-button>
				<md-button class="@{{tab.emp}}" href="{{url('/emp')}}">{{trans('common.employees')}}</md-button>
				<md-button class="@{{tab.dep}}" href="{{url('/dep')}}">{{trans('common.departments')}}</md-button>
			@if ($status == 'n')
				<md-button ng-click="toggleLoginSidenav()">{{trans('common.log_in')}}</md-button>
			@elseif ($status == 'y')
				<md-button ng-click="toggleAccInsertSidenav()">{{trans('common.add_new_account')}}</md-button>

				<md-fab-speed-dial md-direction="down" class="md-scale" style="top:100px">
					<md-fab-trigger>
						<md-button><span style="color:white"><b>{{$name}}</b></md-button>
					</md-fab-trigger>
					<md-fab-actions>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="toggleAccUpdateSidenav()">
							<md-tooltip md-direction="left">{{trans('common.change_password')}}</md-tooltip>
							<md-icon class="md-avatar-icon" style="color:white" md-svg-src="{{url('icons/ic_security_white_24px.svg')}}"></md-icon>
						</md-button>
						<md-button class="md-accent md-fab md-mini" style="margin-top:10px" ng-click="changeLanguage()">
							<md-tooltip md-direction="left">{{trans('common.language')}}</md-tooltip>
							<b>{{$lang}}</b>
						</md-button>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="openBottomSheet()">
							<md-tooltip md-direction="left">{{trans('common.about_us')}}</md-tooltip>
							<md-icon class="md-avatar-icon" style="color:white" md-svg-src="{{url('icons/ic_info_outline_white_24px.svg')}}"></md-icon>
						</md-button>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="showLogoutDialog()">
							<md-tooltip md-direction="left">{{trans('common.log_out')}}</md-tooltip>
							<md-icon class="md-avatar-icon" style="color:white" md-svg-src="{{url('icons/ic_exit_to_app_white_24px.svg')}}"></md-icon>
						</md-button>
				  </md-fab-actions>
				</md-fab-speed-dial>
			@endif
		@endif
			</div>
		</md-toolbar>
		<md-content style="padding:30px 50px; margin:0px 50px; background-color:white">
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

	
	<!-- Angular Material requires Angular.js Libraries -->
	<script src="{{url('angular/angular.min.js')}}"></script>
	<script src="{{url('angular/angular-animate.min.js')}}"></script>
	<script src="{{url('angular/angular-aria.min.js')}}"></script>
	<script src="{{url('angular/angular-messages.min.js')}}"></script>
	<!-- Angular Material Library -->
	<script src="{{url('angular/angular-material.min.js')}}"></script>
	<!-- Your application bootstrap  -->
	<script src="{{url('js/common.js')}}"></script>
	<script src="{{url('js/ng-flow-standalone.min.js')}}"></script>
	@yield('js')

</body>
</html>

<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
-->