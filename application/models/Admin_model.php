<?php
class Admin_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function users(){
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function add($postData){
		$this->db->insert("users", $postData);
		return $this->db->affected_rows > 0 ? TRUE : FALSE;
	}
	
	public function update($userId){
		$sql = "UPDATE users SET ()";
		$query = $this->db->query($sql, array($userId));
		return $this->db->affected_rows > 0 ? TRUE : FALSE;
	}
	
	public function delete($userId){
		$sql = "DELETE FROM users WHERE user_id = ?";
		$query = $this->db->query($sql, array($userId));
		return $this->db->affected_rows > 0 ? TRUE : FALSE;
	}
}
?>