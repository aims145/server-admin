<?php
class Tools extends CI_Controller{
    public function __construct(){
        parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
         $this->load->model('Packages');
     }
    
    public function socket($cmd,$server){
            $host    = $server;
            $port    = 1212;
            $message = $cmd;
            //echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            //sleep(2);
            $result = socket_read($socket, 10240) ;
            if(empty($result)){
             $result = "Invalid Input";
            }
            $newarray = array_filter(explode("\n", $result));
            
            
            return $newarray;  
            
            
            // close socket
            socket_close($socket);
    }


    public function terminal(){
                
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('terminal');
        $this->load->view('footer');
       
    }
    
    public function InstallPackage(){
                
        $this->load->view('header');
        $this->load->view('dashboard');
        $data['avail'] = $this->Packages->available();
        $this->load->view('installpkgs', $data);
        $this->load->view('footer');
       
    }
    
    public function selectedpkgs() {
        $this->load->view('header');
        $this->load->view('dashboard');
       $a = $this->input->post('countries');
       $cmd = '';
       for($i=0;$i<count($a);$i++){
           $cmd .= $a[$i]." ";
       } 
       echo $cmd;
       $this->load->view('footer');
    }
    

    public function ping(){
      $host = $this->input->post('host');
      $data['host'] = $this->input->post('host');
      if(isset($host)){
        $cmd = "ping -c 3 -i 0.1 ".$host;
        $data['result'] = $this->socket($cmd, "localhost");

        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('ping', $data);
        $this->load->view('footer');
      }else{
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('ping');
        $this->load->view('footer');
      }

        
    }
    
    

}

