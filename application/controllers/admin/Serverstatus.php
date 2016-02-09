<?php

class Serverstatus extends CI_Controller{
    public function __construct(){
    parent::__construct();
	if(!$this->session->userdata('logged_in')){
			redirect('login', 'refresh');
		}
     $this->load->model('Serverlist');
 }
    public function services(){
        $data['show_table'] = $this->Serverlist->select_all();
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('serverstatus/service', $data);
        $this->load->view('footer');
    }
    
    function socket($cmd,$server){
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
            $result = socket_read($socket, 10240) or die("Could not read server response\n");

            $newarray = array_filter(explode("\n", $result));
            
            return $newarray;
            // close socket
            socket_close($socket);
    }

    public function ports(){
        $data['show_table'] = $this->Serverlist->select_all();
        $cmd1 = "netstat -lntp|awk '{print \$4}'|cut -d: -f2,4|cut -d: -f2|awk 'NR>2'";
        $cmd2 = "netstat -ntpl | awk 'NR>2'|awk '{print \$7}'";
        
        if($this->input->post('server') != ''){
        $data['ports'] = $this->socket($cmd1, $this->input->post('server'));
        $data['pid'] = $this->socket($cmd2, $this->input->post('server'));
        }
        
        
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('serverstatus/ports',$data);
        $this->load->view('footer');
        
        
    }
    
    public function servicerequest(){
        $data['show_table'] = $this->Serverlist->select_all();
        $server = $this->input->post('server');
        $service = $this->input->post('service');
        $action = $this->input->post('action');
        $do = "service ".$service." ".$action;
//        echo $do;
        $data['result'] = $this->socket($do, $server);
        $data['action'] = $action;
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('serverstatus/service',$data);
        $this->load->view('footer');
    }
    
    public function usage(){

        $data['show_table'] = $this->Serverlist->select_all();
        $disk = "df -h / |awk '{print \$2, \$5}'|tail -n1";
        $cpu = "cat /proc/loadavg |awk '{print \$1, \$2, \$3}'";
        $memory = "free -m|awk '{print \$2, \$3, \$4}'|head -n2|tail -n1";
        $process = "ps aux | sort -rk 3,3 | head -n 11|awk '{print \$1, \$2, \$3, \$4, \$11}'|tail -n +2";
        
        if($this->input->post('server') == ''){
            $data['server_ip'] = "localhost";
            $data['disk'] = $this->socket($disk, "localhost");
            $data['memory'] = $this->socket($memory, "localhost");
            $data['cpu'] = $this->socket($cpu, "localhost" );
            $data['top10'] = $this->socket($process, "localhost" );
            // print_r($data['cpu']);

        }
        else{
            $data['server_ip'] = $this->input->post('server');
            $server_ip = $data['server_ip'];
            $data['disk'] = $this->socket($disk, $server_ip);
            $data['memory'] = $this->socket($memory, $server_ip);
            $data['cpu'] = $this->socket($cpu, $server_ip );
            $data['top10'] = $this->socket($process, $server_ip );

        }


        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('serverstatus/usage', $data);
        $this->load->view('footer');
    }
}
