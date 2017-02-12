<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Uploadfiles extends CI_Model {

public function select_all() {
$this->db->select('*');
$this->db->from('filemgmt');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}

//public function select_one($id) {
//$this->db->select('*');
//$this->db->from('server_list');
//$this->db->where('id', $id);
//$query = $this->db->get();
//if ($query->num_rows() > 0) {
//return $query->result();
//} else {
//return false;
//}
//}


function insertfile($data){
    $this->db->insert('filemgmt', $data);
    return true;
}

//function creddelete($id){
//    $this->db->select('username');
//    $this->db->from('credentials');
//    $this->db->where('id',$id);
//    $query = $this->db->get();
//    if ($query->num_rows() > 0) {
//        $this->db->where('id', $id);
//      $this->db->delete('credentials'); 
//    return $query->result();
//    } else {
//    return false;
//    }
//    
//    
//}
        


}
?>