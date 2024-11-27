<?php
class Profile extends CI_Controller {

    function __construct()
	{
		parent::__construct();
       	$this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email', 'upload'));
        $this->load->database();
       	$this->load->model("profile_model");
	}

	function index()
	{
		if($this->session->userdata('logged_in')!=null) {
			$loggedIn_id = $this->session->userdata('logged_in')['id'];
			$data['details'] = $this->profile_model->getDetails($loggedIn_id);
			$this->load->view("template_view");
			$this->load->view("profileupdate_view", $data);
		}
		else {
			header("location: login");
		}
		
	}

	function update()
	{
		if($this->session->userdata('logged_in')!=null) {
			$loggedIn_id = $this->session->userdata('logged_in')['id'];
			
			
	        //insert the user registration details into database
	        $data = "";
	       // $data['details'] = $this->profile_model->getDetails($loggedIn_id);
		
           
			$this->form_validation->set_rules('Title', 'Title', 'trim|required');
			$this->form_validation->set_rules('Name', 'Name', 'trim|required');
			$this->form_validation->set_rules('Location', 'Location', 'trim|required');
			$this->form_validation->set_rules('City', 'City', 'trim|required');
			$this->form_validation->set_rules('State', 'State', 'trim|required');
			$this->form_validation->set_rules('Country', 'Country', 'trim|required');
			$this->form_validation->set_rules('Zip', 'Pin Code', 'trim|required');
			$this->form_validation->set_rules('Phone1', 'Phone No.', 'trim|required');
			$this->form_validation->set_rules('Email', 'Email Id', 'trim|required');
			$this->form_validation->set_rules('Password', 'Password', 'trim|required');
			$this->form_validation->set_rules('Confirm_Password', 'Confirm Password', 'trim|required|matches[Password]');
			//validate form input
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('msg','<div style="color:red;">Oops! Error.  Please try again later!!!</div>');
					redirect('profile');
					
			}
			else {
				$data = array(
					'id' => $this->input->post('id'),
					'Title' => $this->input->post('Title'),
					'Name' => $this->input->post('Name'),
					'House' => $this->input->post('House'),
					'Street' => $this->input->post('Street'),
					'Location' => $this->input->post('Location'),
					'City' => $this->input->post('City'),
					'State' => $this->input->post('State'),
					'Country' => $this->input->post('Country'),
					'Zip' => $this->input->post('Zip'),
					'Phone1' => $this->input->post('Phone1'),
					'Notes' => $this->input->post('Notes'),
					'password' =>$this->input->post('Password')
				
				);
			
				
			
		
				
				// 'Email' => $this->input->post('Email'),


				 
				

			
				if ($this->profile_model->update($data)) {
				$this->session->set_flashdata('msg','<div style="color:green;">Successfully updated your profile.</div>');
				redirect('profile');
				}
				else {
				$this->session->set_flashdata('msg','<div style="color:red;">Oops! Error.  Please try again later!!!</div>');
				redirect('profile');
				}
			
			}
            
		}
		else {
			header("location: login");
		}
		
	}

}
?>