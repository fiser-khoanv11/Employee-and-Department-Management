<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use App\Employee;
use App\Department;
use App\Account;

class HomeCtrl extends Controller
{
    //
    public function index(Request $request) {
		$status = $request->session()->get('status', 'n');
		$name = $request->session()->get('name');
		$lang = $request->session()->get('lang', 'en');
		$stt = $request->session()->get('stt', -1);
		App::setLocale($lang);

		return view('home', [ 'status' => $status, 'name' => $name, 'lang' => $lang, 'stt' => $stt]);
	}

	public function count() {
		$emp = Employee::count();
		$dep = Department::count();
		$acc = Account::count();

		$result = '{"records":[{"emp":' . $emp . ',"dep":' . $dep . ',"acc": ' . $acc . '}]}';
		echo $result;
	}
}
