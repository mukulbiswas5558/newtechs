<?php
class Details extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library(array('session'));

		$this->load->model("details_model");
	}

	function index()
	{

		if (isset($this->session->userdata['logged_in'])) {
			if ($this->session->userdata['logged_in']['role'] == "admin") {

				$this->load->view("header_view");
				$this->load->view("admin_view");
				$this->load->view("footer_view");
				//$this->load->view("admintasklist_temp_view", $data);
			} else {
				header("location: login");


			}

		} else {
			header("location: login");
		}


	}
	function profile()
	{

		if (isset($this->session->userdata['logged_in'])) {
			if ($this->session->userdata['logged_in']['role'] == "admin") {


				$this->load->view("header_view");
				$this->load->view("profile_view");
				$this->load->view("footer_view");
			} else {
				header("location: login");


			}

		} else {
			header("location: login");
		}


	}
	public function logout()
	{
		if (isset($this->session->userdata['logged_in'])) {
			if ($this->session->userdata['logged_in']['role'] == "admin") {
				// Removing session data
				$sess_array = array(
					'id' => '',
					'name' => '',
					'username' => '',
					'role' => '',
					'status' => ''
				);
				$this->session->unset_userdata('logged_in', $sess_array);
				
				redirect('login');
			} else {
				header("location: login");


			}

		} else {
			header("location: login");
		}

	}
	public function dompdf()
	{
		// Load the Pdf library
		$this->load->library('Pdf');

		// Create HTML content
		$html = '<h1>PDF Title</h1>';
		$html .= '<p>This is a sample PDF generated using Dompdf in CodeIgniter 3 and saved to the assets folder.</p>';

		// Ensure 'assets/pdf' directory exists (Create it if not)
		if (!is_dir(FCPATH . 'assets/pdf')) {
			mkdir(FCPATH . 'assets/pdf', 0777, true);  // Create the directory with appropriate permissions
		}

		// Generate and save the PDF
		$this->pdf->createPDF($html, 'sample_pdf', false);  // 'false' means no stream, just save

		echo "PDF generated and saved to assets/pdf/sample_pdf.pdf";
	}


}
?>