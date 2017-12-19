<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{
	
	public function login(){
		$email = $this->input->post("email");
		$password = $this->input->post("password");
	
		$this->load->model("auth_model");
		$userPassword = $this->auth_model->userPass($email);
		if($userPassword !== FALSE){
			if($password === $userPassword){
				$this->session->set_userdata("email", $email);
				$this->session->set_flashdata("success_message", "Login Successful");
			}
			else{
				$this->session->set_flashdata("error_message", "Invalid Credentials");
			}
		}
		else{
			$this->session->set_flashdata("error_message", "Username does not exists");
		}
		
		redirect(base_url());
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function register(){
		$this->load->model('admin_model');
		$_POST['newsletter'] = $this->input->post("newsletter") !== FALSE ? 1 : 0;
		if(!$this->admin_model->add($_POST)){
			$this->session->set_flashdata("success_message", "Registration successful!");
		}
		else{
			$this->session->set_flashdata("error_message", "Registration Failed!");
		}
		redirect(base_url() . "admin/user");
	}
	
	public function test(){
		echo $this->session->userdata("email");
	}
}
	