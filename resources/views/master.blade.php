<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Directory</title>
	@include('libs.css')
</head>
<body ng-app="App" ng-controller="AppCtrl" ng-cloak style="background-color:rgb(210,240,219);font-family:'Catamaran'">
	<!--
		Your HTML content here
	-->
	<div layout="column" style="background-color:rgb(210,240,219);padding-bottom:50px">
		<md-toolbar class="md-primary" ng-controller="ToolbarCtrl">
			<div class="md-toolbar-tools">
				<span style="font-family:'Lobster';font-size:x-large">{{trans('common.employee_directory')}}</span>
				<span flex></span>
		@if ($stt != 0)		
				<md-button class="@{{tab.home}}" href="{{url('/home')}}">{{trans('common.home')}}</md-button>
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
							<i class="material-icons">security</i>
						</md-button>
						<md-button class="md-accent md-fab md-mini" style="margin-top:10px" ng-click="changeLanguage()">
							<md-tooltip md-direction="left">{{trans('common.language')}}</md-tooltip>
							<b>{{$lang}}</b>
						</md-button>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="openBottomSheet()">
							<md-tooltip md-direction="left">{{trans('common.about_us')}}</md-tooltip>
							<i class="material-icons">info_outline</i>
						</md-button>
						<md-button class="md-fab md-mini md-accent" style="margin-top:10px" ng-click="showLogoutDialog()">
							<md-tooltip md-direction="left">{{trans('common.log_out')}}</md-tooltip>
							<i class="material-icons">exit_to_app</i>
						</md-button>
				  </md-fab-actions>
				</md-fab-speed-dial>
			@endif
		@endif
			</div>
		</md-toolbar>
		<md-content style="padding:30px 50px; margin:0px 50px; background-color:white">
			<!-- <md-whiteframe class="md-whiteframe-5dp" > -->
				@yield('content')
			<!-- </md-whiteframe> -->
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