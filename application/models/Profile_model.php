<?php
class Profile_model extends CI_Model {
    
    public function __construct()
        {
                $this->load->database();
        }

    public function getDetails($loggedIn_id)
    {
        $this->db->select('*');
        $this->db->from('useracc');
        $this -> db -> where('id', $loggedIn_id);
        $query = $this -> db -> get();
        $result = $query->result();
        if($query -> num_rows() >= 1)
        {
            return $result;
        }
        else
        {
            return false;
        }

    }

    public function update($data) 
    {
       
        $this->db->where('id', $data['id']);
       
        $result=$this->db->update('useracc', $data);
    
       
        return $result;
    }

   /* public function image_upload($targetPath, $loggedIn_id) 
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('id', $loggedIn_id);
        //$this->db->where('customer.randomnum', $sessionid);
        $query = $this->db->get();
        //return $result = $query->result();
        if ($query->num_rows() > 0) 
        {
            $imgarr['profile_pic'] = $targetPath;
            $this->db->where('id', $loggedIn_id);
            $result=$this->db->update('login',$imgarr);
            return $result;
        }
        else 
        {
            return FALSE;
        }
    }*/

}
