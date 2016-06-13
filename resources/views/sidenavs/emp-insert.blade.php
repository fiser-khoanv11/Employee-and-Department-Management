<md-sidenav md-component-id="emp-insert-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">{{trans('common.add_new_employee')}}</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="insertForm" ng-submit="submitNewEmp()">

			<div flow-init layout="row" style="padding-bottom:15px">
				<div flex="50">
					<img id="here" flow-img="$flow.files[0]" style="width:100%;border-radius:50%;height:140px"/>
				</div>
				<div flex="50" style="margin-left:20px">
					<md-button flow-btn flow-attrs="{accept:'image/*'}" class="md-raised md-primary">{{trans('common.change')}}</md-button>
					<md-button ng-click="removePhoto('here')" class="md-raised">{{trans('common.remove')}}</md-button>
				</div>
			</div>
			
			<md-input-container class="md-block">
				<label>{{trans('common.name')}}</label>
				<input type="text" name="name" ng-model="newEmp.name" required md-maxlength="45" maxlength="45">
				<div ng-messages="insertForm.name.$error">
					<div ng-message="required">Name is required.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.job_title')}}</label>
				<input type="text" name="job" ng-model="newEmp.job" required md-maxlength="45" maxlength="45">
				<div ng-messages="insertForm.job.$error">
					<div ng-message="required">Job title is required.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.phone')}}</label>
				<input type="tel" name="phone" ng-model="newEmp.phone">
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.email')}}</label>
				<input type="email" name="email" ng-model="newEmp.email">
				<div ng-messages="insertForm.email.$error">
					<div ng-message="email">Email is invalid.</div>
				</div>
			</md-input-container>
			<div ng-controller="selectCtrl">
				<md-input-container class="md-block">
					<label>{{trans('common.department')}}</label>
					<md-select ng-model="newEmp.dep" name="department">
						<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
					</md-select>
				</md-input-container>
			</div>
			<div class="md-block" style="padding:24px 0px">
				<md-datepicker name="dob" ng-model="newEmp.dob" md-placeholder="{{trans('common.dob')}}"></md-datepicker>
			</div>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.submit')}}</md-button>
				<md-button class="md-raised" ng-click="toggleEmpInsertSidenav()">{{trans('common.cancel')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>