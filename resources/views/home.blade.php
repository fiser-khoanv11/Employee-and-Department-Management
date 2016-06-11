@extends('master')

@section('content')
	<style type="text/css">
		.round{
			width:120px;
			border-radius:50%;
			padding-right:10px;
		}
		.number{
			font-size:50px;
			color:#F5F5F5;
		}
		.list{
			font-size:20px;
			color:#D3D3D3;
			text-align: right;
		}
		
	</style>
	<div layout="column" layout-align="center stretch">
		<div layout="row" style="padding-top:20px;padding-bottom:20px;" layout-align="space-around center">
			
			<div class="flex-30">
				<div layout="row" layout-align="space-around center" style="background-color:#00BCD4;padding:10px;">
					<img class="round" src="{{url('images/staff.png')}}">
					<div>
						<div class="number">@{{count.emp}}</div>
						<div class="list">Employees</div>
					</div>
				</div>
			</div>

			<div class="flex-30" >
				<div  layout="row" layout-align="space-around center" style="background-color:#81C04E;padding:10px;">
					<img class="round" src="{{url('images/staff.png')}}">
					<div>
						<div class="number">@{{count.dep}}</div>
						<div class="list">Departments</div>
					</div>
				</div>
			</div>

			<div class="flex-30">
				<div layout="row" layout-align="space-around center" style="background-color:#9258AC;padding:10px;">
					<img class="round" src="{{url('images/staff.png')}}">
					<div>
						<div class="number">@{{count.acc}}</div>
						<div class="list">Users</div>
					</div>
				</div>
			</div>

		</div>

		<div style="margin-left:17px;margin-right:17px;"><img style="width:100%;" src="{{url('images/background.jpg')}}"></div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/home.js')}}"></script>
@endsection