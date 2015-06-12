<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		$this->load->view('main');
	}
	//add redirect route on success
	public function register(){
		$this->load->model('process');
		if($this->process->validateReg($this->input->post())){
			if($this->process->validateLog($this->input->post())){
				$this->session->set_userdata('logged_user', $this->process->validateLog($this->input->post()));
				redirect('/dashboard');
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
			redirect('/dashboard');
		}else{
			$this->session->set_flashdata('errors', 'Wrong username or password');
			$this->load->view('main', $this->session->flashdata('errors'));
		}
	}

	public function logout(){
		session_destroy();
		redirect('/');
	}

	public function showDashboard(){
		$this->load->model('process');
		$this->load->view('dashboard', array('user'=>$this->process->getUserbyId($this->session->userdata('logged_user')['id']), 'wishlist'=>$this->process->getWishesbyId($this->session->userdata('logged_user')['id']), 'otherswishes'=>$this->process->getAllWishes()));
	}
	public function addtoWishlist($item_id){
		$this->load->model('process');
		$this->process->addtoWishlist($this->session->userdata('logged_user')['id'], $item_id);
		redirect('/dashboard');
	}
	public function createWish(){
		$this->load->view('create');
	}
	public function addItem(){
		$this->load->model('process');
		$this->process->addItem($this->input->post());
		redirect('/dashboard');
	}

	public function viewItem($item_id){
		$this->load->model('process');
		$this->load->view('itempage', array('item'=>$this->process->viewItem($item_id), 'wishedby'=>$this->process->wishedBy($item_id)));
	}

	public function removefromWishlist($id){
		$this->load->model('process');
		$this->process->removefromWishlist($this->session->userdata('logged_user')['id'], $id);
		redirect('/dashboard');
	}

	public function deleteItem($id){
		$this->load->model('process');
		$this->process->deleteItem($id);
		redirect('/dashboard');
	}
}
?>