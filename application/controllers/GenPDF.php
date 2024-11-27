<?php
class GenPDF extends CI_Controller {
	
    function __construct()

	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email', 'table'));

       	$this->load->helper("url");
       //	$this->load->model("Home_model");
       
	}

	function index()
	{
		
					$name="mukul";
					$pdfFilePath = FCPATH.'invoice/'.$name.'.pdf';
					echo "mukkkk";
					echo $pdfFilePath;


					
					// ob_clean();
					// $html="mukul bbb";
					 $this->load->library('m_pdf');


					// $this->m_pdf->pdf->WriteHTML($html);

					// $this->m_pdf->pdf->Output($pdfFilePath, "F");
		
	}

	
	
}
?>