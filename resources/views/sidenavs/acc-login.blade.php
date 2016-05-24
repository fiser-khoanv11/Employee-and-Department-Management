<md-sidenav md-component-id="login-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">{{trans('common.log_in')}}</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="loginForm" ng-submit="login()">
			<md-input-container class="md-block">
				<label>{{trans('common.email')}}</label>
				<input type="email" name="email" ng-model="acc.email" required md-sidenav-focus>
				<div ng-messages="loginForm.email.$error">
					<div ng-message="required">Email is required.</div>
					<div ng-message="email">Email is invalid.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.password')}}</label>
				<input type="password" name="password" ng-model="acc.password" required>
				<div ng-messages="loginForm.password.$error">
					<div ng-message="required">Password is required.</div>
				</div>
			</md-input-container>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.log_in')}}</md-button>
				<md-button class="md-raised" ng-click="toggleLoginSidenav()">{{trans('common.cancel')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>