<?php 

class Verifylogin extends CI_Controller{
    public function __construct(){
        parent::__construct();
         $this->load->model('Verify');
     }
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->load->helper('security');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     	$this->load->view('header');
        $this->load->view('loginview');
        $this->load->view('footer');
   }
   else
   {
     //Go to private area
     redirect('admin', 'refresh');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->Verify->index($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'fname' => $row->fname,
         'lname' => $row->lname,
         'role' => $row->role
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
    
    
}