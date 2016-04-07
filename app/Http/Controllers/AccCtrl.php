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

		$data = Account::where('email', '=', $email)->get()->first();

		if ($data == '') {
			echo 'not exists';
		} else {
			if ($data->password == $password) {
				echo 'logon';
				$request->session()->put('status', 'y');
				$request->session()->put('username', $data->username);
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
}
