<md-sidenav md-component-id="emp-update-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">{{trans('common.modify_employee')}}</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="updateForm" ng-submit="submitUpdateEmp()">
			<!-- <md-input-container layout="row">
				<input type="file" name="fileToUpload" id="fileToUpload">
			</md-input-container> -->
			<div flow-init layout="row" style="padding-bottom:15px">
				<div flex="50">
		  			<img id="there" ng-src="@{{updateEmp.emp_photo}}" flow-img="$flow.files[0]" style="width:100%;border-radius:50%"/>
		  		</div>
		  		<div flex="50" style="margin-left:20px">
		      		<md-button flow-btn flow-attrs="{accept:'image/*'}" class="md-raised md-primary">{{trans('common.change')}}</md-button>
		      		<md-button ng-click="removePhoto('there')" class="md-raised">{{trans('common.remove')}}</md-button>
		      	</div>
			</div>
			
		   	<md-input-container class="md-block">
		        <label>{{trans('common.name')}}</label>
		        <input type="text" name="name" ng-model="updateEmp.emp_name" required md-maxlength="45" maxlength="45">
		        <div ng-messages="updateForm.name.$error">
					<div ng-message="required">Name is required.</div>
				</div>
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>{{trans('common.job_title')}}</label>
		        <input type="text" name="job" ng-model="updateEmp.emp_job" required md-maxlength="45" maxlength="45">
		        <div ng-messages="updateForm.job.$error">
					<div ng-message="required">Job title is required.</div>
				</div>
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>{{trans('common.phone')}}</label>
		        <input type="tel" ng-model="updateEmp.emp_phone">
		    </md-input-container>
		    <md-input-container class="md-block">
		        <label>{{trans('common.email')}}</label>
		        <input type="email" name="email" ng-model="updateEmp.emp_email">
		        <div ng-messages="updateForm.email.$error">
					<div ng-message="email">Email is invalid.</div>
				</div>
		    </md-input-container>
			<div ng-controller="selectCtrl">
			    <md-input-container class="md-block">
			     	<label>{{trans('common.department')}}</label>
		  			<md-select ng-model="updateEmp.dep_id">
		    			<md-option ng-value="item.dep_id" ng-repeat="item in deps">@{{item.dep_name}}</md-option>
		  			</md-select>
				</md-input-container>
			</div>
			<div class="md-block" style="padding:24px 0px">
				<!-- <p>@{{updateEmp.emp_dob}}</p> -->
				<md-datepicker name="dob" ng-model="updateEmp.emp_dob" md-placeholder="{{trans('common.dob')}}" ng-change="changeDate()"></md-datepicker>
			</div>
		    <div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.save')}}</md-button>
				<md-button class="md-raised" ng-click="closeEmpUpdateSidenav()">{{trans('common.cancel')}}</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>