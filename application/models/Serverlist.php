<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Serverlist extends CI_Model {

public function select_all() {
$this->db->select('*');
$this->db->from('server_list');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}

public function select_one($id) {
$this->db->select('*');
$this->db->from('server_list');
$this->db->where('id', $id);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}



function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('server_list');
    return true;
}

function  selectone($id){
    $this->db->select('*');
    $this->db->from('server_list');
    $this->db->where('id',$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
    return $query->result();
    } else {
    return false;
    }
    
}
function updateone($id,$data){
    $this->db->where('id', $id);
    $this->db->update('server_list', $data);
    return true;
}

function credinsert($data){
    $this->db->insert('credentials', $data);
    return true;
}

function creddelete($id){
    $this->db->select('username');
    $this->db->from('credentials');
    $this->db->where('id',$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $this->db->where('id', $id);
      $this->db->delete('credentials'); 
    return $query->result();
    } else {
    return false;
    }
    
    
}


function credupdate($id, $data){
    $this->db->where('id',$id);
    $this->db->update('credentials',$data);
    return true;
}
        
function selectname($ip){
    $this->db->select('server_name');
    $this->db->from('server_list');
    $this->db->like('server_ip',$ip);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
    return $query->row_array();
    } else {
    return false;
    }
}

public function select_cred() {
$this->db->select('*');
$this->db->from('credentials');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}

}
?>