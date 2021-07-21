<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ConfigModel;
use App\Models\DynamicModel;

Class API extends BaseController {
	public $data;
	public $session;

	public function __construct() {
		$this->session = session();
		helper('html');
		helper('Helpers\utilitys');
	}

	public function index() {

	}

	public function auth() {
		$request = service('request');
		$data["email"] = $request->getVar('email');
		$data["password"] = $request->getVar('password');

		$userModel = new UserModel();
		$user = $userModel->API_login($data["email"], $data["password"]);
		return json_encode($user);
	}

	public function list($entity) {
		$email = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
		$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : "";
		$userModel = new UserModel();
		$user = $userModel->API_login($email, $password);
		if(!$user){
			echo json_encode("Auth Error");	
			exit;
		}

		$dynamicModel = new DynamicModel();
		$data = $dynamicModel->list($entity);
		echo json_encode($data);
	}

	public function get($entity, $ID) {
		$email = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
		$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : "";
		$userModel = new UserModel();
		$user = $userModel->API_login($email, $password);
		if(!$user){
			echo json_encode("Auth Error");	
			exit;
		}
		
		$dynamicModel = new DynamicModel();
		$fieldID = $dynamicModel->return_fieldID($entity);
		$data = $dynamicModel->load_object($entity, $ID, $fieldID);

		echo json_encode($data);
	}

	public function add($entity_name) {
		$email = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
		$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : "";
		$userModel = new UserModel();
		$user = $userModel->API_login($email, $password);
		if(!$user){
			echo json_encode("Auth Error");	
			exit;
		}

		$request = service('request');
		$data = $request->getVar();

		$dynamicModel = new DynamicModel();
		if(!$dynamicModel->validate_data($entity_name, $data)){
			echo json_encode("Missing mandatory field");
			exit;
		}

		$result = $dynamicModel->record_data($entity_name, $data);
		echo json_encode($result);
	}

	public function modify($entity_name, $ID) {
		$email = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
		$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : "";
		$userModel = new UserModel();
		$user = $userModel->API_login($email, $password);
		if(!$user){
			echo json_encode("Auth Error");	
			exit;
		}

		$request = service('request');
		$data = $request->getRawInput();

		$dynamicModel = new DynamicModel();		
		if(!$dynamicModel->validate_data($entity_name, $data)){
			echo json_encode("Missing mandatory field");
			exit;
		}

		$entity = $dynamicModel->where('name', $entity_name)->asObject()->findAll();
		$refID = $dynamicModel->return_fieldID($entity_name);
		$result = $dynamicModel->change($entity_name, $data, $ID, $refID);	
		
		echo json_encode($result);
	}

	public function delete($entity_name, $ID) {
		$email = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : "";
		$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : "";
		$userModel = new UserModel();
		$user = $userModel->API_login($email, $password);
		if(!$user){
			echo json_encode("Auth Error");	
			exit;
		}

		$dynamicModel = new DynamicModel();
		$entity = $dynamicModel->where('name', $entity_name)->asObject()->findAll();
		$data["deleted_at"] = date('Y/m/d h:i:s');
		$result = $dynamicModel->change($entity_name, $data, $ID, $entity[0]->field);
		
		echo json_encode($result);
	}


}
