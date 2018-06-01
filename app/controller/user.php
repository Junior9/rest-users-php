<?php

require '../vendor/autoload.php';
require '../core/db.php';


class User extends Controller{

	public function all(){		

		$user = $this->model('userModel');
		$users = $user->all();
		echo json_encode($users);
	}

	public function get($id= ''){

		$user = $this->model('userModel');
		$user = $user->get($id);
	   	echo json_encode($user);
	}

	public function delete ($id = ''){
		$user = $this->model('userModel');
		$mensagem = $user->delete($id);
	   	echo json_encode($mensagem);
	}	

	public function save(){

		$userForm = json_decode(file_get_contents("php://input"));
		$user = $this->model('userModel');
		$mensagem =  $user->save($userForm);
		echo $mensagem ;
	}

	public function update($id =''){
		$userForm = json_decode(file_get_contents("php://input"));
		$user = $this->model('userModel');
		$mensagem = $user->update($id,$userForm);
		echo $mensagem ;
	}

}

?>