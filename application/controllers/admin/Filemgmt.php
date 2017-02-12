<?php

class Filemgmt extends CI_Controller{
    public function __construct(){
    parent::__construct();
	if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
     $this->load->helper(array('form', 'url'));
     $this->load->model('Uploadfiles');
 }
    public function upload(){
        //  $data['show_table'] = $this->Serverlist->select_all();
        $data['show_table'] = $this->Uploadfiles->select_all();
        if($this->uri->segment(4) == 1){
        $data['msg'] = "File Uplaoded Successfully";
        $data['alert'] = "alert alert-success";
        }
        
        $this->load->view('header');
        $this->load->view('dashboard');
        if(isset($data)){
        $this->load->view('filemgmt/upload', $data);
        }
        else{
        $this->load->view('filemgmt/upload');    
        }
        $this->load->view('footer');

    }
    public function fileupload(){
        ini_set( 'memory_limit', '200M' );
        ini_set('upload_max_filesize', '200M');  
        ini_set('post_max_size', '200M');  
        ini_set('max_input_time', 3600);  
        ini_set('max_execution_time', 3600);
        $filename = time().$_FILES["userfile"]['name'];
        $config = array(
        'upload_path' => "./uploads/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf|zip|rar|tar|tgz|pdf|doc|docx|xlsx",
        'overwrite' => TRUE,
        'max_size' => "204800000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'file_name' => $filename
        );
        $this->load->library('upload', $config);
        $data = array('upload_data' => $this->upload->data());
        $name = "userfile";
        if($this->upload->do_upload($name))
        {
        $filedesc = $this->input->post('filedesc');
        
        $data = array('upload_data' => $this->upload->data());
        $data1 = array( 'file_name' => $data['upload_data']['file_name'],
                        'file_desc' => $filedesc,
                        'file_ext' => $data['upload_data']['file_ext'],
                        'file_type' => $data['upload_data']['file_type'],
                        'full_path' => base_url()."uploads/".$data['upload_data']['file_name'],
                        'file_size' => $data['upload_data']['file_size'],
                        'username' => $this->session->userdata['logged_in']['username'], 
                        'user_id' => $this->session->userdata['logged_in']['id'], 
                        'role' => $this->session->userdata['logged_in']['role']
                        );
        if($this->Uploadfiles->insertfile($data1)){
            redirect('server/filemgmt/upload/1', 'refresh');
        }
       
        }
        else
        {
        $data = array('msg' => $this->upload->display_errors(),
                      'alert' => "alert alert-danger");
        
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('filemgmt/upload',$data);
        $this->load->view('footer');
        }
        
        
        
        
        
    }
                
    

}
