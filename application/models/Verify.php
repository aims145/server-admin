<?php

class Verify extends CI_Model{
     
public function index($username,$password){
   $this -> db -> select('*');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> limit(1);
   
   $query = $this->db->get();
    if($query->num_rows() == 1)
   {
        $res = $query->result();
        $decoded = $this->encrypt->decode($res[0]->password);
		//echo $this->encrypt->encode($password);
		//echo $decoded;
		//die();
     if($password == $decoded){
     return $query->result();
     }
        
   }
   else
   {
     return false;
   }
}
}
