<?php 

class Process extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function validateReg($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', "First Name", 'required|alpha');
		$this->form_validation->set_rules('last_name', "Last Name", 'required|alpha');
		$this->form_validation->set_rules('email', "Email", 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', "Password", 'required|min_length[8]|matches[confirm_password]|trim');
		$this->form_validation->set_rules('confirm_password', "Confirm Password", 'required|trim');

		if($this->form_validation->run() === FALSE){
			return FALSE;
		}else{
			if($this->createUser($post) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}

	public function validateLog($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', "email", 'required|matches[users.email]|valid_email');
		$this->form_validation->set_rules('password', "Password", 'required');

		if($this->form_validation->run() === FALSE){
			return FALSE;
		}else{
			if($this->getUser($post) === FALSE){
				return FALSE;
			}else{
				return $this->getUser($post);
			}
		}
	}

	public function createUser($post){
		$encrypt_pass = md5($post['password']);

		$query = "INSERT INTO users (first_name, last_name, email, alias, password, created_at, updated_at) VALUES (?,?,?,?,?, NOW(), NOW())";
		$values = array($post['first_name'],$post['last_name'], $post['email'], $post['alias'], $encrypt_pass);
		$this->db->query($query, $values);
	}

	public function getUser($post){
		$encrypt_pass = md5($post['password']);
		
		$query = "SELECT id, first_name, last_name, alias, email, created_at, updated_at FROM users WHERE email=? AND password=?";
		$values = array($post['email'], $encrypt_pass);
		return $this->db->query($query, $values)->row_array();
	}
	public function getUserbyId($id){
		$query = "SELECT * FROM users WHERE users.id = $id";
		return $this->db->query($query)->row_array();
	}
?>