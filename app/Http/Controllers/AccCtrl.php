<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class AccCtrl extends Controller
{
	public function login(Request $request) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = Account::where('acc_email', '=', $email)->get()->first();

		if ($data == '') {
			echo 'not exists';
		} else {
			if ($data->acc_password == $password) {
				echo 'logon';
				$request->session()->put('status', 'y');
				$request->session()->put('name', $data->acc_name);
			} else {
				echo 'fail';
			}
		}
		echo $request->session()->get('username', 'not set');

		return redirect('emp');
	}

	public function test(Request $req) {
		echo $req->session()->get('status', 'none');
	}

	public function logout(Request $request) {
		$request->session()->flush();
		return redirect('emp');
	}

	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		$acc = new Account;

		$acc->acc_name = $_POST['name'];
		$acc->acc_password = 'admin';
		$acc->acc_email = $_POST['email'];
		// $emp->acc_status = $_POST['phone'];
		
		$acc->save();
	}

	public function update() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		// $acc = new Account;

		// $acc->acc_name = $_POST['name'];
		// $acc->acc_password = 'admin';
		// $acc->acc_email = $_POST['email'];
		// // $emp->acc_status = $_POST['phone'];
		
		// $acc->save();
	}
}
