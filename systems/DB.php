<?php
class DB{
	function __construct(){
		$server='localhost';
		$username='root';
		$password='root';
		$database='utspwl';

		$this->connection=new PDO("mysql:host=$server;dbname=$database",$username,$password);
	}

	function get($cel=null,$table=null,$property=null){
		$query="SELECT $cel FROM $table $property";
		$result=$this->connection->query($query);
		return $result;
	}

	function insert($table=null,$value=null){
		$query="INSERT INTO $table VALUES($value)";
		$result=$this->connection->query($query);
		return $result;
	}

	function update($table=null,$value=null,$property=null){
		$query	="UPDATE $table SET $value WHERE $property";
		$result = $this->connection->query($query);
		return $result;
	}

	function delete($table=null,$property=null){
		$query = "DELETE FROM $table WHERE $property";
		$result = $this->connection->query($query);
		return $result;
	}
}

$db = new DB;

?>