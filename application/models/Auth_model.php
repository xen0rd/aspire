<?php
class Auth_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function userPass($email){
		$sql = "SELECT password FROM users WHERE email_address = ?";
		$query = $this->db->query($sql, array($email));
		return $query->num_rows() > 0 ? $query->row()->password : FALSE;
	}
	
}
?>