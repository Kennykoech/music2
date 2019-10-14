<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


	public function __construct()
	{

		$this->load->database();
	}
	//read
	public function get_songs($limit = FALSE, $offset = FALSE)
	{
		if($limit){
			$this->db->limit($limit, $offset);
		}
		
		$this->db->order_by('songs.id', 'DESC');
		$query = $this->db->get('songs');

		if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
		}
	}
	//create
	public function add_song($data){
		return $this->db->insert('songs', $data);
	}
	//update
	public function get_single_song($id)
	{
		$query = $this->db->get_where('songs', array('id' => $id));

		if($query->num_rows() > 0){
			return $query->row();
		}else{
            return false;
		}
	}

	public function update_song($data, $id)
	{
		return $this->db->where('id',$id)
						->update('songs', $data);
	}
	//delete
	public function delete_song($id)
	{
		return $this->db->delete('songs',['id' => $id]);
		
	}
	//register admin
	public function sign_up_admin($enc_password){
		//user data array
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $enc_password,
		);
		//insert admin as a user
		return $this->db->insert('users', $data);
	}
	
	//login admin
	public function login_admin($username, $password){
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
	 //Logout 
	 public function logout_admin(){
		//unset user data
	   $this->session->unset_userdata('logged_in');
	   $this->session->unset_userdata('user_id');
	   $this->session->unset_userdata('username');
	   //set message
	   $this->session->set_flashdata('admin_loggedout', 'You are now logged out');

	   redirect('admin/login');

   }
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
