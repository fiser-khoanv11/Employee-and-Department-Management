<?php

namespace App\Http\Controllers;

use App;
use App\Employee;
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
	public function index(Request $request) {
		$status = $request->session()->get('status', 'n');
		$name = $request->session()->get('name');
		$lang = $request->session()->get('lang');
		$stt = $request->session()->get('stt', -1);
		App::setLocale($lang);

		return view('dep', ['status' => $status, 'name' => $name, 'lang' => $lang, 'stt' => $stt]);
	}

	// Delete the department with given id
	public function delete($id) {
		Department::destroy($id);
	}

	// Insert a new department into database
	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$dep = new Department;
		$dep->dep_name = $_POST['name'];
		$dep->dep_phone = $_POST['phone'];
		$dep->dep_address = $_POST['address'];
		$dep->mng_id = $_POST['manager'];

		$dep->save();
	}

	// Update a department
	public function update() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$dep = Department::find($_POST['dep_id']);
		$dep->dep_name = $_POST['dep_name'];
		$dep->dep_phone = $_POST['dep_phone'];
		$dep->dep_address = $_POST['dep_address'];
		$dep->mng_id = $_POST['mng_id'];

		$dep->save();
	}

	// Select all the departments with given conditions
	public function select($skip, $take) {
		$skip = ($skip - 1) * $take;
		$data = Department::orderBy('dep_id', 'desc')->skip($skip)->take($take)->get();

		foreach ($data as $item) {
			if ($item->manager == '') {
				$item->mng_name = '';
			} else {
				$item->mng_name = $item->manager->emp_name;
			}
		}
		
		$result = '{"records":' . $data . '}';
		echo $result;
	}

	// Get the number of departments with given conditions
	public function count() {
		$data = Department::orderBy('dep_id', 'desc')->count();
		echo $data;
	}

	// Select a single department with given id (for select sidenav)
	public function selectSingle($id=null) {
		$data = Department::find($id);
		
		if ($data->manager == '') {
			$data->mng_name = '';	
		} else {
			$data->mng_name = $data->manager->emp_name;	
		}

		$count = Employee::where('dep_id', '=', $data->dep_id)->count();
		$data->count = $count;
		
		$result = '{"record":[' . $data . ']}';
		echo $result;
	}

	// Select the names (and id) of all departments, for <select>
	public function selectNames() {
		$data = Department::select('dep_id','dep_name')->orderBy('dep_name')->get();

		$result = '{"records":' . $data . '}';

		echo $result;
	}
}