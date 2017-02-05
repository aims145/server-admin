<?php
class Tools extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
         $this->load->model('Packages');
     }
   
public function terminal(){
                
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('terminal');
        $this->load->view('footer');
       
    }

}

