<?php
class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("User_model");

	}

	function getUser($user_id)
	{
		
		$data = $this->User_model->getUser($user_id);

		// Check if user data is found
		if ($data) {
			$response = [
				'success' => true,
				'data' => $data
			];
		} else {
			$response = [
				'success' => false,
				'data' => null // Set data to null if no user is found
			];
		}

		// Output the response with JSON_PRETTY_PRINT for readability
		echo json_encode($response, JSON_PRETTY_PRINT);


	}
	function getUsers()
	{
		
		$data = $this->User_model->getAllUsers();
		if ($data) {
			$response = [
				'success' => true,
				'data' => $data
			];
		} else {
			$response = [
				'success' => false,
				'data' => $data
			];
		}
		
		// Output the response with JSON_PRETTY_PRINT
		echo json_encode($response, JSON_PRETTY_PRINT);


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