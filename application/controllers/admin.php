<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function index(){	
		$this->load->view("admin.page.php");
	}
	
	public function users(){
		$this->load->model("admin_model");
		echo json_encode(array("data" => $this->admin_model->users()));
	}
	
	public function deleteUser($userId){
		if($this->input->post(NULL, TRUE)){
			$this->load->model("admin_model");
			if(!$this->admin_model->delete($userId)){
				$this->session->set_flashdata('success_message', "User has been deleted");
			}
			else{
				$this->session->set_flashdata('error_message', "Failed to delete user");
			}
			redirect(base_url() . "admin/user");
		}
		else{
			$this->load->view('modals/delete_user_modal');
		}
	}
}
?>