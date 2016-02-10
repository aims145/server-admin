<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Server List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
  <?php if(isset($msg)){ ?>
    <div class="alert alert-success" role="alert" id="delcred" ><?php echo $msg; ?></div>
<?php }?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Server List Advanced Tables
                        </div>
                        <!-- /.panel-heading -->

							
                            <div class="panel-body">
                            	<?php if ($this->session->userdata['logged_in']['role'] == 'admin') { ?>
                            <a href="#addserver" data-toggle="modal" class="btn btn-primary addserver" >Add Server</a>
                            <?php } ?>
                            <p></p>
                            
                            <?php 
                                    if(isset($update)){
                                    echo '<div class="alert alert-success">' . $update . '</div>';   
                                } ?>   
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Server Name</th>
                                            <th>Server IP</th>
                                            <th>Remark</th>
                                            <?php if ($this->session->userdata['logged_in']['role'] == 'admin') { ?>
                                            <th>View </th>
                                            <th> Edit </th>
                                            <th> Delete</th>
                                            <?php } ?>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($show_table)) {
                                        foreach ($show_table as $server)
                                        {
                                            echo '<tr class="odd gradeX">' . '<td>' . $server->server_name . '</td>' . '<td>' . $server->server_ip . 
                                                    '</td>' . '<td>' . $server->Remark . '</td>';
if ($this->session->userdata['logged_in']['role'] == 'admin'){ 													
                                                   echo '<td>    

<a href="'.base_url().'server/serverlist#viewserver" data-id="'.$server->id.'" data-toggle="modal" class="btn btn-default viewserver" >View</a></td>                                                    
<td><a href="'.base_url().'server/serverlist#editserver" data-id="'.$server->id.'" data-toggle="modal" class="btn btn-primary editserver" onclick="editserver(this);">Edit</a></td>
<td><a href="'.base_url().'server/serverlist#deleteserver" data-id="'.$server->id.'" data-toggle="modal" class="btn btn-danger delserver">Delete</a>
                                                    </td>';
}
                                                    
                                                    echo '</tr>';
                                        }                                        
                                        }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
        
    <div class="modal fade" id="viewserver">
    	<div class="modal-dialog" style="width: 70%;">
    	<div class="modal-content">
    		<div class="modal-header">
    			<h4 class="text-left" id="serverhead"></h4>
    		</div>
    		<div class="modal-body">
<div class="row">
	<div class="col-lg-3">
	<div class="panel panel-info">
  	<div class="panel-heading">Memory</div>
  	<div class="panel-body">
  		<img src="<?php echo base_url();?>public/images/632147656250a-data_ram.png" style="width: 100%;"/>	
  	</div>
  	<div class="panel-footer">
  	<h3 class="text-center" id="ram"></h3>	
  	</div>
	</div>	
	</div>
	
	<div class="col-lg-3">
	<div class="panel panel-info">
  	<div class="panel-heading">Storage</div>
  	<div class="panel-body">
  		<img src="<?php echo base_url();?>public/images/hdd.png" style="width: 100%;"/>	
  	</div>
  	<div class="panel-footer">
  	<h3 class="text-center" id="hdd"></h3>	
  	</div>
	</div>	
	</div>
	
	<div class="col-lg-3">
	<div class="panel panel-info">
  	<div class="panel-heading">CPU</div>
  	<div class="panel-body">
  		<img src="<?php echo base_url();?>public/images/cpu.png" style="width: 100%;"/>	
  	</div>
  	<div class="panel-footer">
  	<h3 class="text-center" id="cpu"></h3>	
  	</div>
	</div>	
	</div>
	
	<div class="col-lg-3">
	<div class="panel panel-info">
  	<div class="panel-heading">OS</div>
  	<div class="panel-body">
  		<img src="<?php echo base_url();?>public/images/linux.png" style="width: 100%;"/>	
  	</div>
  	<div class="panel-footer">
  	<strong><p class="text-center" id="os"></p></strong>	
  	</div>
	</div>	
	</div>
	
	
</div>






    			
    		</div>
			<div class="modal-footer">
				<a class="btn btn-danger pull-right" data-dismiss="modal">Close</a>
			</div>    	
    	
    	</div>
    		
    	</div>
    	
    </div>    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<div class="modal fade" id="addserver">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/insertserver" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Server</h4>
            </div>
            <div class="modal-body">

                <div class=" form-group">
                    <label for="servername" class=" control-label col-lg-3">Server Name</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="servername" placeholder="Server Name" required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="serverip" class=" control-label col-lg-3">Server IP</label>
                    <div class=" col-lg-6">
                    <input type="text" class="form-control" name="serverip" placeholder="Server IP" required>
                        
                    </div>
                </div>
                
                
                <div class=" form-group">
                    <label for="remark" class=" control-label col-lg-3">Remark</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="remark" placeholder="Remark" required>
                    </div>
                </div>
                     
                    
                
            </div>
                      
          
            <div class="modal-footer">
                <button type="submit" class="btn btn-success pull-left" >Add</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div> 
        
        
<div class="modal fade" id="deleteserver">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>server/deleteserver">
            <div class="modal-header">
                <h4 class="text-center">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
             Are you really want to Delete ?   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="serverid" class="serverid" id="serverid"  value="" />
                <button type="submit" class="btn btn-success pull-left" >YES</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">NO</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>
        
        
<div class="modal fade" id="editserver">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/updateserver" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Server</h4>
            </div>
            <div class="modal-body">

                <div class=" form-group">
                    <label for="servername" class=" control-label col-lg-3">Server Name</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="servername" id="servername" required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="serverip" class=" control-label col-lg-3">Server IP</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="serverip" id="serverip" required>
                        
                    </div>
                </div>
                
                
                <div class=" form-group">
                    <label for="remark" class=" control-label col-lg-3">Remark</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="remark" id="remark" required>
                    </div>
                </div>
                     
                    
                
            </div>
                      
          
            <div class="modal-footer">
                <input type="hidden" name="serverid2" class="serverid2" id="serverid2"  value="" />
                <button type="submit" class="btn btn-success pull-left" >Update</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div>