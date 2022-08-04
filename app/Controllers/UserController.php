<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController{
//=============================	
    public function __construct(){
		helper(["url"]);
	}
//=============================
	public function addUser(){
		// layout of add user form
		return view('add-user');
	}
//=============================
	public function saveUser(){
		if ($this->request->getMethod() == "post") {

			$rules = [
				"name" => "required",
				"email" => "required|valid_email",
				"password" => "required"
			];

			if (!$this->validate($rules)) {

				$response = [
					'success' => false,
					'msg' => "Existem alguns erros de validação",
				];

				return $this->response->setJSON($response);
			} else {

				$userModel = new UserModel();

				$data = [
					"name" => $this->request->getVar("name"),
					"email" => $this->request->getVar("email"),
					"password" => $this->request->getVar("password"),
				];

				if ($userModel->insert($data)) {

					$response = [
						'success' => true,
						'msg' => "Usuário adicionado",
					];
				} else {
					$response = [
						'success' => true,
						'msg' => "Falha em criar usuário",
					];
				}

				return $this->response->setJSON($response);
			}
		}
	}
//=============================
public function adda_user(){
    return view("add-user");
}

//=============================
}