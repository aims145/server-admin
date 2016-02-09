<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Monitor_model extends CI_Model {
    
public function select_all() {
$this->db->select('*');
$this->db->from('monitor_host');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}


   
public function addhost($host){
   	foreach($host as $server){
   		$this->db->query("INSERT INTO `test`.`monitor_host` (`host`, `flag`) VALUES ('".$server."', '0');");
		
   	}
	return "Host inserted Successfully";
   	
   }
public function update_host($id,$data){
    $this->db->where('id',$id);
    $this->db->update('monitor_host',$data);
    return true;
    
    
}
   
public function deletehost($id){
    $this->db->where('id',$id);
    $this->db->delete('monitor_host');
    return "Host Deleted Successfully";
    
}   
   
	
	
}