<?php
class PatientLogin extends CI_Controller {
	
    function __construct()

	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email', 'table'));

       	$this->load->helper("url");
       //	$this->load->model("Home_model");
       
	}

	function index()
	{
	    

				
				$this->load->view("patientlogin_view");
				
		
	}

	
	
}
?>