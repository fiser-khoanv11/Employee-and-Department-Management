@extends('master')

@section('content')
	<div ng-controller="selectCtrl" layout="row">
		<md-input-container flex="25">
			<label>Employee Name</label>
			<input type="text" ng-model="search.nam" ng-change="loadEmps()">
		</md-input-container>
		<md-input-container flex="20">
			<label>Department</label>
			<md-select ng-model="search.dep" ng-change="loadEmps()">
				<md-option ng-value="0">All Departments</md-option>
				<md-divider></md-divider>
				<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
			</md-select>
		</md-input-container>
		<md-button class="md-raised" ng-click="clearSearch()" style="height:10px;top:6px">Clear</md-button>
	</div>

	<p id="para" hidden>{{$dep}}</p>

	<md-list>
		<div layout="row">
			<!-- <md-subheader class="md-no-sticky">Employees</md-subheader> -->
			<span flex></span>
		@if ($status == 'y')
			<md-button class="md-raised md-primary md-fab" ng-click="toggleEmpInsertSidenav()" style="margin-right:16px">
				<md-tooltip md-direction="left">Add new employee</md-tooltip>
				<i class="material-icons">add</i>
			</md-button>
		@endif
		</div>
		<div>
			<md-list-item style="padding:0px 16px; left:-16px">
				<img ng-src="" class="md-avatar" style="visibility:hidden">
				<p><md-subheader>Name</md-subheader></p>
				<p><md-subheader>Job Title</md-subheader></p>
				<!-- <p><md-subheader>Email</md-subheader></p> -->
				<p><md-subheader>Department</md-subheader></p>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
			@if ($status == 'y')	
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
			@endif
			</md-list-item>
		</div>

		<div ng-repeat="item in emps">
			<md-divider></md-divider>
			<md-list-item ng-click="something()">
				<img ng-src="{{url('images/avatar.jpg')}}" class="md-avatar">
				<p>@{{item.emp_name}}</p>
				<p>@{{item.emp_job}}</p>
				<!-- <p>@{{item.emp_email}}</p> -->
				<p>@{{item.dep_name}}</p>

				<md-button class="md-primary md-hue-2" ng-click="openEmpSelectSidenav(item.emp_id)" style="min-width:0px"><i class="material-icons">info</i></md-button>
			@if ($status == 'y')
				<md-button class="md-primary md-hue-2" ng-click="openEmpUpdateSidenav(item.emp_id)" style="min-width:0px"><i class="material-icons">edit</i></md-button>
				<md-button class="md-primary md-hue-2" ng-click="showEmpDeleteDialog(item.emp_id)" style="min-width:0px"><i class="material-icons">delete</i></md-button>
			@endif
			</md-list-item>
		</div>
	</md-list>
@endsection

@include('sidenavs.emp-select')
@if ($status == 'y')
	@include('sidenavs.emp-insert')
	@include('sidenavs.emp-update')
@endif

@section('js')
	<script type="text/javascript" src="{{url('js/emp.js')}}"></script>
@endsection