<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
		elseif ($this->session->userdata['logged_in']['role'] == 'user') {
				redirect('login', 'refresh');
		}
         $this->load->model('Users_models');
         $this->load->library('encrypt');
         
     }
     
    public function index($msg = NULL){
        // $this->load->library('form_validation');
//         
		//echo $this->session->userdata['logged_in']['role'];
        
        $data['msg'] = $msg;
        $data['users'] = $this->Users_models->select_all();
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('users',$data);
        $this->load->view('footer');
        // echo $this->session->userdata('logged_in')['role'];
    }
    
    public function adduser(){
       
   $password = $this->input->post('pass1');
   $encpass = $this->encrypt->encode($password);
    
        $data = array(
          'fname' => $this->input->post('fname'),
          'lname' => $this->input->post('lname'),  
          'username'  => $this->input->post('uname'),
          'password'  => $encpass,
          'email' => $this->input->post('email'), 
          'role' => $this->input->post('role')  
        );
        if($this->Users_models->insert($data)){
            redirect('admin/users');
        }
        
    }
    
    
    public  function deluser(){
        $userid = $this->input->post('userid');
        if($this->Users_models->delusers($userid)){
            redirect('admin/users');
        }
        
    }
 
}