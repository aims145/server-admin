<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Credentials extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
//		elseif ($this->session->userdata['logged_in']['role'] == 'user') {
//				redirect('login', 'refresh');
//		}
         $this->load->model('Serverlist');
     }
     
    public function index(){
                
         if($this->uri->segment(3) == 1){
        $data['msg'] = "Credential Added Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 2){
        $data['msg'] = "Credential Updated Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 3){
        $data['msg'] = "Credential Deleted Successfully";
        $data['alert'] = "alert alert-danger";
        }
        
        if($this->uri->segment(3) == 4){
        $data['msg'] = "All Fields are Mandatory";
        $data['alert'] = "alert alert-danger";
        }
        
        $this->load->view('header');
        $this->load->view('dashboard');
        $data['show_table'] = $this->Serverlist->select_all();
        $data['creddata'] = $this->Serverlist->select_cred();
        $this->load->view('credentials',$data);    
        $this->load->view('footer');
        
    }
    
 
    
    public function add(){
        
        $server_ip = $this->input->post('server');
        $ip['row'] = $this->Serverlist->selectname($server_ip);
        $server =  $ip['row']['server_name'];
        $data = array(
            'server_name' => $server,
            'server_ip' => $server_ip,
            'Protocol'  => $this->input->post('protocol'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'pass_expiry' => $this->input->post('expiry'),
            'user_id' => $this->session->userdata['logged_in']['id'], 
            'role' => $this->session->userdata['logged_in']['role'], 
        );
        
        foreach ($data as $key => $value){
            if(empty($value)){
                redirect('server/credentials/4', 'refresh');
            }
        }
        
        if($this->Serverlist->credinsert($data)){
            redirect('server/credentials/1', 'refresh');
        }
         

    }
    
    public function del(){
//        $id = $this->input->post('id');
        $id = $this->input->post('credid');
        if($this->Serverlist->creddelete($id)){
            redirect('server/credentials/3', 'refresh');
        }
        
    }
    
    
    
    public function update(){
        $id = $this->input->post('credid2');
        $data = array(
        'server_name' => $this->input->post('servername'),
        'server_ip' => $this->input->post('serverip'),
        'Protocol' => $this->input->post('protocol'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'pass_expiry' => $this->input->post('expiry')        
                );
                
        foreach ($data as $key => $value){
            if(empty($value)){
                redirect('server/credentials/4', 'refresh');
            }
        }
        
        
        if($this->Serverlist->credupdate($id, $data)){
            redirect('server/credentials/2', 'refresh');
        }
        
    }
    
    
    public function selectone(){
        $id = $this->input->post('id');
        $data = $this->Serverlist->select_cred_one($id);
        echo json_encode($data);
      
    }
}