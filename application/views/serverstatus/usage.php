 <script>
 $(document).ready(function(){
 setInterval(function(){cache_clear()},30000);
 });
 function cache_clear()
{
 window.location.reload(true);
}
</script>
<?php 
$diskarray = explode(" ", $disk[0]);
// print_r($diskarray);
$diskstatus = str_replace("%","",$diskarray[1]); 
 if($diskstatus < '70'){
 	$diskstatus = "OK";
 }
 elseif ($diskstatus > '80') {
 	$diskstatus = "Critical";
 }
else
 {
 $diskstatus = "Warning";	
 }
$mem = explode(" ", $memory[0]);
$total = $mem[0];
$used = $mem[1];
$free = $mem[2];



$cpu = explode(" ", $cpu[0]);
$current = $cpu[0];
$five = $cpu[1];
$fifteen = $cpu[2];
if(number_format($current) > 20){
	$class = "panel-red";
}
elseif (number_format($current) > 10) {

		$class = "panel-yellow";	
}
else{
		$class = "panel-green";		
}


?>

?>
<div id="page-wrapper">
    
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Server Usage</h1>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-3">
    					<form method="post" action="<?php echo base_url(); ?>server/serverstatus/usage">
                            <div class="form-group">
                                    <label for="name">Server</label>
                                    <select type="text" class="form-control" name="server" onchange="this.form.submit()">
                                    <option value="" selected="">Select Server</option>
                                    <?php
                                    if(isset($show_table)) {
                                        foreach ($show_table as $server)
                                        {
                                         	echo "<option value=".$server->server_ip.">".$server->server_name."</option>";   	
                                         
                                        }
                                    
                                    }
                                    ?>
                                    </select>    
                                </div>
                                </form>
                        </div>
    </div>

    <div class="row">
                <div class="col-lg-4">
                    <div class="panel <?php if($diskstatus == 'OK'){ echo "panel-green";}
                    elseif ($diskstatus == 'Warning') {
                    	echo "panel-yellow";
                    }
                    else{
                    	echo "panel-red";	
                    }
                     ?>">
                        <div class="panel-heading">
                            Disk Space Status- <?php echo $diskstatus; ?>
                        </div>
                        <div class="panel-body">
                        <h3 class="text-center"><?php 
                            if(isset($disk)){
                            	echo "Disk Space Used - ".$diskarray[1]; 
                            }
                            ?></h3>
                        </div>
                        <div class="panel-footer">
						<?php echo $server_ip?><p class="pull-right">Total Size - <?php echo $diskarray[0]?></p>
                        </div>
                    </div>.
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Memory Status- OK
                        </div>
                        <div class="panel-body">
                            <h3 class="text-center" ><?php echo "Memory Used - ".$used; ?></h3>
                        </div>
                        <div class="panel-footer">
                            <?php echo $server_ip?><p class="pull-right"><?php echo "Total Memory - ".$total;?></p>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel <?php echo $class; ?>">
                        <div class="panel-heading">
                            CPU Load Status - OK
                        </div>
                        <div class="panel-body">
                           <h3 class="text-center">	 <?php echo "Current Load - ".$current;?> </h3> 
                        </div>
                        <div class="panel-footer">
                            <?php echo $server_ip?>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
    </div>

    <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Top Ten CPU Consuming Processes
                        </div>
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
                        	<table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>PID</th>
                                            <th>CPU (in%)</th>
                                            <th>Memory (in%)</th>
                                            <th>Command</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php for($i=0;$i<count($top10);$i++){
                        	echo '<tr class="odd gradeX">';
                        		${'row'.$i} = explode(" ", $top10[$i]);
                        		for($j=0;$j<count(${'row'.$i});$j++){
                        			// echo ${'row'.$i}[$j]." ";
                        			echo "<td>".${'row'.$i}[$j]."</td>";
                        		}
                        		echo "</tr>";
                        }
                        ?>
                        			</tbody>
                        			</table>

                        </div>
                        </div>
                </div>        
                </div>
            </div>


</div>