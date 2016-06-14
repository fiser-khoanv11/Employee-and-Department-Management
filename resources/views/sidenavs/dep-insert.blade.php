<md-sidenav md-component-id="dep-insert-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">{{trans('common.add_new_department')}}</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="insertForm" ng-submit="submitNewDep()">
			<md-input-container class="md-block">
				<label>{{trans('common.name')}}</label>
				<input type="text" name="name" ng-model="newDep.name" required md-maxlength="45" maxlength="45">
				<div ng-messages="insertForm.name.$error">
					<div ng-message="required">{{trans('common.required')}}</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.phone')}}</label>
				<input type="tel" name="phone" ng-model="newDep.phone">
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.address')}}</label>
				<input type="text" name="address" ng-model="newDep.address" md-maxlength="90" maxlength="90">
			</md-input-container>
			<div ng-controller="selectCtrl">
				<md-input-container class="md-block">
					<label>{{trans('common.manager')}}</label>
					<md-select ng-model="newDep.manager" name="manager">
						<md-option ng-value="item.emp_id" ng-repeat="item in emps">@{{item.emp_name}}</md-option>
					</md-select>
				</md-input-container>
			</div>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.submit')}}</md-button>
				<md-button class="md-raised" ng-click="toggleDepInsertSidenav()">{{trans('common.cancel')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>