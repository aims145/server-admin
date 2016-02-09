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
		elseif ($this->session->userdata['logged_in']['role'] == 'user') {
				redirect('login', 'refresh');
		}
         $this->load->model('Serverlist');
     }
     
    public function index($msg = NULL){
        // $this->load->library('form_validation');
//         
		//echo $this->session->userdata['logged_in']['role'];
        $data['msg'] = $msg;
        $this->load->view('header');
        $this->load->view('dashboard');
        $data['show_table'] = $this->Serverlist->select_all();
        $data['creddata'] = $this->Serverlist->select_cred();
        $this->load->view('credentials',$data);    
        $this->load->view('footer');
        // echo $this->session->userdata('logged_in')['role'];
    }
    
//     public function show(){
//        $server = $this->input->post('server');
//        $proto = $this->input->post('protocol');
//        $data = $this->Serverlist->cred($server,$proto);
//        $this->load->view('header');
//        $this->load->view('dashboard');
//        $this->load->view('footer');
//    }
//    
    
    public function add(){
        
        $server_ip = $this->input->post('server');
        $ip['row'] = $this->Serverlist->selectname($server_ip);
        $server =  $ip['row']['server_name'];
        $data = array(
            'server_name' => $server,
            'server_ip' => $server_ip,
            'Protocol'  => $this->input->post('protocol'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            
        );
        if($this->Serverlist->credinsert($data)){
            $msg = "Credentials has been Added Successfully";
            $this->index($msg);
        }
         

    }
    
    public function del(){
//        $id = $this->input->post('id');
        $id = $this->input->post('credid');
        if($this->Serverlist->creddelete($id)){
            $msg = "Data has been Deleted Successfully";
            $this->index($msg);
        }
        
    }
    
    
    
    public function update(){
        $id = $this->input->post('credid2');
        $data = array(
        'server_name' => $this->input->post('servername'),
        'server_ip' => $this->input->post('serverip'),
        'Protocol' => $this->input->post('protocol'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
                );
        
        if($this->Serverlist->credupdate($id, $data)){
            $msg = "Data has been Updated Successfully";
            $this->index($msg);
        }
        
    }
}