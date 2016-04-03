<md-sidenav md-component-id="emp-insert-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">Add New Employee</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="insertForm" ng-submit="submitNewEmp()">
			<md-input-container class="md-block">
				<label>Name</label>
				<input type="text" name="name" ng-model="newEmp.name" required md-maxlength="45" md-sidenav-focus>
				<div ng-messages="insertForm.name.$error">
					<div ng-message="required">Name is required.</div>
					<div ng-message="md-maxlength">Name has to be less than 45 characters long.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>Job Title</label>
				<input type="text" name="job" ng-model="newEmp.job" required md-maxlength="45">
				<div ng-messages="insertForm.job.$error">
					<div ng-message="required">Job title is required.</div>
					<div ng-message="md-maxlength">Job title has to be less than 45 characters long.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>Phone</label>
				<input type="tel" name="phone" ng-model="newEmp.phone">
			</md-input-container>
			<md-input-container class="md-block">
				<label>Email</label>
				<input type="email" name="email" ng-model="newEmp.email">
				<div ng-messages="insertForm.email.$error">
					<div ng-message="email">Email is invalid.</div>
				</div>
			</md-input-container>
			<div ng-controller="selectCtrl">
				<md-input-container class="md-block">
					<label>Department</label>
					<md-select ng-model="newEmp.dep" name="department">
						<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
					</md-select>
				</md-input-container>
			</div>
			<div class="md-block">
				<md-datepicker name="dob" ng-model="newEmp.dob" md-placeholder="Date of Birth"></md-datepicker>
				<p>@{{newEmp.dob}}</p>
			</div>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Submit</md-button>
				<md-button class="md-raised" ng-click="toggleEmpInsertSidenav()">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>