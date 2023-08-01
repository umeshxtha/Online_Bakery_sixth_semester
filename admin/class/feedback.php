<?php
require_once'Connection.php';

class feedback
{
    private $date;
	private $name;
	private $email;
	private $subject;
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($dt,$n, $em, $sub)
	{
		$this->date = $dt;
		$this->name = $n;
		$this->email = $em;
		$this->subject = $sub;
	
	
		
	}
	
	public function registerfeedback(){
		$qry = "INSERT INTO feedback VALUES ('','$this->date', 
		'$this->name', '$this->email', '$this->subject'
		 )";
		$this->conn->iud($qry);
	}
	

	
	public function selectfeedback(){
		$qry = "SELECT * FROM feedback";
		return $this->conn->getData($qry);
	}
	
	public function selectSinglefeedback($id){
		$qry = "SELECT * FROM feedback WHERE id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchfeedback($key){
		$qry = "SELECT * FROM feedback WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM feedback WHERE username = '$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}
	
	
	public function updatefeedback($dt,$n,$em, $sub, $id){
		$qry = "UPDATE feedback SET date='$dt',name='$n',email='$em',subject='$sub'
				WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	
	public function deletefeedback($id){
		$qry = "DELETE FROM feedback WHERE id = $id";
		$this->conn->iud($qry);
	}
}
