<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends CI_Controller
{
    private $jwt_key = "your_secret_key"; // Replace with your own secret key

    public function __construct()
    {
        parent::__construct();
        require_once APPPATH . '../vendor/autoload.php';
        $this->load->model('Login_model'); // Change to correct model if needed
        $this->load->library('session');
    }

    /**
     * User login method
     */
    public function login()
    {
        // Get user credentials
		$raw_data = file_get_contents('php://input');
		

        $json_data = json_decode($raw_data, true);
		$username = isset($json_data['username']) ? $json_data['username'] : '';
		$password = isset($json_data['password']) ? $json_data['password'] : '';
		

        // Verify user credentials
        $result = $this->Login_model->loginuser($username); // Make sure this points to the correct model

        if ($result) {
            // Compare the provided password with the hashed password from the database
            if (password_verify($password, $result->password)) {
                // Generate JWT token if the password is correct
                $payload = [
                    'iss' => base_url(), // Issuer of the token
                    'iat' => time(), // Issued at
                    'exp' => time() + 3600, // Expiration time (1 hour from now)
                    'user_id' => $result->id,
                    'role' => $result->role_id
                ];

                $token = JWT::encode($payload, $this->jwt_key, 'HS256');

                $response = [
                    'success' => true,
                    'message' => 'Login successful',
                    'token' => $token
                ];

                echo json_encode($response, JSON_PRETTY_PRINT);
            } else {
                // Password does not match
                $response = [
                    'success' => false,
                    'message' => 'Invalid credentials'
                ];
                 
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        } else {
            // User not found
            $response = [
                'success' => false,
                'message' => 'Invalid credentials'
            ];

            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    /**
     * Decode and validate the token
     */
    public function validate_token()
    {
        $token = $this->input->get_request_header('Authorization');

        if (!$token) {
            $response = [
                'success' => false,
                'message' => 'Token not provided'
            ];

            echo json_encode($response, JSON_PRETTY_PRINT);
            return;
        }

        try {
            // Remove "Bearer " from the token if included
            $token = str_replace('Bearer ', '', $token);

            // Decode and validate the token
            $decoded = JWT::decode($token, new Key($this->jwt_key, 'HS256'));

            // Token is valid
            $response = [
                'success' => true,
                'message' => 'Token is valid',
                'data' => $decoded
            ];

            echo json_encode($response, JSON_PRETTY_PRINT);
        } catch (Exception $e) {
            // Token is invalid
            $response = [
                'success' => false,
                'message' => 'Invalid token: ' . $e->getMessage()
            ];

            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}
?>
