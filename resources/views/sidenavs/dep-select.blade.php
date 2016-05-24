<md-sidenav md-component-id="dep-select-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">@{{selectDep.dep_name}}</p>
	</md-toolbar>
	<img ng-src="images/cam.jpg" style="width:100%">
	<md-content layout-padding>
		<md-list>
			<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">home</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_name}}</h3>
					<p>{{trans('common.name')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">face</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.mng_name}}</h3>
					<p>{{trans('common.manager')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">phone</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_phone}}</h3>
					<p>{{trans('common.phone')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">place</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_address}}</h3>
					<p>{{trans('common.address')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">people</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.count}}</h3>
					<p>Count</p>
				</div>
		  	</md-list-item>
		</md-list>
		
			<div layout="row">
				<span flex></span>
			@if ($status == 'y')
				<md-button class="md-raised md-primary" ng-click="openDepUpdateSidenav(selectDep.dep_id)">{{trans('common.modify')}}</md-button>
				<md-button class="md-raised md-primary" ng-click="showDepDeleteDialog(selectDep.dep_id)">{{trans('common.delete')}}</md-button>
			@endif
				<md-button class="md-raised" ng-click="closeDepSelectSidenav()">{{trans('common.close')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>