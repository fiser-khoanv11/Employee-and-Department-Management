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
					<p>Name</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">phone</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.dep_phone}}</h3>
					<p>Phone</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">face</i>
				<div class="md-list-item-text">
					<h3>@{{selectDep.mng_id}}</h3>
					<p>Manager</p>
				</div>
		  	</md-list-item>
		</md-list>
		
			<div layout="row">
				<span flex></span>
				<md-button class="md-raised md-primary" ng-click="openDepUpdateSidenav(selectDep.dep_id)">Modify</md-button>
				<md-button class="md-raised md-primary" ng-click="showDepDeleteDialog(selectDep.dep_id)">Delete</md-button>
				<md-button class="md-raised" ng-click="closeDepSelectSidenav()">Close</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>