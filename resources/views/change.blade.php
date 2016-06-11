@extends('master')

@section('content')
	<md-toolbar>
		<p class="md-toolbar-tools">You must change password</p>
	</md-toolbar>
	<md-content layout-padding>
		<form name="updateForm" ng-submit="submitUpdateAcc()">
			<md-input-container class="md-block">
				<label>{{trans('common.old_password')}}</label>
				<input type="password" name="old" ng-model="pass.old" required md-maxlength="45" minlength="5" maxlength="45">
				<div ng-messages="updateForm.old.$error">
					<div ng-message="required">Required.</div>
					<div ng-message="minlength">Password must have 5 - 45 characters.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.new_password')}}</label>
				<input type="password" name="new" ng-model="pass.new" required md-maxlength="45" minlength="5" maxlength="45">
				<div ng-messages="updateForm.new.$error">
					<div ng-message="required">Required.</div>
					<div ng-message="minlength">Password must have 5 - 45 characters.</div>
				</div>
			</md-input-container>
			<md-input-container class="md-block">
				<label>{{trans('common.confirm_password')}}</label>
				<input type="password" name="confirm" ng-model="pass.confirm" required md-maxlength="45" minlength="5" maxlength="45">
				<div ng-messages="updateForm.confirm.$error">
					<div ng-message="required">Required.</div>
					<div ng-message="minlength">Password must have 5 - 45 characters.</div>
				</div>
			</md-input-container>
			<div layout="row">
				<span flex></span>
				<md-button type="submit" class="md-raised md-primary">{{trans('common.save')}}</md-button>
				<md-button class="md-raised" ng-click="toggleAccUpdateSidenav()">Dismiss</md-button>
			</div>
		</form>
	</md-content>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/change.js')}}"></script>
@endsection