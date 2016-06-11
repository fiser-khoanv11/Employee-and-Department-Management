@extends('master')

@section('content')
	<style type="text/css">
		
		.center-content-image-container, .center-content {
			float: left;
		}

		.center-content-image {
			width: 60px;
			height: 60px;
			margin-top: 7px;
		}

		.center-content-title {
			font-weight: bold;
			font-size: 15px;
			margin-top: 7px;
			margin-left: 10px;
		}

		.center-content-description {
			text-align: left;
			color: #999999;
			margin-left: 10px;
		}

		.center-one-title {
			font-size: 30px;
			font-weight: bold;
			text-align: center;
			margin-top: 70px;
			margin-bottom: 20px;
		}

		.clear {
			clear: both;
		}

		.center-one-content-left, .center-one-content-mid, .center-one-content-right {
			float: left;
		}

		.center-one-content-mid {
			width: 30%;
		}

		.center-one-content-left {
			width: 30%;
		}

		.center-one-content-right {
			width: 30%;
			margin-left: 110px;
		}

		.center-image {
			width: 100%;
			margin-left: 50px;
		}

		.bottom {
			background-color: #F1F1F1;
			width: 100%;
			height: 35%;
			padding: 20px;
			margin-right: 20px;
		}

		.bottom-left {
			float: left;
			margin-left: 150px;
		}

		.bottom-right {
			float: left;
		}

		.bottom-left-image {
			height: 200px;
			width: 400px;
		}

		.bottom-title {
			font-weight: bold;
			margin-left: 100px;
			margin-top: 30px;
			font-size: 25px;
		}

		.bottom-description {
			font-family: "Times New Roman", Georgia, Serif;
			color: #999999;
			text-align: left;
			margin-left: 100px;
		}

		.bottom-link {
			color: #1CAFF6;
			font-size: 20px;
			float: left;
			margin-left: 100px;
			margin-top: 5px;
		}

		.bottom-link:hover {
			text-decoration: underline;
			cursor: pointer;
		}
	</style>
	<div class="center-one">
		<div class="center-one-title">Employees Management.</div>
		<div class="center-one-content">
			<div class="center-one-content-left">
				<div class="center-one-content-left-top">
					<div class="center-content-image-container">
						<img class="center-content-image" src="{{url('images/user.png')}}">
					</div>

					<div class="center-content">
						<div class="center-content-title">Employees</div>

						<div class="center-content-description">
							<p><span >
							Employee includes all the employees<br/>
							of each Department and now <br/>
							there are <strong style="color: black">@{{count.emp}}</strong> employees.
						</span></p>
						</div>
					</div>
					
				</div>

				<div class="clear"></div>

				<div class="center-one-content-left-bottom">
					<div class="center-content-image-container">
						<img class="center-content-image" src="{{url('images/departments.png')}}">
					</div>

					<div class="center-content">
						<div class="center-content-title">Departments</div>

						<div class="center-content-description">
							<p><span >
							Departments contain many kind of<br/>
							group in the company. And there are<br/>
							<strong style="color: black">@{{count.dep}}</strong> departments in the company.<br/>
							
						</span></p>
						</div>
					</div>
					
				</div>
				<div class="clear"></div>
			</div>

			<div class="center-one-content-mid">
				<!-- <img class="center-one-content-mid-image" src="{{url('images/background.jpg')}}"> -->
				<img class="center-image" src="{{url('images/employee.png')}}">
			</div>

			<div class="center-one-content-right">
				<div class="clear"></div>
				<div class="center-one-content-right-top">
					<div class="center-content-image-container">
						<img class="center-content-image" src="{{url('images/staff.png')}}">
					</div>

					<div class="center-content">
						<div class="center-content-title">Users</div>

						<div class="center-content-description">
							<p><span >
							Users is a place where you can see <br/>
							all member of the company <br/>
							There are <strong style="color: black">@{{count.acc}}</strong> users in company now.
						</span></p>
						</div>
					</div>
					
				</div>

				<div class="clear"></div>

				<div class="center-one-content-right-bottom">
					<div class="center-content-image-container">
						<img class="center-content-image" src="{{url('images/about.png')}}">
					</div>

					<div class="center-content">
						<div class="center-content-title">About us</div>

						<div class="center-content-description">
							<p><span >
							We are the champion <br/>
							my name is Do Ngoc Hung. <br/>
							I'm the CEO of this company :3. <br/>
						</span></p>
						</div>

					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>

	</div>

	<div class="clear"></div>

	<div class="bottom">
		<div class="bottom-left">
			<img class="bottom-left-image" src="{{url('images/aboutus.png')}}">
		</div>

		<div class="bottom-right">
			<div class="bottom-title">Hacaka Team</div>

			<div class="bottom-description">
				<p><span class="description">
					We are The world's most famous Web Team<br/>
					If you want to build any web platform, please feel free to contact us<br/>
					We promise to give you the best product.
				</span></p>
			</div>	

			<div class="bottom-link">Click here to contact us!</div>
		</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{url('js/home.js')}}"></script>
@endsection