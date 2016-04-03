<md-sidenav md-component-id="dep-update-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">Modify Department</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="updateForm" ng-submit="submitUpdateDep()">
			<!-- <md-input-container layout="row">
				<input type="file" name="fileToUpload" id="fileToUpload">
			</md-input-container> -->
		   	<md-input-container class="md-block">
		        <label>Name</label>
		        <input type="text" name="name" ng-model="updateDep.dep_name" required md-maxlength="45" md-sidenav-focus>
		        <div ng-messages="updateForm.name.$error">
					<div ng-message="required">Name is required.</div>
					<div ng-message="md-maxlength">Name has to be less than 45 characters long.</div>
				</div>
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>Phone</label>
		        <input type="tel" ng-model="updateDep.dep_phone">
		    </md-input-container>
		    <div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Save</md-button>
				<md-button class="md-raised" ng-click="toggleDepUpdateSidenav(0)">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>