<?php 

class UserModel extends Model {
	
	private $name;
	private $date;
	private $andress;

	public function __construct(){

	}

	public function get($id = ''){

		$sql = "SELECT * FROM usuario WHERE id = $id" ;

	    try{
	        $db = new db(); 
	        $db = $db->connect();
	        $stmt = $db->query($sql);
	        $user = $stmt->fetch(PDO::FETCH_OBJ);
	        $db = null;
	        $user->andresses = json_decode($user->andress);
	        return $user;

	    }catch(PDOEception $erro){
	        echo '{"erro" : {"text": '.$erro->getMessage().'}';
	    }
	}

	public function all(){
		$sql = "SELECT * FROM usuario";

	    try{
	        $db = new db(); 
	        $db = $db->connect();
	        $stmt = $db->query($sql);
	        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
	        $db = null;
	        return $users;


	    }catch(PDOEception $erro){
	        echo '{"erro" : {"text": '.$erro->getMessage().'}';
	    }
	}

	public function save($userForm){

		$name = $userForm->name;
		$date = $userForm->date;
		$andress = json_encode($userForm->andresses);

		$sql = "INSERT INTO usuario (name,date,andress) VALUES (:name,:date,:andress)";

	    try{
	        $db = new db(); 
	        $db = $db->connect();
	        $stmt = $db->prepare($sql);
	        $stmt->bindParam(':name',$name);
	        $stmt->bindParam(':date',$date);
	        $stmt->bindParam(':andress',$andress); 
	        $stmt->execute();

	        echo '{"notice" : {"text" : "User added"} }';

	    }catch(PDOEception $erro){
	        echo '{"erro" : {"text": '.$erro->getMessage().'}}';
	    }
	}


	public function delete($id = ''){

	    $sql = "DELETE FROM usuario WHERE id = $id";

	    try{
	        $db = new db(); 
	        $db = $db->connect();
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $db = null;
	        return '{"notice" : {"text" : "User deleted"}}';

	    }catch(PDOEception $erro){
	        return '{"erro" : {"text": '.$erro->getMessage().'}}';
	    }
	}

	public function update($id,$userForm){

		$name = $userForm->name;
		$date = $userForm->date;
		$andress = json_encode($userForm->andresses);


		$sql = "UPDATE usuario SET name = :name,date = :date,andress = :andress
	        WHERE id = $id";

	    try{
	        $db = new db(); 
	        $db = $db->connect();
	        $stmt = $db->prepare($sql);
	        $stmt->bindParam(':name',$name);
	        $stmt->bindParam(':date',$date);
	        $stmt->bindParam(':andress',$andress); 
	        $stmt->execute();
         }catch(PDOEception $erro){
	        return '{"erro" : {"text": '.$erro->getMessage().'}}';
	    }

	    echo 'Name:'.$id;
	}

}

?>
