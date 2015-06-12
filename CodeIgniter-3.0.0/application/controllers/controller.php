<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		$this->load->view('index');
	}
	//add redirect route on success
	public function register(){
		$this->load->model('process');
		if($this->process->validateReg($this->input->post())){
			if($this->process->validateLog($this->input->post())){
				$this->session->set_userdata('logged_user', $this->process->validateLog($this->input->post()));
				redirect('');
			}
		}else{
			$this->session->set_flashdata('errors', validation_errors());
		}
	}
	//add redirect route on success
	public function login(){
		$this->load->model('process');
		if($this->process->validateLog($this->input->post())){
			$this->session->set_userdata('logged_user', $this->process->validateLog($this->input->post()));
			redirect('');
		}else{
			$this->session->set_flashdata('errors', 'Wrong username or password');
			$this->load->view('view', $this->session->flashdata('errors'));
		}
	}

	public function logout(){
		session_destroy();
		redirect('/');
	}

	public function showUser($id){
		$this->load->model('process');
		$this->load->view('user', array('user'=>$this->process->getUserbyId($id)));
	}
}
?>