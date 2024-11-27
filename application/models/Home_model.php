<?php
class Home_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    public function profileUpdate($data) 
    {
        $this->db->where('id', $data['id']);
        $result = $this->db->update('useracc', $data);
        return $result;
    }

    public function getProductlist()
    {
        $sql = "SELECT * FROM product";
        $query = $this -> db -> query($sql);
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
    // public function getClintList()
    // {
    //     $sql = "SELECT * FROM clint ORDER BY clint_order";
    //     $query = $this -> db -> query($sql);
    //     $result = $query->result();
    //     if($query -> num_rows() >= 1)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    // public function getSingleProduct($shorturl)
    // {
    //     $sql = "SELECT * FROM product_mngt where shorturl='".$shorturl."' ";
    //     $query = $this -> db -> query($sql);
    //     $result = $query->result();
    //     if($query -> num_rows() >= 1)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    // public function getSingleProductDetails($product_id)
    // {
    //     $sql = "SELECT * FROM product_desc where product_id='".$product_id."' ";
    //     $query = $this -> db -> query($sql);
    //     $result = $query->result();
    //     if($query -> num_rows() >= 1)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    // public function insert_product($data)
    // {
    //     $result=$this->db->insert('product', $data);
    //     return $result;
    // }
    // public function insert_Clint($data)
    // {
    //     $result=$this->db->insert('clint', $data);
    //     return $result;
    // }

    // public function update_banner($data) 
    // {
    //     $this->db->where('banner_id', $data['banner_id']);
    //     $result = $this->db->update('banner', $data);
    //     return $result;
    // }
    // public function cancel_banner($banner_id) 
    // {
    //     $this->db->where('banner_id', $banner_id);
    //     $result = $this->db->delete('banner');
    //     return $result;
    // }
    // public function cancel_Clint($clint_id) 
    // {
    //     $this->db->where('clint_id', $clint_id);
    //     $result = $this->db->delete('clint');
    //     return $result;
    // }
    // public function insert_team($data)
    // {
    //     $result=$this->db->insert('team_mngt', $data);
    //     return $result;
    // }
    // public function getTeamList()
    // {
    //     $sql = "SELECT * FROM team_mngt ORDER BY team_person_order ";
    //     $query = $this -> db -> query($sql);
    //     $result = $query->result();
    //     if($query -> num_rows() >= 1)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    // public function update_team($data) 
    // {
    //     $this->db->where('team_person_id', $data['team_person_id']);
    //     $result = $this->db->update('team_mngt', $data);
    //     return $result;
    // }
    // public function update_Clint($data) 
    // {
    //     $this->db->where('clint_id', $data['clint_id']);
    //     $result = $this->db->update('clint', $data);
    //     return $result;
    // }
    // public function cancel_Team($team_id) 
    // {
    //     $this->db->where('team_person_id', $team_id);
    //     $result = $this->db->delete('team_mngt');
    //     return $result;
    // }
    // public function getProductMngtList()
    // {
    //     $sql = "SELECT * FROM product_mngt  ";
    //     $query = $this -> db -> query($sql);
    //     $result = $query->result();
    //     if($query -> num_rows() >= 1)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    // public function update_product($data) 
    // {
    //     $this->db->where('product_id', $data['product_id']);
    //     $result = $this->db->update('product_mngt', $data);
    //     return $result;
    // }
   
    //  public function cancel_Product($product_id) 
    // {
    //     $this->db->where('product_id', $product_id);
    //     $result = $this->db->delete('product_mngt');
    //     return $result;
    // }
    // public function getProductDescription($product_id)
    // {
    //     $sql = "SELECT * FROM product_desc where product_id='".$product_id."'";
    //     $query = $this -> db -> query($sql);
    //     $result = $query->result();
    //     if($query -> num_rows() >= 1)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    // public function update_productDesc($data) 
    // {
    //     $this->db->where('id', $data['id']);
    //     $result = $this->db->update('product_desc', $data);
    //     return $result;
    // }

    // public function insert_productDesc($data2)
    // {
    //     $result=$this->db->insert('product_desc', $data2);
    //     return $result;
    // }
    // public function cancel_ProductDesc($product_id) 
    // {
    //     $this->db->where('id', $product_id);
    //     $result = $this->db->delete('product_desc');
    //     return $result;
    // }
}

?>