<?php

namespace App\Http\Controllers;

use App;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

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
				$request->session()->put('lang', $data->acc_lang);
			} else {
				echo 'fail';
			}
		}
	}

	public function logout(Request $request) {
		$request->session()->flush();
		return redirect('/');
	}

	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		/*
		@hung: Tao mat khau random roi gan vao $password
		*/

		$password = "";
 		$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 		for($i = 0; $i < 8; $i++){
		    $random_int = mt_rand();
		    $password .= $charset[$random_int % strlen($charset)];
	    }


		$acc = new Account;

		$acc->acc_name = $_POST['name'];
		$acc->acc_password = $password;
		$acc->acc_email = $_POST['email'];
		
		$acc->save();

		/*
		@hung: Thiet ke mail trong view resources/views/mail.blade.php
		*/
    	Mail::send('mail', ['pass' => $password], function($message) {
			$message->to($_POST['email'], 'OK')->subject('Password for ED Account');
		});
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

	public function checkEmail($email) {
		$acc = Account::where('acc_email', '=', $email)->count();

		if ($acc == 0) {
			echo 'ok';
		} else {
			echo 'fail';
		}
	}

	public function language(Request $request) {
		$lang = $request->session()->get('lang', 'en');
		$acc = Account::find($request->session()->get('id'));

		if ($lang == 'en') {
			$request->session()->put('lang', 'vi');
			if (isset($acc)) {
				$acc->acc_lang = 'vi';
			}
		} else {
			$request->session()->put('lang', 'en');
			if (isset($acc)) {
				$acc->acc_lang = 'en';
			}
		}

		if (isset($acc)) {
			$acc->save();
		}
	}

	public function change(Request $request) {
		$status = $request->session()->get('status', 'n');
		$name = $request->session()->get('name');
		$lang = $request->session()->get('lang');
		App::setLocale($lang);

		return view('change', ['status' => $status, 'name' => $name, 'lang' => $lang]);
	}
}