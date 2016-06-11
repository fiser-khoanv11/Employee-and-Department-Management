<md-sidenav md-component-id="emp-select-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">@{{selectEmp.emp_name}}</p>
	</md-toolbar>

	<md-content layout-padding>
		<div layout="row">
			<div flex="50">
				<img ng-src="@{{selectEmp.emp_photo}}" style="width:100%;border-radius:50%">
			</div>
			<div flex="50">
				<md-list>
					<md-list-item class="md-2-line">
						<i class="material-icons md-avatar-icon">face</i>
						<div class="md-list-item-text">
							<h3>@{{selectEmp.emp_name}}</h3>
							<p>{{trans('common.name')}}</p>
						</div>
				  	</md-list-item>
				  	<md-list-item class="md-2-line">
						<i class="material-icons md-avatar-icon">work</i>
						<div class="md-list-item-text">
							<h3>@{{selectEmp.emp_job}}</h3>
							<p>{{trans('common.job_title')}}</p>
						</div>
				  	</md-list-item>
				</md-list>
			</div>
		</div>

		<md-list>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">cake</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_dob}}</h3>
					<p>{{trans('common.dob')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">phone</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_phone}}</h3>
					<p>{{trans('common.phone')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">email</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_email}}</h3>
					<p>{{trans('common.email')}}</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">home</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.dep_name}}</h3>
					<p>{{trans('common.department')}}</p>
				</div>
		  	</md-list-item>
		</md-list>
		
		<div layout="row">
			<span flex></span>
		@if ($status == 'y')
			<md-button class="md-raised md-primary" ng-click="openEmpUpdateSidenav(selectEmp.emp_id)">{{trans('common.modify')}}</md-button>
			<md-button class="md-raised md-primary" ng-click="showEmpDeleteDialog(selectEmp.emp_id)">{{trans('common.delete')}}</md-button>
		@endif
			<md-button class="md-raised" ng-click="closeEmpSelectSidenav()">{{trans('common.close')}}</md-button>
		</div>
	</md-content>
</md-sidenav>