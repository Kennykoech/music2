<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}	
	
	// private $lastQuery = "";
	//read
	public function get_songs()
	{
		// $this->db->order_by('songs.id', 'DESC');
		//$this->db->limit($limit, $offset);
		$query = $this->db->get('songs');
		//$this->lastQuery = $this->db->last_query();

		if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
		}
	}

	// public function getTotalRow(){

	// 	$sql = explode('LIMIT',$this->$lastQuery);
	// 	$query = $this->db->query($sql[0]);
	// 	$result = $query->result();

	// 	 $result;
	// }
	//register user
	public function sign_up_user($enc_password){
		//user data array
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $enc_password,
		);
		//insert a user
		return $this->db->insert('users', $data);
	}
	
	//login user
	public function login_user($username, $password){
		//validate
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if($result->num_rows() == 1){
			return $result->row(0)->id;
		}else{
			return false;
		}   
	}
	 //Logout user
	 public function logout_user(){
		//unset user data
	   $this->session->unset_userdata('logged_in');
	   $this->session->unset_userdata('user_id');
	   $this->session->unset_userdata('username');
	   //set message
	   $this->session->set_flashdata('user_loggedout', 'You are now logged out');

	   redirect('users/login');
   }
   //search
//    public function search($key)
//    {
// 	   $this->db->like('song', $key);
// 	   $query = $this->db->get('songs');

// 	   return $query->result();
//    }
  //search
  public function get_results($search_term='default')
  {
	  // Use the Active Record class for safer queries.
	  $this->db->select("*");
	  $this->db->from("songs");
	  $this->db->like("song",$search_term);
	  $this->db->or_like("artist", $search_term);

	  // Execute the query.
	  $query = $this->db->get();

	  // Return the results.
	  return $query->result();
  }
}
