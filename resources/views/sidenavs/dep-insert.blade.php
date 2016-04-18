<md-sidenav md-component-id="dep-insert-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">Add New Department</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="insertForm" ng-submit="submitNewDep()">
			<md-input-container class="md-block">
				<label>Name</label>
				<input type="text" name="name" ng-model="newDep.name" required md-maxlength="45" maxlength="45" md-sidenav-focus>
				<div ng-messages="insertForm.name.$error">
					<div ng-message="required">Name is required.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>Phone</label>
				<input type="tel" name="phone" ng-model="newDep.phone">
			</md-input-container>
			<md-input-container class="md-block">
				<label>Address</label>
				<input type="text" name="address" ng-model="newDep.address" md-maxlength="90" maxlength="90">
			</md-input-container>
			<div ng-controller="selectCtrl">
				<md-input-container class="md-block">
					<label>Manager</label>
					<md-select ng-model="newDep.manager" name="manager">
						<md-option ng-value="item.emp_id" ng-repeat="item in emps">@{{item.emp_name}}</md-option>
					</md-select>
				</md-input-container>
			</div>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Submit</md-button>
				<md-button class="md-raised" ng-click="toggleDepInsertSidenav()">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>