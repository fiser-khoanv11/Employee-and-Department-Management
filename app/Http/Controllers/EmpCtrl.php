<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class EmpCtrl extends Controller
{
	/**
	 * Show a list of all of the application's users.
	 *
	 * @return Response
	 */
	public function index($dep=0) {
		return view('emp', ['dep' => $dep]);
	}

	public function delete($id) {
		Employee::destroy($id);
	}

	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		$emp = new Employee;

		$emp->emp_dob = $_POST['dob'];
		$emp->emp_name = $_POST['name'];
		$emp->emp_job = $_POST['job'];
		$emp->emp_phone = $_POST['phone'];
		$emp->emp_email = $_POST['email'];
		$emp->dep_id = $_POST['dep'];
		
		$emp->save();
	}

	public function update() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$emp = Employee::find($_POST['emp_id']);

		$emp->emp_dob = $_POST['emp_dob'];
		$emp->emp_name = $_POST['emp_name'];
		$emp->emp_job = $_POST['emp_job'];
		$emp->emp_phone = $_POST['emp_phone'];
		$emp->emp_email = $_POST['emp_email'];
		$emp->dep_id = $_POST['dep_id'];

		$emp->save();
	}

	public function select($dep, $name=null) {
		$data = Employee::orderBy('emp_id', 'desc');
		
		if ($dep != 0) {
			$data = $data->where('dep_id', '=', $dep);
		}

		if (isset($name)) {
			$data = $data->where('emp_name', 'like', '%'.$name.'%');
		}

		$result = '{"records":' . $data->get() . '}';

		echo $result;
	}

	public function selectSingle($id=null) {
		$data = Employee::find($id);
		$result = '{"record":[' . $data . ']}';
		echo $result;
	}

	public function redirect() {
		return redirect('emp');
	}

	public function selectNames() {
		$data = Employee::select('emp_id','emp_name')->orderBy('emp_name')->get();

		$result = '{"records":' . $data . '}';

		echo $result;
	}
}