<md-sidenav md-component-id="emp-select-sidenav" class="md-sidenav-right" style="width:350px">
	<md-toolbar>
		<p class="md-toolbar-tools">@{{selectEmp.emp_name}}</p>
	</md-toolbar>
	<img ng-src="images/avatar.jpg" style="width:100%">
	<md-content layout-padding>
		<md-list>
			<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">face</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_name}}</h3>
					<p>Name</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">work</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_job}}</h3>
					<p>Job Title</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">phone</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_phone}}</h3>
					<p>Phone</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">email</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.emp_email}}</h3>
					<p>Email</p>
				</div>
		  	</md-list-item>
		  	<md-list-item class="md-2-line">
				<i class="material-icons md-avatar-icon">home</i>
				<div class="md-list-item-text">
					<h3>@{{selectEmp.dep_id}}</h3>
					<p>Department</p>
				</div>
		  	</md-list-item>
		</md-list>
		
			<div layout="row">
				<span flex></span>
				<md-button class="md-raised md-primary" ng-click="toggleEmpUpdateSidenav(selectEmp.emp_id)">Modify</md-button>
				<md-button class="md-raised md-primary" ng-click="showEmpDeleteDialog(selectEmp.emp_id, 1)">Delete</md-button>
				<md-button class="md-raised" ng-click="toggleEmpSelectSidenav(0)">Close</md-button>
			</div>
		</form>
	</md-content>
</md-sidenav>