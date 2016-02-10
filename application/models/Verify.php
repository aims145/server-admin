<?php

class Verify extends CI_Model{
    
public function index($username,$password){
    $this -> db -> select('*');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
   
   $query = $this->db->get();
    if($query->num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
}
}
