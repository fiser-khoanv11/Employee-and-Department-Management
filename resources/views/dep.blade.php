@extends('master')

@section('content')
	<b class='title'>DEPARTMENTS</b>
	<div style="height:30px"></div>

	<md-list>
		<div layout="row">
			<!-- <md-subheader class="md-no-sticky">Departments</md-subheader> -->
			<span flex></span>
		@if ($status == 'y')
			<md-button class="md-raised md-primary md-fab" ng-click="toggleDepInsertSidenav()" style="margin-right:16px">
				<md-tooltip md-direction="left">{{trans('common.add_new_department')}}</md-tooltip>
				<i class="material-icons">add</i>
			</md-button>
		@endif
		</div>

		<md-button ng-click="previous()" ng-if="page!=1">previous</md-button>
		<md-button disabled="true" ng-if="page==1">previous</md-button>
		<span>Page @{{page}}</span>
		<md-button ng-click="next()">next</md-button>
	
		<div>
			<md-list-item style="padding:0px 16px; left:-16px">
				<!-- <img ng-src="" class="md-avatar" style="visibility:hidden"> -->
				<p><md-subheader>{{trans('common.name')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.address')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.manager')}}</md-subheader></p>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
			@if ($status == 'y')
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">edit</i></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">delete</i></md-button>
			@endif
			</md-list-item>
		</div>
		<div ng-repeat="item in deps">
			<md-divider></md-divider>
			<md-list-item ng-click="dosomething()">
				<!-- <md-checkbox class="secondary"></md-checkbox> -->
				<!-- <img ng-src="images/avatar.jpg" class="md-avatar"> -->
				<p>@{{item.dep_name}}</p>
				<p>@{{item.dep_address}}</p>
				<p>@{{item.mng_name}}</p>
				<md-button class="md-primary md-hue-2" ng-click="openDepSelectSidenav(item.dep_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.info')}}</md-tooltip>
					<i class="material-icons">info</i>
				</md-button>
				<md-button class="md-primary md-hue-2" href="emp/@{{item.dep_id}}" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.employee')}}</md-tooltip>
					<i class="material-icons" style="margin-top:6px">people</i>
				</md-button>
			@if ($status == 'y')	
				<md-button class="md-primary md-hue-2" ng-click="openDepUpdateSidenav(item.dep_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.modify')}}</md-tooltip>
					<i class="material-icons">edit</i>
				</md-button>
				<md-button class="md-primary md-hue-2" ng-click="showDepDeleteDialog(item.dep_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.delete')}}</md-tooltip>
					<i class="material-icons">delete</i>
				</md-button>
			@endif	
			</md-list-item>
		</div>
	</md-list>
@endsection

@include('sidenavs.dep-select')
@if ($status == 'y')
	@include('sidenavs.dep-insert')
	@include('sidenavs.dep-update')
@endif

@section('js')
	<script type="text/javascript" src="{{url('js/dep.js')}}"></script>
@endsection