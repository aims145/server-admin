<?php
class Server extends CI_Controller{
    
     public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
         $this->load->model('Serverlist');
     }
    public function serverlist($msg = NULL){
        //$this->load->model('serverlist');
        $data['msg'] = $msg;
        $this->load->view('header');
        $this->load->view('dashboard');
        $data['show_table'] = $this->Serverlist->select_all();
        $this->load->view('serverlist',$data);
        $this->load->view('footer');
       
    }
	
	public function selectone(){
        $id = $this->input->post('serverid');
		$result = $this->Serverlist->select_one($id);
		echo json_encode($result);
       
    }
	
	
	
	
	
    
//public function addserver(){
//        
//        $this->load->view('header');
//        $this->load->view('dashboard');
//        $this->load->view('addserver');
//        $this->load->view('footer');
//       
//    }

    
    public function deleteserver(){

        $id = $this->input->post('serverid');
//        echo $id;
         if($this->Serverlist->delete($id)){
            $msg = "Server has been Deleted Successfully";
            $this->serverlist($msg);
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
        $data = array(
            'server_name' => $this->input->post('servername'),
            'server_ip' => $this->input->post('serverip'),
            'Remark' => $this->input->post('remark')
        );
        
        if($this->Insertserver->form_insert($data)){
            $msg = "Server has been Added Successfully";
            $this->serverlist($msg);
        }
        
        
    }
    
}

?>