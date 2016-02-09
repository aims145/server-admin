<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Cmd extends CI_Model {
    
    public function insert($data){
        $this->db->insert('imp_cmds', $data);
        return true;
    }
    

        public function select_all($limit, $start) {
        //$sql = "imp_cmds ORDER BY `imp_cmds`.`time` ASC limit ".$start.",".$limit;
       $this->db->limit($limit, $start);
       $query = $this->db->get("imp_cmds");
        
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
        }
        public function cmdcount(){
            return $this->db->count_all("imp_cmds");
        }   
// 		
 // public function select_all() {
        // $this->db->select('*');
        // $this->db->from('imp_cmds');
        // $query = $this->db->get();
        // if ($query->num_rows() > 0) {
        // return $query->result();
        // } else {
        // return false;
        // }
        // }
 
 
 
public function insertlink($title,$link,$des){
        $this->db->select('title');
        $this->db->from('imp_links');
        $query = $this->db->get();
        $alltitles = $query->result();
        
        foreach ($alltitles as $old){
        if($title == $old->title){
            return "Link with Same title already Exist";
        }
        }
        $data = array(
                'title' => $title,
                'link'  => $link,
                'description' => $des
            );
            $this->db->insert('imp_links', $data);
            return "Link inserted Successfully";
    }

        public function select_links() {
        $this->db->select('*');
        $this->db->from('imp_links');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
        }
  
  public function delcmd($id){
  	$this->db->where('id',$id);
    $this->db->delete('imp_cmds');
    return true;
  }

    public function dellink($id){
    $this->db->where('id',$id);
    $this->db->delete('imp_links');
    return true;
  }
  public function select($id,$tab){
      $this->table = $tab;
      $this->db->select('*');
      $this->db->from($tab);
      $this->db->where('id',$id);
      $query = $this->db->get();
      if($query->num_rows() > 0) {
          return $query->result();
      }
 else {
      return false;    
      }
    
        
  }

  public function update($id,$table,$data){
      $this->table = $table;
      $this->db->where('id',$id);
      $this->db->update($table,$data);
      return true;
  }
  
  
  public function search($string,$tab){
  	
	$this->table = $tab;
	$this->db->like('title',$string);
	$this->db->or_like('description',$string);
	$query = $this->db->get($tab);
	if($query->num_rows() > 0) {
          return $query->result();
      }
 else {
      return false;    
      }
	
  	
  }


 public function selectall_scripts($limit, $start) {
        //$sql = "imp_cmds ORDER BY `imp_cmds`.`time` ASC limit ".$start.",".$limit;
       $this->db->limit($limit, $start);
       $query = $this->db->get("imp_scripts");
        
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
        }
        public function scritpscount(){
            return $this->db->count_all("imp_scripts");
        }   

    public function insertscript($data){
        $this->db->insert('imp_scripts', $data);
        return true;
    }
	
public function selectall_keys($limit, $start) {
        //$sql = "imp_cmds ORDER BY `imp_cmds`.`time` ASC limit ".$start.",".$limit;
       $this->db->limit($limit, $start);
       $query = $this->db->get("imp_keys");
        
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
        }
        public function keyscount(){
            return $this->db->count_all("imp_keys");
        }   

    public function insertkey($data){
        $this->db->insert('imp_keys', $data);
        return true;
    }
		
	public function delkey($id){
    $this->db->where('id',$id);
    $this->db->delete('imp_keys');
    return true;
  }
	
	
}