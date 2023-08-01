<?php
require_once 'Connection.php';

class Menu
{
	private $name;
	private $category;
	protected $price;
	private $image;
	private $ingridents;
	private $status;
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($n,$c,$p,$img, $in, $st)
	{
		$this->name = $n;
		$this->category = $c;
		$this->price = $p;
		$this->image = $img;
		$this->ingridents = $in;
		$this->status = $st;
	
		
	}
	
	public function registerMenu(){
		$qry = "INSERT INTO menu VALUES ('','$this->name','$this->category',
		'$this->price', '$this->image', '$this->ingridents', 
		 '$this->status')";
		$this->conn->iud($qry);
	}
	
	private function validate(){}
	
	public function selectMenu(){
		$qry = "SELECT * FROM menu";
		return $this->conn->getData($qry);
	}
	
	public function selectSingleMenu($id){
		$qry = "SELECT * FROM menu WHERE id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchMenu($key){
		$qry = "SELECT * FROM menu WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM menu WHERE username = '$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}
	
	
	public function updateMenu($n,$c,$p,$img, $in, $st, $id){
		$qry = "UPDATE menu SET name='$n',category='$c',price='$p',image='$img', ingridents='$in',status='$st'
				WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	
	public function deleteMenu($id){
		$qry = "DELETE FROM menu WHERE id = $id";
		$this->conn->iud($qry);
	}
	public function selectCookedfood(){
		$qry = "SELECT * FROM menu WHERE category = 'Cooked Food' ";
		return $this->conn->getData($qry);
	}
	public function selectBakery(){
		$qry = "SELECT * FROM menu WHERE category = 'Bakery' ";
		return $this->conn->getData($qry);
	}
}
