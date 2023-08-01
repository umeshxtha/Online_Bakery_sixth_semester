<?php
require_once 'Connection.php';

class User
{
	private $firstname;
	protected $lastname;
	private $username;
	private $email;
	private $contact;
	private $password;
	private $status;
	private $type;
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($fn,$ln,$un, $e, $c, $pw, $st, $t)
	{
		$this->firstname = $fn;
		$this->lastname = $ln;
		$this->username = $un;
		$this->email = $e;
		$this->contact = $c;
		$this->password = $pw;
		$this->status=$st;
		$this->type = $t;
	}
	
	public function registerUser(){
		$qry = "INSERT INTO user VALUES ('','$this->firstname', 
		'$this->lastname', '$this->username', '$this->email', 
		'$this->contact', '$this->password', '$this->status','$this->type')";
		$this->conn->iud($qry);
	}
	
	private function validate(){}
	
	public function selectUser(){
		$qry = "SELECT * FROM user";
		return $this->conn->getData($qry);
	}
	
	public function selectSingleUser($id){
		$qry = "SELECT * FROM user WHERE id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchUser($key){
		$qry = "SELECT * FROM user WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM user WHERE username = '$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}
	
	
	public function updateUser($fn,$ln,$un, $e, $c, $pw, $st, $t, $id){
		$qry = "UPDATE user SET firstname='$fn',lastname='$ln',username='$un', email='$e', contact='$c', password = '$pw',status='$st', type = '$t' 
				WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	
	public function deleteUser($id){
		$qry = "DELETE FROM user WHERE id = $id";
		$this->conn->iud($qry);
	}
}
