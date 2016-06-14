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

		// Get POST data
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Get the record with given email
		$data = Account::where('acc_email', '=', $email)->get()->first();

		if ($data == '') {
			// If the record not existed
			echo 'not exists';
		} else {
			if ($data->acc_password == $password) {
				// If passwords are matched
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
		// Delete all session variables
		$request->session()->flush();
		return redirect('/');
	}

	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		// Create a random password
		$password = "";
 		$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 		for($i = 0; $i < 8; $i++){
		    $random_int = mt_rand();
		    $password .= $charset[$random_int % strlen($charset)];
	    }

	    // Insert into database
		$acc = new Account;

		$acc->acc_name = $_POST['name'];
		$acc->acc_password = $password;
		$acc->acc_email = $_POST['email'];
		
		$acc->save();

		// Send mail to the given email
    	Mail::send('mail', ['pass' => $password, 'name' => $acc->acc_name], function($message) {
			$message->to($_POST['email'], 'OK')->subject('Password for ED Account');
		});
	}

	// Change password
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

		// If passwords are correct, update
		if ($ok) {
			$acc->acc_password = $new;
			$acc->acc_status = 1;
			$acc->save();
			$request->session()->put('stt', 1);

			echo 'done';
		}
	}

	// Check if the give email is existed in the database
	public function checkEmail($email) {
		$acc = Account::where('acc_email', '=', $email)->count();

		if ($acc == 0) {
			echo 'ok';
		} else {
			echo 'fail';
		}
	}

	// Change language
	public function language(Request $request) {
		// Get current language
		$lang = $request->session()->get('lang', 'en');

		// Get the account with given id
		$acc = Account::find($request->session()->get('id'));

		// Change session value of 'lang', and change that in database too
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

	// Redirect into the 'change' page, when user log in the 1st time
	public function change(Request $request) {
		$status = $request->session()->get('status', 'n');
		$name = $request->session()->get('name');
		$lang = $request->session()->get('lang');
		$stt = $request->session()->get('stt', -1);
		App::setLocale($lang);

		return view('change', ['status' => $status, 'name' => $name, 'lang' => $lang, 'stt' => $stt]);
	}
}