<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Imp extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
        $this->load->model('Cmd');
     }
     
	     public function commands(){
                 
        $this->load->library('pagination');
        
        if($this->uri->segment(3) == 1){
        $data['msg'] = "Command Added Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 2){
        $data['msg'] = "Command Updated Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 3){
        $data['msg'] = "Command Deleted Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 4){
        $data['msg'] = "All Fields are Mandatory";
        $data['alert'] = "alert alert-danger";
        }
        
        //pagination settings
        $config['base_url'] = base_url().'server/imp/commands';
        $config['total_rows'] = $this->Cmd->cmdcount();
        //echo $config['total_rows'];
        $config['per_page'] = "5";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['show_table'] = $this->Cmd->select_all($config['per_page'],$data['page']);
        $data['pagination'] = $this->pagination->create_links();
        //load view
        $this->load->view('header');
        $this->load->view('dashboard');
        //$data['show_table'] = $this->Cmd->select_all();
        $this->load->view('imp/commands',$data);
        $this->load->view('footer');
    }
	 
    public function addcmd(){
        $data = array(
        'title' =>  $this->input->post('cmdname'),
        'command' => $this->input->post('command'),
        'description' => $this->input->post('description'),
        'username' =>  $this->session->userdata['logged_in']['username'], 
        'user_id' => $this->session->userdata['logged_in']['id'], 
        'role' => $this->session->userdata['logged_in']['role'], 
        );
        
        foreach ($data as $key => $value){
            if(empty($value)){
                redirect('server/imp/4', 'refresh');
            }
        }
        if($this->Cmd->insert($data)){
            redirect('server/imp/1', 'refresh');
        }
       
    }

    public function links(){
        if($this->uri->segment(4) == 1){
        $data['msg'] = "Command Added Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(4) == 2){
        $data['msg'] = "Command Updated Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(4) == 3){
        $data['msg'] = "Command Deleted Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(4) == 4){
        $data['msg'] = "All Fields are Mandatory";
        $data['alert'] = "alert alert-danger";
        }
        
        if($this->uri->segment(4) == 4){
        $data['msg'] = "Same Title is already in Links. Please use another.";
        $data['alert'] = "alert alert-danger";
        }
        
        $this->load->view('header');
        $this->load->view('dashboard');
        $data['show_table'] = $this->Cmd->select_links();
        $this->load->view('imp/links',$data);
        $this->load->view('footer');
    }


      public function addlink(){
        
        $title =  $this->input->post('linkname');
        $link = $this->input->post('link');
        $des = $this->input->post('details');               
        if($this->Cmd->insertlink($title,$link,$des)){
           redirect('server/imp/links/1', 'refresh');
        }
        else{
            redirect('server/imp/links/5', 'refresh');
        }
        $this->links($msg);
        
       
    }
	  
  public function delcmd(){
        $id = $this->input->post('cmdid');
        if($this->Cmd->delcmd($id)){
               redirect('server/imp/3', 'refresh');
        }
  }


    public function dellink(){
    $id = $this->input->post('linkid');
    if($this->Cmd->dellink($id)){
            $msg = "Command Deleted Successfully";
            $this->links($msg);
    }
}
		
    public function selectone(){
      $id = $this->input->post('cmdid');
      $table = $this->input->post('table');
    //              echo $id." ".$table;
      $result = $this->Cmd->select($id,$table);

        echo json_encode($result);

    }
    
    public function updateone(){
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        if($table == 'imp_cmds'){
        $data = array(
            'title' => $this->input->post('cmdname'),
            'command' => $this->input->post('cmd'),
            'description' => $this->input->post('description')
        );
        
        if($this->Cmd->update($id,$table,$data)){
             redirect('server/imp/2', 'refresh');
        }
        }
        else{
        $data = array(
            'title' => $this->input->post('linkname'),
            'link' => $this->input->post('link'),
            'description' => $this->input->post('description')
        );
        
        if($this->Cmd->update($id,$table,$data)){
            $msg = "Link updated Successfully";
            $this->links($msg);
        }    
        }
                
    }
	
	
	public function searchresult(){
		$string = $this->input->post('string');
		$tab = $this->input->post('table');
		$result = $this->Cmd->search($string,$tab);
		echo json_encode($result);
	}
            
            



public function scripts($msg = NULL)
{

$this->load->library('pagination');
        
        //pagination settings
        $config['base_url'] = base_url().'server/imp/scripts';
        $config['total_rows'] = $this->Cmd->scritpscount();
        //echo $config['total_rows'];
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['show_table'] = $this->Cmd->selectall_scripts($config['per_page'],$data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['msg'] = $msg;
        //load view
        $this->load->view('header');
        $this->load->view('dashboard');
        //$data['show_table'] = $this->Cmd->select_all();
        $this->load->view('imp/scripts',$data);
        $this->load->view('footer');

}

public function addscript(){
$data = array(
		'title' => $this->input->post('scriptname'),
		'script' => $this->input->post('script')		
		);
	if($this->Cmd->insertscript($data)){
            $msg = "Script added Successfully";
//            echo "inserted ".$msg;
            $this->scripts($msg);
        }
	
}



public function sshkeys($msg = NULL)
{

$this->load->library('pagination');
        
        //pagination settings
        $config['base_url'] = base_url().'server/imp/sshkeys';
        $config['total_rows'] = $this->Cmd->keyscount();
        //echo $config['total_rows'];
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['show_table'] = $this->Cmd->selectall_keys($config['per_page'],$data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['msg'] = $msg;
        //load view
        $this->load->view('header');
        $this->load->view('dashboard');
        //$data['show_table'] = $this->Cmd->select_all();
        $this->load->view('imp/keys_view',$data);
        $this->load->view('footer');

}

public function addkey(){
$data = array(
		'title' => $this->input->post('keyname'),
		'keys' => $this->input->post('key')		
		);
	if($this->Cmd->insertkey($data)){
            $msg = "Script added Successfully";
//            echo "inserted ".$msg;
            $this->sshkeys($msg);
        }
	
}

public function delkey(){
	  	$id = $this->input->post('keyid');
		
		if($this->Cmd->delkey($id)){
			$msg = "SSHKey Deleted Successfully";
			$this->sshkeys($msg);
		}
	  }



}