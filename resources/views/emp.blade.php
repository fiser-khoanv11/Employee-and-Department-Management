@extends('master')

@section('content')
	<div ng-controller="selectCtrl" layout="row">
		<md-input-container flex="25">
			<label>{{trans('common.employee_name')}}</label>
			<input type="text" ng-model="search.nam" ng-change="loadEmps()">
		</md-input-container>
		<md-input-container flex="20">
			<label>{{trans('common.department')}}</label>
			<md-select ng-model="search.dep" ng-change="loadEmps()">
				<md-option ng-value="0">{{trans('common.all_departments')}}</md-option>
				<md-divider></md-divider>
				<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
			</md-select>
		</md-input-container>
		<md-button class="md-raised" ng-click="clearSearch()" style="height:10px;top:6px">{{trans('common.clear')}}</md-button>

	@if ($status == 'y')
		@if ($stt == '1')
			<span flex></span>
			<md-button class="md-raised md-primary md-fab" ng-click="toggleEmpInsertSidenav()" style="margin-right:16px">
				<md-tooltip md-direction="left">{{trans('common.add_new_employee')}}</md-tooltip>
				<i class="material-icons">add</i>
			</md-button>
		@endif
	@endif
	</div>

	<p id="para" hidden>{{$dep}}</p>

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
				@if($stt == '0')
				<md-button class="md-primary md-hue-2" ng-disabled="true" style="min-width:0px">			
					<i class="material-icons">edit</i>
				</md-button>
				<md-button class="md-primary md-hue-2"  ng-disabled="true" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.delete')}}</md-tooltip>
					<i class="material-icons">delete</i>
				</md-button>
				@elseif($stt == '1')
				<md-button class="md-primary md-hue-2" ng-click="openEmpUpdateSidenav(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.modify')}}</md-tooltip>
					<i class="material-icons">edit</i>
				</md-button>
				<md-button class="md-primary md-hue-2" ng-click="showEmpDeleteDialog(item.emp_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.delete')}}</md-tooltip>
					<i class="material-icons">delete</i>
				</md-button>
				@endif
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