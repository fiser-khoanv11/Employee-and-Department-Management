<md-sidenav md-component-id="login-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">Login</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="loginForm" ng-submit="something()">
			<md-input-container class="md-block">
				<label>Email</label>
				<input type="email" name="email" ng-model="acc.email" required md-sidenav-focus>
				<div ng-messages="loginForm.email.$error">
					<div ng-message="required">Email is required.</div>
					<div ng-message="email">Email is invalid.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>Password</label>
				<input type="password" name="pass" ng-model="acc.pass" required>
				<div ng-messages="loginForm.pass.$error">
					<div ng-message="required">Password is required.</div>
				</div>
			</md-input-container>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">Login</md-button>
				<md-button class="md-raised" ng-click="toggleLoginSidenav()">Cancel</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>