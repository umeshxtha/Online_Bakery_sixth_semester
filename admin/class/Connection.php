<?php

class Connection
{
	private $host;
	private $user;
	private $password;
	private $database;
	private $connect;
	
	function __construct()
	{
		$this->host = 'localhost';
		$this->user = 'root';
		$this->password = '';
		$this->database = 'food-order';
		$this->getConnection();
	}
	
	function getConnection()
	{
		$this->connect = new mysqli($this->host, $this->user, 
								$this->password, $this->database);
		if($this->connect->connect_error){
			die('Connection Error: '. $this->connect->connect_error);
		}
		return $this->connect;
	}
	
	function iud($qry)
	{
		if(!$this->connect->query($qry)) {
			die('Error: '. $this->connect->error);
		}
		return true;
	}
	
	function getData($qry)
	{
		$result = [];
		$data = $this->connect->query($qry);
		while($row = $data->fetch_assoc()) {
			$result[] = $row; 
		}
		return $result;
	}
}


