@extends('master')

@section('content')
	<b class='title'>{{trans('common.employees_cap')}}</b>
	<div style="height:30px"></div>

	<div ng-controller="selectCtrl" style="padding:20px 30px 0px 30px;border-left:3px solid rgb(96,125,139);background-color: rgb(247,248,249);margin-bottom:25px">
		<p style="margin:0px;margin-bottom: 5px;font-size: 120%;color: rgb(96,125,139);">{{trans('common.search')}}</p>
		<div layout="row">
			<md-input-container flex="25" style="margin-bottom:0px">
				<label>{{trans('common.employee_name')}}</label>
				<input type="text" ng-model="search.nam" ng-change="setPageToOne()">
			</md-input-container>
			<md-input-container flex="20" style="margin-bottom:0px">
				<label>{{trans('common.department')}}</label>
				<md-select ng-model="search.dep" ng-change="setPageToOne()">
					<md-option ng-value="0">{{trans('common.all_departments')}}</md-option>
					<md-divider></md-divider>
					<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
				</md-select>
			</md-input-container>
			<md-button class="md-raised" ng-click="clearSearch()" style="height:10px;top:6px">{{trans('common.clear')}}</md-button>
		</div>
	</div>

	<p id="para" hidden>{{$dep}}</p>

	<div layout="row"  layout-align="space-between none">
		<div>
			<md-button ng-click="previous()" ng-if="page!=1">{{trans('common.previous')}}</md-button>
			<md-button disabled="true" ng-if="page==1">{{trans('common.previous')}}</md-button>
			<span>{{trans('common.page')}} @{{page}}</span>
			<md-button ng-click="next()" ng-if="!isMax()">{{trans('common.next')}}</md-button>
			<md-button disabled="true" ng-if="isMax()">{{trans('common.next')}}</md-button>
			<md-input-container flex="30">
				<label>{{trans('common.per_page')}}</label>
				<md-select ng-model="perPage" ng-change="setPageToOne()">
					<md-option ng-value="5">5</md-option>
					<md-option ng-value="10">10</md-option>
					<md-option ng-value="15">15</md-option>
					<md-option ng-value="20">20</md-option>
				</md-select>
			</md-input-container>
			<p>Found @{{count}} results</p>
		</div>
	@if ($status == 'y')
		<!-- <span flex></span> -->
		<md-button class="md-raised md-primary md-fab" ng-click="toggleEmpInsertSidenav()" style="margin-right:16px">
			<md-tooltip md-direction="left">{{trans('common.add_new_employee')}}</md-tooltip>
			<md-icon md-svg-src="{{url('icons/ic_add_white_24px.svg')}}"></md-icon>
		</md-button>
	@endif
	</div>

	<md-list>
		<!-- Header -->
		<div>
			<md-list-item style="padding:0px 16px; left:-16px">
				<img ng-src="" class="md-avatar" style="visibility:hidden">
				<p><md-subheader>{{trans('common.name')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.job_title')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.department')}}</md-subheader></p>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
			@if ($status == 'y')	
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
			@endif
			</md-list-item>
		</div>
		<!-- /Header -->

		<div ng-repeat="item in emps">
			<md-divider></md-divider>
			<md-list-item ng-click="something()">
				<img ng-src="@{{item.emp_photo}}" class="md-avatar">
				<p>@{{item.emp_name}}</p>
				<p>@{{item.emp_job}}</p>
				<p>@{{item.dep_name}}</p>

				<md-button class="md-primary md-hue-2" ng-click="openEmpSelectSidenav(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.info')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon>
				</md-button>
			@if ($status == 'y')
				<md-button class="md-primary md-hue-2" ng-click="openEmpUpdateSidenav(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.modify')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_edit_white_24px.svg')}}"></md-icon>
				</md-button>
				<md-button class="md-primary md-hue-2" ng-click="showEmpDeleteDialog(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.delete')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_delete_white_24px.svg')}}"></md-icon>
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