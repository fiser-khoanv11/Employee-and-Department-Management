<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class DepCtrl extends Controller
{
	/**
	 * Show a list of all of the application's users.
	 *
	 * @return Response
	 */
	public function index() {
		return view('dep');
	}

	public function delete($id) {
		Department::destroy($id);
	}

	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$dep = new Department;
		$dep->dep_name = $_POST['name'];
		$dep->dep_phone = $_POST['phone'];
		$dep->mng_id = $_POST['manager'];

		$dep->save();
	}

	public function update() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$dep = Department::find($_POST['dep_id']);
		$dep->dep_name = $_POST['dep_name'];
		$dep->dep_phone = $_POST['dep_phone'];
		$dep->mng_id = $_POST['mng_id'];

		$dep->save();
	}

	public function select() {
		$data = Department::orderBy('dep_id', 'desc')->get();
		$result = '{"records":' . $data . '}';
		echo $result;
	}

	public function selectSingle($id=null) {
		$data = Department::find($id);
		$result = '{"record":[' . $data . ']}';
		echo $result;
	}

	public function selectNames() {
		$data = Department::select('dep_id','dep_name')->orderBy('dep_name')->get();

		$result = '{"records":' . $data . '}';

		echo $result;
	}
}