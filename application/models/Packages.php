<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Packages extends CI_Model {
    
    public function available(){
        $this->db->select('package');
        $this->db->from('packages');
        $this->db->where('server_name','Localhost');
        $this->db->where('status','Available');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
        }
    
}