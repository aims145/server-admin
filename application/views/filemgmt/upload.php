 <?php if ($this->session->userdata['logged_in']['role'] == 'admin') {
     $role = TRUE;   
     $tabid = "myTableServerList";
 }else{
     $role =  FALSE;
     $tabid = "myTable";
 } 
 
 ?>

<div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">File Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
  <?php if(isset($msg)){ ?>
    <div class="<?php echo $alert; ?>" role="alert" id="delcred" ><?php echo $msg; ?></div>
<?php }?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Files
                        </div>
                        <!-- /.panel-heading -->

							
                            <div class="panel-body">
                            	
                            
                            <?php 
                                    if(isset($update)){
                                    echo '<div class="alert alert-success">' . $update . '</div>';   
                                } ?>   

                <form role="form" action="<?php echo base_url();?>server/insertserver" method="post" class="form-horizontal">
          

                <div class=" form-group">
                    <label for="servername" class=" control-label col-lg-3">File Description</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="filedes" placeholder="File Description" required>
                </div>
                </div>
                
                
                 <div class=" form-group">
                    <label for="remark" class=" control-label col-lg-3">File</label>
                    <div class=" col-lg-6">
                        <input type="file" class="form-control" name="remark" placeholder="Remark" required>
                    </div>
                </div>
                        
             <div class=" form-group">
                 <label for="remark" class=" control-label col-lg-3"></label>
            <div class=" col-lg-2">
                <input type="submit" class="form-control btn btn-primary" name="remark" value="Submit" >
            </div>
        </div>
                    
                    
            </form>
                                <hr>

                                
                                
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
