<md-sidenav md-component-id="acc-insert-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">{{trans('common.add_new_account')}}</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="insertAccForm" ng-submit="submitNewAcc()">
			<md-input-container class="md-block">
				<label>{{trans('common.name')}}</label>
				<input type="text" name="name" ng-model="newAcc.name" required md-maxlength="45" md-sidenav-focus>
				<div ng-messages="insertAccForm.name.$error">
					<div ng-message="required">Name is required.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.email')}}</label>
				<input type="email" name="email" ng-model="newAcc.email" required email-used>
				<div ng-messages="insertAccForm.email.$error">
					<div ng-message="required">Email is required.</div>
					<div ng-message="email">Email is invalid.</div>
					<div ng-message="used">This email is used.</div>
				</div>
			</md-input-container>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.submit')}}</md-button>
				<md-button class="md-raised" ng-click="toggleAccInsertSidenav()">{{trans('common.cancel')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>