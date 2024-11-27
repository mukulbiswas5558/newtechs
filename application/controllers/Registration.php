<?php
class Registration extends CI_Controller {
	
    function __construct()

	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email', 'table'));

       	$this->load->helper("url");
       	$this->load->model("details_model");

     
	}

	function index()
	{
	    
			
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		$contact = $this->input->post('contact');

		$password = $this->input->post('password');
	  
	  
		$date = date("Y-m-d");
				
		$insertdata = array('Title' => $this->input->post('lname'),
							 'Name' => $this->input->post('fname'),
							 'Account_For' => 'patient',
							 'UserName' => $this->input->post('email'),
							 'State' => 'wb',
							 'Phone1' => $this->input->post('contact'),
							 'gender' => $this->input->post('gender'),
							 'Location' => 'wb',
							 'password' => $this->input->post('password'),
							 'Status' => 1,
					   
							 'last_login' => $date
					);
				
				
				   
			   
	   // $insert_id = $this->adminnewtask_model->task_insert($insertdata);
	   if ($this->details_model->addtDoctorList($insertdata)) {
        $this->session->set_flashdata('success', 'Registration successfully completed! ',300);
		redirect('login');
		}
		else {
			$this->session->set_flashdata('error', 'Something is wrong. Error!!');
			redirect('login');
		}
				
		
	}

	
	
}
?>