<?php

namespace App\Model;

class UserRepository extends Repository  {

	protected $session;

	public function __construct()
    { 
        $this->session = filter_var_array($_SESSION);
    }
	
	function getUsers()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT id, pseudo, password FROM user');
		$req->execute();
		
		$users = [];
		
		while($data = $req-> fetch()) {
			
			
			$user = new User($data['id'], $data['pseudo'] , $data['password']);
			
			$users[] = $user;
			
		}
		
		$req->closeCursor();

		return $users;
	}
	
		
	function addUser()
	{
		$db = $this->getDb();

		$hashpass= password_hash($this->session['password'], PASSWORD_DEFAULT);
		$req = $db->prepare('INSERT INTO user(pseudo, password) VALUES(:pseudo, :password)'); 
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $hashpass, \PDO::PARAM_STR);
		$req->execute();
		
	}
	
	function deleteUser()														//
	{																			//
		$db = $this->getDb();													//
	
		$req = $db->prepare('DELETE FROM user WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
			
		$req->execute();									//
	}

	function getUserById()
	{
		$db = $this->getDb();
		$req = $db->prepare('SELECT * FROM user WHERE id=:id');
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
			
		$req->execute();

		$users = [];
		
		while($data = $req-> fetch()) {

			$user = new User($data['id'], $data['pseudo'], $data['password']);
			
			$users[] = $user;
			
		}
		
		$req->closeCursor();

		return $users[0];

	}

	function updateUser()
	{

		$db = $this->getDb();
		
		$hashpass= password_hash($this->session['password'], PASSWORD_DEFAULT);
		$req = $db->prepare('UPDATE user SET pseudo=:pseudo, password=:password WHERE id=:id');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->bindParam(':password', $hashpass, \PDO::PARAM_STR);
		$req->bindParam(':id', $this->session['id'], \PDO::PARAM_INT);
		$req->execute();
	}

	function connectUser()
	{
		$db = $this->getDb();

		$req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();

		$users = [];
		
		while($data = $req-> fetch()) {

			$user = new User($data['id'], $data['pseudo'], $data['password']);
			
			$users[] = $user;
		}
		
		$req->closeCursor();

		if (isset($users[0])){

			return password_verify($this->session['password'], $users[0]->getPassword());
		}else{
			return false;
		}
	}

	function getConnectUser() {

		$db = $this->getDb();

		$req = $db->prepare('SELECT id FROM user WHERE pseudo=:pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();

		$idUser = $req->fetch();

		return $idUser[0];
	}

	function connectAdmin() {

		$db = $this->getDb();

		$req = $db->prepare('SELECT level FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $this->session['pseudo'], \PDO::PARAM_STR);
		$req->execute();
		$admin = $req->fetch();

		return $admin[0];

	}
}

