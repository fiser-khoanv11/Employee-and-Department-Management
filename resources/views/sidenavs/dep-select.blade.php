<md-sidenav md-component-id="dep-select-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">@{{selectDep.dep_name}}</p>
	</md-toolbar>
	<!-- <img ng-src="images/cam.jpg" style="width:100%"> -->
	<md-content layout-padding>
		<md-list>
			<md-list-item class="md-2-line">
				<md-icon class="md-avatar-icon" md-svg-src="{{url('icons/ic_location_city_white_24px.svg')}}"></md-icon>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_name}}</h3>
					<p>{{trans('common.name')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<md-icon class="md-avatar-icon" md-svg-src="{{url('icons/ic_face_white_24px.svg')}}"></md-icon>
				<div class="md-list-item-text">
					<h3>@{{selectDep.mng_name}}</h3>
					<p>{{trans('common.manager')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<md-icon class="md-avatar-icon" md-svg-src="{{url('icons/ic_phone_white_24px.svg')}}"></md-icon>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_phone}}</h3>
					<p>{{trans('common.phone')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<md-icon class="md-avatar-icon" md-svg-src="{{url('icons/ic_location_on_white_24px.svg')}}"></md-icon>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_address}}</h3>
					<p>{{trans('common.address')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<md-icon class="md-avatar-icon" md-svg-src="{{url('icons/ic_people_white_24px.svg')}}"></md-icon>
				<div class="md-list-item-text">
					<h3>@{{selectDep.count}}</h3>
					<p>{{trans('common.count')}}</p>
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