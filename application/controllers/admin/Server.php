<?php
class Server extends CI_Controller{
    
     public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
         $this->load->model('Serverlist');
     }
    public function serverlist(){
        //$this->load->model('serverlist');
        
        if($this->uri->segment(3) == 1){
        $data['msg'] = "Server Added Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 3){
        $data['msg'] = "Server Deleted Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        if($this->uri->segment(3) == 4){
        $data['msg'] = "This IP already Exist into Database";
        $data['alert'] = "alert alert-danger";
        }
        
        
        $data['show_table'] = $this->Serverlist->select_all();
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('serverlist',$data);
        $this->load->view('footer');
       
    }
	
	public function selectone(){
        $id = $this->input->post('serverid');
		$result = $this->Serverlist->select_one($id);
		echo json_encode($result);
       
    }
	

    
    public function deleteserver(){

        $id = $this->input->post('serverid');
//        echo $id;
         if($this->Serverlist->delete($id)){
            redirect('server/serverlist/3', 'refresh');
        }
        
    }


     public function updateserver(){
        $id = $this->input->post('serverid2');
        $data = array(
                'server_ip' => $this->input->post('serverip'),
                'server_name' => $this->input->post('servername'),
                'Remark' => $this->input->post('remark')
                );
        
        if($this->Serverlist->updateone($id,$data)){
            $msg = "Server has been Updated Successfully";
            $this->serverlist($msg);
        }
    }
    
    
    
    public function insertserver(){
        $this->load->model('Insertserver');
        $ip = $this->input->post('serverip');
        if($this->Serverlist->checkhost($ip)){
            redirect('server/serverlist/4', 'refresh');
        }else{
        $data = array(
            'server_name' => $this->input->post('servername'),
            'server_ip' => $ip,
            'OS' => $this->input->post('os'),
            'RAM' => $this->input->post('ram'),
            'HDD' => $this->input->post('hdd'),
            'CPU' => $this->input->post('cpu'),
            'Remark' => $this->input->post('remark')
            
        );
        
        if($this->Insertserver->form_insert($data)){
            redirect('server/serverlist/1', 'refresh');
        }
        }
        
        
    }
    
}

?>