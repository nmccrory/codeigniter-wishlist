<?php 

class Process extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function validateReg($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', "Name", 'required|alpha|min_length[3]');
		$this->form_validation->set_rules('username', "Username", 'required|min_length[3]');
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
		$this->form_validation->set_rules('username', "Username", 'required');
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

		$query = "INSERT INTO users (name, username, date_hired, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($post['name'], $post['username'], $post['date_hired'], $encrypt_pass);
		$this->db->query($query, $values);
	}

	public function getUser($post){
		$encrypt_pass = md5($post['password']);
		
		$query = "SELECT id, name, username, date_hired, created_at, updated_at FROM users WHERE username=? AND password=?";
		$values = array($post['username'], $encrypt_pass);
		return $this->db->query($query, $values)->row_array();
	}
	public function getUserbyId($id){
		$query = "SELECT * FROM users WHERE users.id = $id";
		return $this->db->query($query)->row_array();
	}

	public function getAllWishes($user_id){
		$query = "SELECT item_name, users.name, items.created_at, items.id, added_by FROM items JOIN users ON items.added_by = users.id  WHERE items.id NOT IN (SELECT item_id FROM wishlists WHERE user_id = $user_id) ORDER BY items.created_at DESC";
		return $this->db->query($query)->result_array();
	}
	public function getWishesbyId($id){
		$query = "SELECT item_name, users.name, items.created_at, user_id, item_id, added_by FROM items JOIN wishlists ON items.id = wishlists.item_id JOIN users ON items.added_by = users.id WHERE wishlists.user_id = $id";
		return $this->db->query($query)->result_array();
	}

	public function addtoWishlist($user_id, $item_id){
		$query = "INSERT INTO wishlists (user_id, item_id) VALUES (?,?)";
		$values = array($user_id, $item_id);
		$this->db->query($query, $values);
	}

	public function validateAddition($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('item', "Item", 'required|min_length[3]');
		
		if($this->form_validation->run() === FALSE){
			return FALSE;
		}else{
			$this->addItem($post);
		}
	}
	public function addItem($post){
		$query = "INSERT INTO items (item_name, added_by, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
		$values = array($post['item'], $post['user_id']);
		$this->db->query($query, $values);
		$insert_id = $this->db->insert_id();
		$this->addtoWishlist($post['user_id'],$insert_id);
	}

	public function viewItem($item_id){
		$query = "SELECT item_name FROM wishlists JOIN items ON wishlists.item_id = items.id WHERE wishlists.item_id = $item_id";
		return $this->db->query($query)->row_array();
	}

	public function wishedBy($item_id){
		$query = "SELECT users.name FROM wishlists JOIN users ON wishlists.user_id = users.id WHERE wishlists.item_id = $item_id";
		return $this->db->query($query)->result_array();
	}

	public function removefromWishlist($user_id, $item_id){
		$query = 'DELETE FROM wishlists WHERE wishlists.user_id = ? AND wishlists.item_id = ?';
		$values = array($user_id,$item_id);
		$this->db->query($query, $values);
	}

	public function deleteItem($id){
		$query = 'DELETE FROM items WHERE items.id = ?';
		$values = array($id);
		$this->db->query($query, $values);
	}
}
?>