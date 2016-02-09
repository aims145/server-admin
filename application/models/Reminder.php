<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Reminder extends CI_Model {
    
    public function insert($data){
        $this->db->insert('reminders', $data);
        return true;
    }
	
	public function select_all(){
        $this->db->select('*');
		$this->db->from('reminders');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		return $query->result();
		} else {
		return false;
		}
    }
    
    
public function select_alleod($date){
//    echo $date;
//    die();
        $this->db->select('*');
		$this->db->from('EOD');
                $this->db->where('Date',$date);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		return $query->result();
		} else {
		return false;
		}
    }  
    
    
public function add_eod($data){
     $this->db->insert('EOD', $data);
     return true;    
}

}