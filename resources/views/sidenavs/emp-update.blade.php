<md-sidenav md-component-id="emp-update-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">Modify Employee</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="updateForm" ng-submit="submitUpdateEmp()">
			<!-- <md-input-container layout="row">
				<input type="file" name="fileToUpload" id="fileToUpload">
			</md-input-container> -->
		   	<md-input-container class="md-block">
		        <label>Name</label>
		        <input type="text" name="name" ng-model="updateEmp.emp_name" required md-maxlength="45" md-sidenav-focus>
		        <div ng-messages="updateForm.name.$error">
					<div ng-message="required">Name is required.</div>
					<div ng-message="md-maxlength">Name has to be less than 45 characters long.</div>
				</div>
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>Job Title</label>
		        <input type="text" name="job" ng-model="updateEmp.emp_job" required md-maxlength="45">
		        <div ng-messages="updateForm.job.$error">
					<div ng-message="required">Job title is required.</div>
					<div ng-message="md-maxlength">Job title has to be less than 45 characters long.</div>
				</div>
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>Phone</label>
		        <input type="tel" ng-model="updateEmp.emp_phone">
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>Email</label>
		        <input type="email" name="email" ng-model="updateEmp.emp_email">
		        <div ng-messages="updateForm.email.$error">
					<div ng-message="email">Email is invalid.</div>
				</div>
		    </md-input-container>
			<div ng-controller="selectCtrl">
			    <md-input-container class="md-block">
			     	<label>Department</label>
		  			<md-select ng-model="updateEmp.dep_id">
		    			<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
		  			</md-select>
		  			<!-- <select ng-model="updateEmp.dep" ng-options="item.name for item in deps track by item.id"> -->
				</md-input-container>
			</div>
		    <div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Save</md-button>
				<md-button class="md-raised" ng-click="toggleEmpUpdateSidenav(0)">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>