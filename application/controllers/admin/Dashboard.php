<?php
class Dashboard extends CI_Controller{
    
	 public function __construct(){
    parent::__construct();
	if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
     $this->load->model('Serverlist');
 }
	
    public function index(){
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
   
    public function dashindex(){
        if($this->session->userdata('logged_in'))
   {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];    
        $this->load->view('header');
        $this->load->view('dashboard',$data);
        $this->load->view('dashindex');
        $this->load->view('footer');
        }
        else
        {
            redirect('login', 'refresh');
        }
        
    }
    
    
    
}





?>