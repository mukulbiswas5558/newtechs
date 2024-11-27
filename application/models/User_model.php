<?php
class User_model extends CI_Model {
    
    public function __construct()
        {
                $this->load->database();
        }

    public function getUser($user_id)
    {
        // Using query binding to prevent SQL injection
        $sql = "SELECT id, name, username, role, status FROM users WHERE id = ?";
    
        // Binding the $user_id value safely into the query
        $query = $this->db->query($sql, array($user_id));
    
        // Fetch the result as an object
        $result = $query->row(); // This will return the first row as an object, or NULL if not found
    
        // Return the result or false if no user is found
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getAllUsers()
    {
        // Using query to select all users
        $sql = "SELECT id, name, username, role, status FROM users";

        // Execute the query
        $query = $this->db->query($sql);

        // Fetch all results as an array of objects
        $result = $query->result(); // This returns all rows as an array of objects

        // Check if there are any results
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
   
}
