<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class AccCtrl extends Controller
{
	public function login(Request $request) {
		$_POST = json_decode(file_get_contents('php://input'), true);

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
				$request->session()->put('id', $data->acc_id);
				$request->session()->put('stt', $data->acc_status);
			} else {
				echo 'fail';
			}
		}
		
		redirect('emp');
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

	public function update(Request $request) {
		$acc = Account::find($request->session()->get('id'));

		$_POST = json_decode(file_get_contents('php://input'), true);
		$old = $_POST['old'];
		$new = $_POST['new'];
		$confirm = $_POST['confirm'];

		$ok = true;

		if ($old != $acc->acc_password) {
			echo 'fail';
			$ok = false;
		} else if ($new != $confirm) {
			echo 'not match';
			$ok = false;
		}

		if ($ok) {
			$acc->acc_password = $new;
			$acc->acc_status = 1;
			$acc->save();
			$request->session()->put('stt', 1);

			echo 'done';
		}
	}
}
