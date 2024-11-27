<?php
class Details_model extends CI_Model {
    
    public function __construct()
        {
                $this->load->database();
        }

   

    public function getDoctorList()
    {
        $sql = "SELECT * FROM useracc  WHERE Account_For='doctor'";
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
    public function getPatientListsToDoctor($doctorId)
    {
        $sql = "SELECT tc.id as careId, tc.docId as docId, tc.patientId, tc.shortDesc, ua.Name, ua.Title, ua.UserName FROM takecare tc LEFT JOIN  useracc ua ON tc.patientId = ua.id WHERE docId=$doctorId";
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
    public function getPatientList()
    {
        $sql = "SELECT * FROM useracc  WHERE Account_For='patient'";
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
    public function getPatientListBydoctor($doctorId)
    {
        $sql = "SELECT * FROM booking  WHERE docId=$doctorId AND status=1";
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
    public function getAllAppointment()
    {
        $sql = "SELECT * FROM booking";
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
    public function getPrescribePatientListBydoctor($doctorId)
    {
        $sql = "SELECT * FROM booking  WHERE docId=$doctorId AND status=2";
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
    public function getDoctorListByPatient($patientId)
    {
        $sql = "SELECT * FROM booking  WHERE patientId=$patientId AND status=1";
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
    public function getPrescribeDoctorListByPatient($patientId)
    {
        $sql = "SELECT * FROM booking  WHERE patientId=$patientId AND status=2";
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
    public function patientListBydoctor($patientId)
    {
        $sql = "SELECT * FROM useracc  WHERE id=$patientId";
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
    public function doctorDetailsBypatient($docId)
    {
        $sql = "SELECT * FROM useracc  WHERE id=$docId";
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
    



  

  
    public function projectassigned($insertdata) 
    {
        $this->db->where('id', $insertdata['id']);
        $result = $this->db->update('project_task', $insertdata);
        return $result;
    }

   
    public function addtDoctorList($insertdata) 
    {
      
        $result = $this->db->insert('useracc', $insertdata);
        return $this->db->insert_id();
    }
    public function bookDoctor($bookingdata) 
    {
        $result = $this->db->insert('booking', $bookingdata);
        return $this->db->insert_id();
    }

    public function updateDoctor($updatetdata)
    {
        $this->db->where('id', $updatetdata['id']);
        $result = $this->db->update('useracc', $updatetdata);
        return $result;
    }
    public function doPrescribe($prescribedata)
    {
        $this->db->where('bookingId', $prescribedata['bookingId']);
        $result = $this->db->update('booking', $prescribedata);
        return $result;
    }
    public function blockDoctor($updatetdata)
    {
        $this->db->where('id', $updatetdata['id']);
        $result = $this->db->delete('useracc');
        return $result;
    }
    public function cancelAppoint($updatetdata)
    {
        $this->db->where('bookingId', $updatetdata['id']);
        $result = $this->db->delete('booking');
        return $result;
    }

   


    public function deletetaskrow($task_id, $Date_of_job)
    {
        $this->db->where('Task_id', $task_id);
        $this->db->where('Date_of_job', $Date_of_job);
        $result = $this->db->delete('timesheet');
        return $result;
    }
   
}
