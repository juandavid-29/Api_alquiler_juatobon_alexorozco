<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rental extends CI_Controller
{

	// endponit base
	//url base http://http://localhost/Api_alquiler/index.php/Rental/
	public function index()
	{
		echo "producto controller";
	}

	// endponit / addrental
	public function addrental()
	{
		$_method = $_SERVER['REQUEST_METHOD'];
		if ($_method === 'POST') {
			$json = file_get_contents('php://input');
			$data = json_decode($json);
			//var_dump($data);
			$this->Rental_model->addrental($data);
			http_response_code(200);
			header('content-type: application/json');
			$response = array('response' => 'good correct');
			echo json_encode($response);
		} else {
			http_response_code(200);
			header('content-type: application/json');
			$response = array('response' => ' bad correct');
			echo json_encode($response);
		}
	}

	// endponit / getrentals
	public function getrentals()
	{
		header("Access-Control-Allow_Origin: *");
		$_method = $_SERVER['REQUEST_METHOD'];
		if ($_method === 'GET') {
			$rentals = $this->Rental_model->getrentals();
			//var_dump($rentals);
			//http_response_code(200);
			header('content-type: application/json');
			$response = array('rentals' => $rentals, "status" => true);
			echo json_encode($response);
		} else {
			http_response_code(200);
			header('content-type: application/json');
			$response = array('rentals' =>  [], "status" => false);
			echo json_encode($response);
		}
	}


	// endponit / updaterental
	public function updaterental()
	{
		$_method = $_SERVER['REQUEST_METHOD'];
		if ($_method === 'PUT') {
			$json = file_get_contents('php://input');
			$data = json_decode($json);
			$this->Rental_model->updaterental($data);
			http_response_code(200);
			header('content-type: application/json');
			$response = array('response' => 'RENTALS ADD GOOD');
			echo json_encode($response);
		} else {
			http_response_code(200);
			header('content-type: application/json');
			$response = array('response' => ' bad correct');
			echo json_encode($response);
		}
	}


	// endponit / deleterental
	public function deleterental()
	{
		$_method = $_SERVER['REQUEST_METHOD'];
		if ($_method === 'DELET') {
			$json = file_get_contents('php://input');
			$data = json_decode($json);
			$this->Rental_model->deleterental($data);
			http_response_code(200);
			header('content-type: application/json');
			$response = array('response' => 'good correct');
			echo json_encode($response);
		} else {
			http_response_code(200);
			header('content-type: application/json');
			$response = array('response' => ' bad correct');
			echo json_encode($response);
		}
	}
}
