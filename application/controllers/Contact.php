<?php
class Contact extends CI_Controller {
	
    function __construct()

	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email', 'table'));

       	$this->load->helper("url");
       //	$this->load->model("Home_model");
       
	}

	function index()
	{
	    
			
		//$this->load->library('m_pdf');
        // $html = $this->load->view('GeneratePdfView', [], true);
        // $this->pdf->createPDF($html, 'mypdf', false);
				
				$this->load->view("contact");
				
		
	}

	
	
}
?>