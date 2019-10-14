<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
	
	public function admin_index($offset = 0)
	{	
		//pagination config
		$config['base_url'] = base_url();
		$config['total_rows'] = $this->db->count_all('songs');
		$config['per_page'] = 5;
		// $config['uri_segment'] = 1;
		$config['attributes'] = array('class' => 'pagination-link');

		//initialize pagination
		$this->pagination->initialize($config);
		//var_dump('not working');

		$data['title'] ='List of songs';
		//var_dumb(base_url());
		//var_dumb('not showing');

		$songs = $this->admin_model->get_songs(FALSE, $config['per_page'], $offset);

        $this->load->view('admin_includes/header', $data);
        $this->load->view('admin/index', ['songs' => $songs]);
        $this->load->view('admin_includes/footer');
	}

	public function admin_sign_up()
	{
		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
		
		if($this->form_validation->run() === FALSE){

			$this->load->view('admin_includes/header');
			$this->load->view('admin/sign_up', $data );
			// $this->load->view('admin_includes/footer');

		}else{ 
		  // die('continue');
		  //encrypt password
		  $enc_password = md5( $this->input->post('password'));

		  $this->admin_model->sign_up_admin($enc_password);
			//set message
		  $this->session->set_flashdata('admin_registered', 'You are now registered as an admin and can log in');

		  redirect('admin/login');
		 
		}   
	}

	public function admin_login()
	{
		$data['title'] = 'Admin Login';
            
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() === FALSE){

			$this->load->view('admin_includes/header');
			$this->load->view('admin/login', $data );
			// $this->load->view('admin_includes/footer');
			
		}else{ 
			//get username
			$username = $this->input->post('username');
			//get and encrypt the password
			$password = md5($this->input->post('password'));
			//Login user
			$user_id = $this->admin_model->login_admin($username, $password);
			
			if($user_id){ 
				//create session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);
				//set message
				$this->session->set_flashdata('admin_loggedin', 'You are now logged in');

				redirect('admin');

			}else{
				
				//set message
				$this->session->set_flashdata('admin login_failed', 'login is invalid');

				redirect('admin/login');
			}     
		}    
   }

	public function admin_logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		//set message
		$this->session->set_flashdata('admin_loggedout', 'You are now logged out');

		redirect('admin/login');
	}
	//create
	public function create_song()
	{
		
		$data['title'] = 'Add Song';

		$this->load->view('admin_includes/header');
        $this->load->view('admin/create', $data);
        // $this->load->view('admin_includes/footer');
	}

	public function save_song()
	{	
		//song config
		$config['upload_path'] = './assets/songs/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '10000000';
		// //image config
		// $image_config['upload_path'] = './assets/images/';
		// $image_config['allowed_types'] = '*';
		// $image_config['max_size'] = '2048';
		// $image_config['max_width'] = '2000';
		// $image_config['max_height'] = '2000';
		
		$this->load->library('upload', $config);
		$song_url = base_url().'./assets/songs/' .$_FILES['userfile']['name'];
		var_dump($song_url);

		if(!$this->upload->do_upload('userfile')){
			$errors = array('error'=> $this->upload->display_errors());
			// var_dump('here is about song file');
			// var_dump($errors);
		}else{
			//var_dump('no error');
			$data = array('upload_data' => $this->upload->data());
			
	
		//redirect('admin');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('song', 'Enter song', 'required');
		$this->form_validation->set_rules('type', 'Enter type', 'required');

		if ($this->form_validation->run())
		{
				$data = $this->input->post();
				$data['song_url'] = $song_url;
				//$data['song_cover'] = $cover_url;

				unset($data['submit']);
				if($this->admin_model->add_song($data))
				{
					$this->session->set_flashdata('msg', 'song added successfully');
				}else
				{
					$this->session->set_flashdata('msg', 'song not added successfully');
				}
				return redirect('admin');
		}
		else
		{
				echo validation_errors();
		}
	}
}
	//update
	public function update_song($id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}

		// $data['title'] = 'Update Song';
		
		$song = $this->admin_model->get_single_song($id);

		$this->load->view('admin_includes/header');
        $this->load->view('admin/update',['song'=>$song]);
		
	}

	public function change($id){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('song', 'Enter song', 'required');
		$this->form_validation->set_rules('type', 'Enter type', 'required');

		if ($this->form_validation->run())
		{
				$data = $this->input->post();
				unset($data['submit']);
				if($this->admin_model->update_song($data, $id))
				{
					$this->session->set_flashdata('msg', 'song updated  successfully');
				}else
				{
					$this->session->set_flashdata('msg', 'song not updated successfully');
				}
				return redirect('admin');
		}
		else
		{
				echo validation_errors();
		}
	 }
	 //view
	 public function view($id)
	 {
		if(!$this->session->userdata('logged_in')){

			redirect('admin/login');
		}

		$song = $this->admin_model->get_single_song($id);

		$this->load->view('admin_includes/header');
        $this->load->view('admin/view',['song'=>$song]);

	 }
	 //
	 public function delete($id)
	 {
		if(!$this->session->userdata('logged_in')){

			redirect('admin/login');
		}

		if($this->admin_model->delete_song($id))
		{
			$this->session->set_flashdata('msg', 'song deleted successfully');
		}
		else
		{
			$this->session->set_flashdata('msg', 'song not deleted successfully');
		}

		redirect('admin');	
	 }
	 //search
	 public function execute_search()
	 {
		 // Retrieve the posted search term.
		 $search_term = $this->input->post('search');
 
		 // Use a model to retrieve the results.
		 $songs = $this->admin_model->get_results($search_term);
 
		 // Pass the results to the view.
		 //$this->load->view('search_results',$data);

		 $this->load->view('admin_includes/header');
		 $this->load->view('admin/search_results', ['songs' => $songs]);

	 }

	}

	
	


