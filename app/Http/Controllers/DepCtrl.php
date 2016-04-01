<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

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
		DB::delete('DELETE FROM department WHERE dep_id=' . $id);
	}

	public function insert() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$name = $_POST['name'];
		$phone = $_POST['phone'];

		$query = 'INSERT INTO department (dep_name, dep_phone) VALUES (';
		$query .= '"' . $name . '",';
		$query .= '"' . $phone . '")';
		DB::insert($query);
	   
		echo $query;
	}

	public function update() {
		$_POST = json_decode(file_get_contents('php://input'), true);

		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];

		$query = 'UPDATE department SET ';
		$query .= 'dep_name="' . $name . '",';
		$query .= 'dep_phone="' . $phone . '" ';
		$query .= "WHERE dep_id=" . $id;
		DB::update($query);

		echo $query;
	}

	public function select() {
		$query = 'SELECT * FROM department ORDER BY dep_id DESC';

		$data = DB::select($query);

		$result = '';
		for ($x = 0; $x < sizeof($data); $x++) {
			if ($x != 0) {
				$result .= ',';
			}
			$result .= '{';
			$result .= '"id":' . $data[$x]->dep_id . ',';
			$result .= '"name":"' . $data[$x]->dep_name . '",';
			$result .= '"phone":"' . $data[$x]->dep_phone . '"';
			$result .= '}';
		}

		$result = '{"records":[' . $result . ']}';

		echo $result;
	}

	public function selectSingle($id=null) {
		$data = DB::select('SELECT * FROM department WHERE dep_id=' . $id);

		$result = '{';
		$result .= '"id":' . $data[0]->dep_id . ',';
		$result .= '"name":"' . $data[0]->dep_name . '",';
		$result .= '"phone":"' . $data[0]->dep_phone . '"';
		$result .= '}';

		$result = '{"record":[' . $result . ']}';

		echo $result;
	}

	public function selectNames() {
        $data = DB::select('SELECT dep_id, dep_name FROM department');

        $result = '';
        for ($x = 0; $x < sizeof($data); $x++) {
            if ($x != 0) {
                $result .= ',';
            }
            $result .= '{';
            $result .= '"id":' . $data[$x]->dep_id . ',';
            $result .= '"name":"' . $data[$x]->dep_name . '"';
            $result .= '}';
        }

        $result = '{"records":[' . $result . ']}';

        echo $result;
    }
}