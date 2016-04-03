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
			<md-subheader class="md-no-sticky">Employees</md-subheader>
			<span flex></span>
			<md-button class="md-raised md-primary md-fab" ng-click="toggleEmpInsertSidenav()" style="margin-right:16px">
				<md-tooltip md-direction="left">Add new employee</md-tooltip>
				<i class="material-icons">add</i>
			</md-button>
		</div>
		<div ng-repeat="item in emps">
			<md-divider></md-divider>
			<md-list-item ng-click="something()">
				<!-- <md-checkbox class="secondary"></md-checkbox> -->
				<img ng-src="{{url('images/avatar.jpg')}}" class="md-avatar">
				<p>@{{item.emp_name}}</p>
				<p>@{{item.emp_job}}</p>
				<p>@{{item.emp_phone}}</p>
				<p>@{{item.emp_email}}</p>
				<p>@{{item.dep_id}}</p>
				<md-button class="md-raised" ng-click="toggleEmpSelectSidenav(item.emp_id)" style="min-width:0px"><i class="material-icons">info_outline</i></md-button>
				<md-button class="md-raised" ng-click="toggleEmpUpdateSidenav(item.emp_id)" style="min-width:0px"><i class="material-icons">edit</i></md-button>
				<!-- <i class="material-icons" ng-click="toggleEmpUpdateSidenav(item.emp_id)">edit</i> -->
				<md-button class="md-raised" ng-click="showEmpDeleteDialog(item.emp_id, 0)" style="min-width:0px"><i class="material-icons">delete</i></md-button>
				<!-- <i class="material-icons" ng-click="showEmpDeleteDialog(item.emp_id)">delete</i> -->
			</md-list-item>
		</div>
	</md-list>
@endsection

@include('sidenavs.emp-select')
@include('sidenavs.emp-insert')
@include('sidenavs.emp-update')

@section('js')
	<script type="text/javascript" src="{{url('js/emp.js')}}"></script>
@endsection