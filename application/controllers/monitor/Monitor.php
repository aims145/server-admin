<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Monitor extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
		
         $this->load->model('Monitor_model');
		 $this->load->model('Serverlist');
     }
	
	
public function host($msg = NULL){
		$data['msg'] = $msg;
		$data['allhost'] = $this->Serverlist->select_all();
                $data['host'] = $this->Monitor_model->select_all();
		$this->load->view('header');
                $this->load->view('dashboard');
                $this->load->view('monitor/host', $data);
                $this->load->view('footer');
}	
	
	public function hostadd(){
		$host = $this->input->post('servers');
		$result = $this->Monitor_model->addhost($host);
		$this->host($result);
}


public function hostupdate(){
    $flag = $this->input->post('flag');
    $id = $this->input->post('id');
    $data = array('flag' => $flag);
    if($this->Monitor_model->update_host($id,$data)){
        echo "0";
    }
}

public function deletehost(){
    $hostid = $this->input->post('mon_host_id');
     $result = $this->Monitor_model->deletehost($hostid);
     $this->host($result);
}

public function services(){

				$this->load->view('header');
                $this->load->view('dashboard');
                $this->load->view('monitor/services_view');
                $this->load->view('footer');	
	
}

public function reports(){

		$this->load->view('header');
                $this->load->view('dashboard');
                $this->load->view('monitor/reports');
                $this->load->view('footer');	
	
}



 
}