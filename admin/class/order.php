<?php
require_once 'Connection.php';

class Order
{
	private $user_id;
	protected $menu_id;
	private $orderstatus;
	private $Price;
	
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($ui,$mi,$os, $p)
	{
		$this->user_id = $ui;
		$this->menu_id = $mi;
		$this->orderstatus = $os;
		$this->Price = $p;
	}

	public function registerOrder(){
		$qry = "INSERT INTO orderfood VALUES ('','$this->user_id', 
		'$this->menu_id', '$this->orderstatus', '$this->Price' )";
		$this->conn->iud($qry);
	}
	
	private function validate(){}
	
	public function selectOrder(){
		$qry = "SELECT *, orderfood.id as id FROM orderfood join user on orderfood.user_id = user.id join menu on orderfood.menu_id = menu.id";
		return $this->conn->getData($qry);
	}
	
	public function selectSingleOrder($id){
		$qry = "SELECT *, orderfood.id as id FROM orderfood join menu on orderfood.menu_id = menu.id WHERE user_id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchOrder($key){
		$qry = "SELECT * FROM orderfood WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM orderfood WHERE username = '$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}


	public function updateOrder($os, $id){
		$qry = "UPDATE orderfood SET order_status='$os' WHERE id = $id";
		return $this->conn->iud($qry);
	}
	
	
	public function deleteOrder($id){
		$qry = "DELETE FROM orderfood WHERE id = $id";
		return $this->conn->iud($qry);
	}

	
	public function countOrder($id){
		$qry = "SELECT COUNT(id) as count FROM  orderfood WHERE user_id = $id";
		return $this->conn->getData($qry);
	}

	public function selectSingleOrders($id){
		$qry = "SELECT *, orderfood.id as id FROM orderfood join user on orderfood.user_id = user.id join menu on orderfood.menu_id = menu.id Where orderfood.id = $id";
		return $this->conn->getData($qry);
	}
}
?>