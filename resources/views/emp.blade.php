@extends('master')

@section('content')
	<b class='title'>EMPLOYEES</b>
	<div style="height:30px"></div>

	<div ng-controller="selectCtrl" style="padding:20px 30px 0px 30px;border-left:3px solid rgb(96,125,139);background-color: rgb(247,248,249);margin-bottom:25px">
		<p style="margin:0px;font-size: 120%;color: rgb(96,125,139);">Search</p>
		<div layout="row">
			<md-input-container flex="25" style="margin-bottom:0px">
				<label>{{trans('common.employee_name')}}</label>
				<input type="text" ng-model="search.nam" ng-change="loadEmps()">
			</md-input-container>
			<md-input-container flex="20" style="margin-bottom:0px">
				<label>{{trans('common.department')}}</label>
				<md-select ng-model="search.dep" ng-change="loadEmps()">
					<md-option ng-value="0">{{trans('common.all_departments')}}</md-option>
					<md-divider></md-divider>
					<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
				</md-select>
			</md-input-container>
			<md-button class="md-raised" ng-click="clearSearch()" style="height:10px;top:6px">{{trans('common.clear')}}</md-button>
		</div>
	</div>

	<!-- <div style="margin:40px 0px;border-top:3px solid rgb(96,125,139);background-color: rgb(247,248,249);">
			<p style="margin:10px 0px 0px 30px;font-size: 120%;color: rgb(96,125,139);">Latest Members</p>
			<div layout="row" layout-align="space-around start">
				<div ng-repeat="item in emps" style="margin:20px;padding:5px" layout="column" layout-align="space-around center">
					<img src="@{{item.emp_photo}}" style="width:130px;height:130px;border-radius:50%;">
					<p style="margin:0px"><b>@{{item.emp_name}}</b></p>
					<p style="margin:0px">@{{item.emp_job}}</p>
				</div>
			</div>
		</div> -->

	<p id="para" hidden>{{$dep}}</p>

	<!-- <span>Result:</span> -->
	<div layout="row"  layout-align="space-between none">
		<div>
			<md-button ng-click="previous()" ng-if="page!=1">previous</md-button>
			<md-button disabled="true" ng-if="page==1">previous</md-button>
			<span>Page @{{page}}</span>
			<md-button ng-click="next()">next</md-button>
			<md-input-container flex="20">
				<label>Per page</label>
				<md-select ng-model="perPage" ng-change="loadEmps()">
					<md-option ng-value="5">5</md-option>
					<md-option ng-value="10">10</md-option>
					<md-option ng-value="15">15</md-option>
					<md-option ng-value="20">20</md-option>
				</md-select>
			</md-input-container>
		</div>
	@if ($status == 'y')
		<!-- <span flex></span> -->
		<md-button class="md-raised md-primary md-fab" ng-click="toggleEmpInsertSidenav()" style="margin-right:16px">
			<md-tooltip md-direction="left">{{trans('common.add_new_employee')}}</md-tooltip>
			<i class="material-icons">add</i>
		</md-button>
	@endif
	</div>

	<md-list>
		<div>
			<md-list-item style="padding:0px 16px; left:-16px">
				<img ng-src="" class="md-avatar" style="visibility:hidden">
				<p><md-subheader>{{trans('common.name')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.job_title')}}</md-subheader></p>
				<!-- <p><md-subheader>Email</md-subheader></p> -->
				<p><md-subheader>{{trans('common.department')}}</md-subheader></p>
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
				<img ng-src="@{{item.emp_photo}}" class="md-avatar">
				<p>@{{item.emp_name}}</p>
				<p>@{{item.emp_job}}</p>
				<!-- <p>@{{item.emp_email}}</p> -->
				<p>@{{item.dep_name}}</p>

				<md-button class="md-primary md-hue-2" ng-click="openEmpSelectSidenav(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.info')}}</md-tooltip>
					<i class="material-icons">info</i>
				</md-button>
			@if ($status == 'y')
				<md-button class="md-primary md-hue-2" ng-click="openEmpUpdateSidenav(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.modify')}}</md-tooltip>
					<i class="material-icons">edit</i>
				</md-button>
				<md-button class="md-primary md-hue-2" ng-click="showEmpDeleteDialog(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.delete')}}</md-tooltip>
					<i class="material-icons">delete</i>
				</md-button>
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