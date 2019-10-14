<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->library('pagination');
    }

	public function users_index()
	 {
		//$config['base_url'] = base_url()."users/index";
		//$config['per_page'] = 10;
	//	$config['uri_segment'] = '3';
		

	
		//$page = $this->uri->segment(3,0);
		//$data['pagination'] = $this->pagination->create_links();
		//$config['per_page'], $page
		
		$songs = $this->user_model->get_songs();
		//$config['total_rows'] = $this->user_model->getTotalRow();
		//$this->pagination->initialize($config);	

        $this->load->view('includes/header');
        $this->load->view('users/index', ['songs' => $songs]);
        $this->load->view('includes/footer');
    }

    public function users_sign_up()
    {
        $data['title'] = 'Sign Up';

	$this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

	if($this->form_validation->run() === FALSE){

		$this->load->view('includes/header');
		$this->load->view('users/sign_up', $data );
		// $this->load->view('admin_includes/footer');

}else{ 
		// die('continue');
		//encrypt password
		$enc_password = md5( $this->input->post('password'));

		$this->user_model->sign_up_user($enc_password);
		//set message
		$this->session->set_flashdata('user_registered', 'You are now registered as a user and can log in');

		redirect('users/login');
		
}   
}
    
    public function users_login()
    {
        $data['title'] = 'User Login';
            
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() === FALSE){

			$this->load->view('includes/header');
			$this->load->view('users/login', $data );
			// $this->load->view('admin_includes/footer');
			
		}else{ 
			//get username
			$username = $this->input->post('username');
			//get and encrypt the password
			$password = md5($this->input->post('password'));
			//Login user
			$user_id = $this->user_model->login_user($username, $password);
			
			if($user_id){ 
				//create session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);
				//set message
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				redirect('users/index');

			}else{
				
				//set message
				$this->session->set_flashdata('user login_failed', 'login is invalid');

				redirect('users/login');
            }
        }
    }

    public function users_logout()
    {
        $this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		//set message
		$this->session->set_flashdata('user_loggedout', 'You are now logged out');

		redirect('users/login');
    }
    // //search
    // public function keyword()
    // {
    //     $keyword = $this->input->post('song');
    //     $data['results'] = $this->user_model->search($key);

    //     $this->load->view('includes/header');
	// 	$this->load->view('users/$keyview', $data );
	// 		// $this->load->view('admin_includes/footer');
	// }
	 //search
	 public function execute_search()
	 {
		 // Retrieve the posted search term.
		 $search_term = $this->input->post('search');
 
		 // Use a model to retrieve the results.
		 $songs = $this->user_model->get_results($search_term);
 
		 // Pass the results to the view.
		 //$this->load->view('search_results',$data);

		 $this->load->view('includes/header');
		 $this->load->view('users/search_results', ['songs' => $songs]);

	 }
}
