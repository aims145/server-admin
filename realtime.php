<?php   

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

$cmd = "w|head -n 1|awk '{print \$8,\$9,\$10,\$11,\$12}'" ;   
$server = $_POST['server'];    
    $res = socket($cmd,$server);
    echo $res[0];
////$load = $_POST[''];
//$server = array("server"=> );
//echo json_encode($server);

?>
