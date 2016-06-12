@extends('master')

@section('content')
<div layout="column" layout-align="center center">
	<md-toolbar style="width:45%">
		<p class="md-toolbar-tools">Hi {{$name}}!<br>You must change your password before using this app.</p>
	</md-toolbar>
	<md-content style="width:45%;border:1px solid rgb(96,125,139)" layout-padding>
		<form name="updateForm" ng-submit="submitUpdateAcc()" style="margin:0px">
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
				<md-button class="md-raised" href="acc-logout">Dismiss</md-button>
			</div>
		</form>
	</md-content>
</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/change.js')}}"></script>
@endsection