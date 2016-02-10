<?php
class Dashboard extends CI_Controller{
    
	 public function __construct(){
    parent::__construct();
	if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
     $this->load->model('Serverlist');
	 }
	 
    public function dashindex(){
        if($this->session->userdata('logged_in'))
   {
   		$data['serverlist'] = $this->Serverlist->select_all();
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];    
        $this->load->view('header');
        $this->load->view('dashboard',$data);
        $this->load->view('dashindex', $data);
        $this->load->view('footer');
        }
        else
        {
            redirect('login', 'refresh');
        }
        
    }
    
    
    
}





?>