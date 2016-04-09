<md-sidenav md-component-id="acc-update-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">Change Password</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="updateForm" ng-submit="submitUpdateAcc()">
			<md-input-container class="md-block">
				<label>Old Password</label>
				<input type="password" name="old" ng-model="pass.old" required md-minlength="5" md-maxlength="45" md-sidenav-focus>
				<div ng-messages="updateForm.old.$error">
					<div ng-message="required">Required.</div>
					<div ng-message="md-maxlength">Password must have 5 - 45 characters.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>New Password</label>
				<input type="password" name="new" ng-model="pass.new" required md-minlength="5" md-maxlength="45">
				<div ng-messages="updateForm.new.$error">
					<div ng-message="required">Required.</div>
					<div ng-message="md-maxlength">Password must have 5 - 45 characters.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>Confirm</label>
				<input type="password" name="confirm" ng-model="pass.confirm" required md-minlength="5" md-maxlength="45">
				<div ng-messages="updateForm.confirm.$error">
					<div ng-message="required">Required.</div>
					<div ng-message="md-maxlength">Password must have 5 - 45 characters.</div>
				</div>
			</md-input-container>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Save</md-button>
				<md-button class="md-raised" ng-click="toggleAccUpdateSidenav()">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>