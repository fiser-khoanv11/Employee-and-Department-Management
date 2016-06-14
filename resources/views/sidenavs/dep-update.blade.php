<md-sidenav md-component-id="dep-update-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">{{trans('common.modify_department')}}</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="updateForm" ng-submit="submitUpdateDep()">
			<!-- <md-input-container layout="row">
				<input type="file" name="fileToUpload" id="fileToUpload">
			</md-input-container> -->
		   	<md-input-container class="md-block">
		        <label>{{trans('common.name')}}</label>
		        <input type="text" name="name" ng-model="updateDep.dep_name" required md-maxlength="45" maxlength="45">
		        <div ng-messages="updateForm.name.$error">
					<div ng-message="required">{{trans('common.required')}}</div>
				</div>
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>{{trans('common.phone')}}</label>
		        <input type="tel" ng-model="updateDep.dep_phone">
		    </md-input-container>
		    <md-input-container class="md-block">
				<label>{{trans('common.address')}}</label>
				<input type="text" name="address" ng-model="updateDep.dep_address" md-maxlength="90" maxlength="90">
			</md-input-container>
		    <div ng-controller="selectCtrl">
				<md-input-container class="md-block">
					<label>{{trans('common.manager')}}</label>
					<md-select ng-model="updateDep.mng_id" name="manager">
						<md-option ng-value="item.emp_id" ng-repeat="item in emps">@{{item.emp_name}}</md-option>
					</md-select>
				</md-input-container>
			</div>
		    <div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.save')}}</md-button>
				<md-button class="md-raised" ng-click="closeDepUpdateSidenav()">{{trans('common.cancel')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>