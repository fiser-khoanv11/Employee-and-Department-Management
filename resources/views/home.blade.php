@extends('master')

@section('content')
	<style type="text/css">
		.round{
			width:120px;
			border-radius:50%;
			/*padding-right:10px;*/
		}

		.number{
			margin: 0px;
			font-size: 50px;
			color: white;
			float: right;
		}

		.list{
			font-size: 20px;
			color: white;
			text-align: right;
		}

		.block {
			background-color: rgb(147,170,181);
			/*border-top: 10px solid rgb(1,172,216);*/
			padding:10px;
		}

		.bottom-link {
			background-color: rgb(96,125,139);
		}

		.link {
			text-decoration: none;
			margin: 0px;
			color: white;
		}
		
	</style>
	
	<b class='title'>DASHBOARD</b>
	<div style="height:30px"></div>

	<!-- <div layout="column" layout-align="center stretch"> -->
		<div layout="row" style="padding-top:20px 0px" layout-align="space-between center">
			<md-whiteframe class="flex-30 md-whiteframe-5dp">
				<div layout="row" layout-align="space-around center" class="block">
					<img class="round" src="{{url('images/photo/04-512.png')}}">
					<div>
						<div><p class="number">@{{count.emp}}</p></div>
						<div class="list">Employees</div>
					</div>
				</div>
				<div class="bottom-link" layout="row" layout-align="space-around center">
					<a href="emp" class="link">More info</a>
				</div>
			</md-whiteframe>

			<md-whiteframe class="flex-30 md-whiteframe-5dp">
				<div layout="row" layout-align="space-around center" class="block">
					<img class="round" src="{{url('images/photo/Icon_20-512.png')}}">
					<div>
						<div class="number">@{{count.dep}}</div>
						<div class="list">Departments</div>
					</div>
				</div>
				<div class="bottom-link" layout="row" layout-align="space-around center">
					<a href="dep" class="link">More info</a>
				</div>
			</md-whiteframe>

			<md-whiteframe class="flex-30 md-whiteframe-5dp">
				<div layout="row" layout-align="space-around center" class="block">
					<img class="round" src="{{url('images/photo/Icon_23-512.png')}}">
					<div>
						<div class="number">@{{count.acc}}</div>
						<div class="list">Accounts</div>
					</div>
				</div>
				<div class="bottom-link" layout="row" layout-align="space-around center">
					<a href="#" class="link" style="height:28px"></a>
				</div>
			</md-whiteframe>
		</div>
<!-- 
		<div layout="row" style="padding:40px 0px" layout-align="space-between start">
			<md-whiteframe class="flex-30 md-whiteframe-5dp block" style="padding-left:25px">
				<p style="color:white;margin:2px 0px">Alex</p>
				<p style="color:white;margin:2px 0px">Benson</p>
				<p style="color:white;margin:2px 0px">Caleb</p>
				<p style="color:white;margin:2px 0px">Daniel</p>
				<p style="color:white;margin:2px 0px">Edward</p>
				<p style="color:white;margin:2px 0px">Finn</p>
				<p style="color:white;margin:2px 0px">Gale</p>
			</md-whiteframe>

			<md-whiteframe class="flex-30 md-whiteframe-5dp block" style="padding-left:25px">
				<p style="color:white;margin:2px 0px">Alex</p>
				<p style="color:white;margin:2px 0px">Benson</p>
				<p style="color:white;margin:2px 0px">Caleb</p>
				<p style="color:white;margin:2px 0px">Daniel</p>
				<p style="color:white;margin:2px 0px">Edward</p>
				<p style="color:white;margin:2px 0px">Finn</p>
				<p style="color:white;margin:2px 0px">Gale</p>
			</md-whiteframe>

			<md-whiteframe class="flex-30 md-whiteframe-5dp block" style="padding-left:25px">
				<p style="color:white;margin:2px 0px">Alex</p>
				<p style="color:white;margin:2px 0px">Benson</p>
				<p style="color:white;margin:2px 0px">Caleb</p>
				<p style="color:white;margin:2px 0px">Daniel</p>
				<p style="color:white;margin:2px 0px">Edward</p>
				<p style="color:white;margin:2px 0px">Finn</p>
				<p style="color:white;margin:2px 0px">Gale</p>
			</md-whiteframe>
		</div> -->
	<!-- </div> -->
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/home.js')}}"></script>
@endsection