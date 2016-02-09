<?php 
class Login extends CI_Controller{
    
public function index(){
	$this->load->helper(array('form'));
    if($this->session->userdata('logged_in'))
   {
        redirect('admin', 'refresh');
    }
    else{
        $this->load->view('header');
        $this->load->view('loginview');
        $this->load->view('footer');
    }
    
}
   
}
