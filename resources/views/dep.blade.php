@extends('master')

@section('content')
	<md-list>
		<div layout="row">
			<!-- <md-subheader class="md-no-sticky">Departments</md-subheader> -->
			<span flex></span>
			<md-button class="md-raised md-primary md-fab" ng-click="toggleDepInsertSidenav()" style="margin-right:16px">
				<md-tooltip md-direction="left">Add new department</md-tooltip>
				<i class="material-icons">add</i>
			</md-button>
		</div>
		<div>
			<md-list-item style="padding:0px 16px; left:-16px">
				<img ng-src="" class="md-avatar" style="visibility:hidden">
				<p><md-subheader>Name</md-subheader></p>
				<p><md-subheader>Phone</md-subheader></p>
				<p><md-subheader>Manager</md-subheader></p>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">info_outline</i></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">edit</i></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><i class="material-icons">delete</i></md-button>
			</md-list-item>
		</div>
		<div ng-repeat="item in deps">
			<md-divider></md-divider>
			<md-list-item ng-click="dosomething()">
				<!-- <md-checkbox class="secondary"></md-checkbox> -->
				<img ng-src="images/avatar.jpg" class="md-avatar">
				<p>@{{item.dep_name}}</p>
				<p>@{{item.dep_phone}}</p>
				<p>@{{item.mng_name}}</p>
				<md-button class="md-raised" ng-click="openDepSelectSidenav(item.dep_id)" style="min-width:0px"><i class="material-icons">info_outline</i></md-button>
				<md-button class="md-raised" href="emp/@{{item.dep_id}}" style="min-width:0px"><i class="material-icons" style="margin-top:6px">people</i></md-button>
				<md-button class="md-raised" ng-click="openDepUpdateSidenav(item.dep_id)" style="min-width:0px"><i class="material-icons">edit</i></md-button>
				<md-button class="md-raised" ng-click="showDepDeleteDialog(item.dep_id)" style="min-width:0px"><i class="material-icons">delete</i></md-button>
			</md-list-item>
		</div>
	</md-list>
@endsection

@include('sidenavs.dep-select')
@include('sidenavs.dep-insert')
@include('sidenavs.dep-update')

@section('js')
	<script type="text/javascript" src="{{url('js/dep.js')}}"></script>
@endsection