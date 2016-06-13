@extends('master')

@section('content')
	<style type="text/css">
		.round{
			width:40%;
			border-radius:50%;
			/*padding-right:10px;*/
		}

		.number{
			margin: 0px;
			font-size: 50px;
			color: rgb(96,125,139);
			/*float: right;*/
		}

		.list{
			font-size: 20px;
			color: rgb(96,125,139);
			text-align: right;
			margin: 0px;
		}

		.block {
			background-color: rgb(247,248,249);
			border: 1px solid rgb(147,170,181);
			border-bottom: none;
			padding: 10px;
		}

		.bottom-link {
			height: 28px;
			background-color: rgb(96,125,139);
		}

		.link {
			text-decoration: none;
			margin: 0px;
			color: white;
		}
		
	</style>
	
	<b class='title'>{{trans('common.dashboard_cap')}}</b>
	<div style="height:30px"></div>

	<!-- <div layout="column" layout-align="center stretch"> -->
		<div layout="row" style="padding-top:20px 0px" layout-align="space-between center">
			<md-whiteframe class="flex-30 md-whiteframe-5dp">
				<div layout="row" layout-align="space-around center" class="block">
					<img class="round" src="{{url('images/photo/04-512.png')}}">
					<div>
						<p class="number">@{{count.emp}}</p>
						<p class="list">{{trans('common.employees')}}</p>
					</div>
				</div>
				<div class="bottom-link" layout="row" layout-align="space-around center">
					<a href="emp" class="link">{{trans('common.more_info')}}</a>
				</div>
			</md-whiteframe>

			<md-whiteframe class="flex-30 md-whiteframe-5dp">
				<div layout="row" layout-align="space-around center" class="block">
					<img class="round" src="{{url('images/dep.png')}}">
					<div>
						<div class="number">@{{count.dep}}</div>
						<div class="list">{{trans('common.departments')}}</div>
					</div>
				</div>
				<div class="bottom-link" layout="row" layout-align="space-around center">
					<a href="dep" class="link">{{trans('common.more_info')}}</a>
				</div>
			</md-whiteframe>

			<md-whiteframe class="flex-30 md-whiteframe-5dp">
				<div layout="row" layout-align="space-around center" class="block">
					<img class="round" src="{{url('images/photo/Icon_23-512.png')}}">
					<div>
						<div class="number">@{{count.acc}}</div>
						<div class="list">{{trans('common.accounts')}}</div>
					</div>
				</div>
				<div class="bottom-link" layout="row" layout-align="space-around center">
					<a href="#" class="link" style="height:28px"></a>
				</div>
			</md-whiteframe>
		</div>

		<div style="margin:40px 0px;border-top:3px solid rgb(96,125,139);background-color: rgb(247,248,249);">
			<p style="margin:18px 0px 0px 30px;font-size: 120%;color: rgb(96,125,139);">{{trans('common.latest_member')}}</p>
			<div layout="row" layout-align="space-around start">
				<div ng-repeat="item in emps" style="margin:20px;padding:5px" layout="column" layout-align="space-around center">
					<img ng-src="@{{item.emp_photo}}" style="width:130px;height:130px;border-radius:50%;">
					<p style="margin:20px 0px 5px 0px"><b>@{{item.emp_name}}</b></p>
					<p style="margin:0px">@{{item.emp_job}}</p>
				</div>
			</div>
		</div>
	<!-- </div> -->
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/home.js')}}"></script>
@endsection