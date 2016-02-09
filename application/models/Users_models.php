<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Users_models extends CI_Model {
    
    public function insert($data){
        $this->db->insert('users', $data);
        return true;
    }
	
	public function select_all(){
                $this->db->select('*');
		$this->db->from('users');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		return $query->result();
		} else {
		return false;
		}
    }
    
    
    public function delusers($userid){
    $this->db->where('id',$userid);
    $this->db->delete('users');
    return true;   
    }

     
    
    
    
}