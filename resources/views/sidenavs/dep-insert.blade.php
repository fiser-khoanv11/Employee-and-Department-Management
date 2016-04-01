<md-sidenav md-component-id="dep-insert-sidenav" class="md-sidenav-right">
	<md-toolbar>
		<p class="md-toolbar-tools">Add New Department</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="insertForm" ng-submit="submitNewDep()">
			<md-input-container class="md-block">
				<label>Name</label>
				<input type="text" name="name" ng-model="newDep.name" required md-maxlength="45" md-sidenav-focus>
				<div ng-messages="insertForm.name.$error">
					<div ng-message="required">Name is required.</div>
					<div ng-message="md-maxlength">Name has to be less than 45 characters long.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>Phone</label>
				<input type="tel" name="phone" ng-model="newDep.phone">
			</md-input-container>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Submit</md-button>
				<md-button class="md-raised" ng-click="toggleDepInsertSidenav()">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>