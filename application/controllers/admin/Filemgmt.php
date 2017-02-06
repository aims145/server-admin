<?php

class Filemgmt extends CI_Controller{
    public function __construct(){
    parent::__construct();
	if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
     $this->load->model('');
 }
    public function upload(){
        // $data['show_table'] = $this->Serverlist->select_all();
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('filemgmt/upload');
        $this->load->view('footer');

    }
    

    

}
