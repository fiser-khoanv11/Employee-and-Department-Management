@extends('master')

@section('content')
	<md-list>
		<div layout="row">
			<!-- <md-subheader class="md-no-sticky">Employees</md-subheader> -->
			<span flex></span>
			<md-button class="md-raised md-primary md-fab" ng-click="toggleDepInsertSidenav()" style="margin-right:16px">
				<md-tooltip md-direction="left">Add new department</md-tooltip>
				<i class="material-icons">add</i>
			</md-button>
		</div>
		<div ng-repeat="item in deps">
			<md-divider></md-divider>
			<md-list-item ng-click="dosomething()">
				<!-- <md-checkbox class="secondary"></md-checkbox> -->
				<img ng-src="images/avatar.jpg" class="md-avatar">
				<p>@{{item.name}}</p>
				<p>@{{item.phone}}</p>
				<md-button class="md-raised" ng-click="toggleDepUpdateSidenav(item.id)" style="min-width:0px"><i class="material-icons">edit</i></md-button>
				<md-button class="md-raised" ng-click="showDepDeleteDialog(item.id)" style="min-width:0px"><i class="material-icons">delete</i></md-button>
			</md-list-item>
		</div>
	</md-list>
@endsection

@include('sidenavs.dep-insert')
@include('sidenavs.dep-update')

@section('js')
	<script type="text/javascript" src="js/dep.js"></script>
@endsection