<?php  
require_once ("../lib/model.php");

class Members_area_model extends Model {

	var $connection;
	var $table_name;
	var $primary_key;
	public $rows = 0;

	public function __construct() {
		$this->connection 	= mysqli_connect('localhost', 'root', '', 'cdc');
		$this->table_name 	= 'member';
		$this->primary_key 	= 'id_member';
	}

	public function getKeyValue() {}
    public function getDescriptionValue() {}
	public function setField($index, $value) {}
	public function getField($index) {}

	public function get_all() {
		$query = mysqli_query($this->connection, "SELECT * FROM " . $this->table_name);
		return mysqli_fetch_assoc($query);
	}

	public function get_data($primary_key) {
		$query = mysqli_query($this->connection, "SELECT * FROM " . $this->table_name . " WHERE " . $this->primary_key . "=" . $primary_key);
		return mysqli_fetch_assoc($query);
	}

	public function get_member($id_member, $password) {
		$query = mysqli_query($this->connection, "SELECT * FROM " . $this->table_name . " WHERE id_member='". $id_member . "' AND password='". md5($password) ."' LIMIT 1");
		$this->rows = mysqli_num_rows($query);
		$result = mysqli_fetch_assoc($query);
		if ($this->rows == 1)
			$this->set_login_log($result['id_login_log']);
		return $result;
	}

	public function get_role($id_member) {
		$query = mysqli_query($this->connection, "SELECT role.nama FROM " . $this->table_name . " JOIN role ON " . $this->table_name . ".id_role = role.id_role WHERE " . $this->table_name . ".id_member='". $id_member ."'");
		$this->rows = mysqli_num_rows($query);
		return mysqli_fetch_assoc($query);
	}

	public function set_login_log($id_login_log) {
		$query = mysqli_query($this->connection, "SELECT id_login_log FROM login_log WHERE id_login_log=". $id_login_log);
		$rows = mysqli_num_rows($query);
		if ($rows > 0)
			mysqli_query($this->connection, "UPDATE login_log SET waktu='". date("Y-m-d H:i:s") ."' WHERE id_login_log=" . $id_login_log);
		else
			mysqli_query($this->connection, "INSERT INTO login_log VALUES(". $id_login_log .", '". date("Y-m-d H:i:s") ."')");
	}

}
?>