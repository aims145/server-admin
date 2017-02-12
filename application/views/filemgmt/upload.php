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
<?php }
?>
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

                <form role="form" action="<?php echo base_url();?>admin/filemgmt/fileupload" method="post" enctype="multipart/form-data" class="form-horizontal">
          

                <div class=" form-group">
                    <label for="servername" class=" control-label col-lg-3">File Description</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="filedesc" placeholder="File Description" required>
                </div>
                </div>
                
                
                 <div class=" form-group">
                    <label for="remark" class=" control-label col-lg-3">File</label>
                    <div class=" col-lg-6">
                        <input type="file" class="form-control" name="userfile" required>
                    </div>
                </div>
                        
             <div class=" form-group">
                 <label for="remark" class=" control-label col-lg-3"></label>
            <div class=" col-lg-2">
                <input type="submit" class="form-control btn btn-primary"  value="Submit" >
            </div>
        </div>
                    
                    
            </form>
                                <hr>

                                
   <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        All Files <div class="tools"></div>
                    </div>
             <div class="panel-body">
                  <div class="dataTable_wrapper portlet-body">
                  <table class="table table-striped table-bordered table-hover" 
                         id="myTablecreds">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Details</th>
                            <th>File Type</th>
                            <th>File Size</th>
                            <th>Uploaded By</th>
                            <th>Delete</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                                    <tbody>
                       <?php
                       if($show_table){
                         foreach($show_table as $table){
                          echo "<tr>".
                              "<td>".$table->file_name."</td>".
                              "<td>".$table->file_desc."</td>".    
                              "<td>".$table->file_type."</td>".
                              "<td>".$table->file_size."</td>".
                              "<td>".$table->username."</td>".
                              "<td><a class='btn btn-danger pull-right'>Delete</a></td>".
                              "<td><a class='btn btn-primary pull-right' href='$table->full_path'>Download</a></td>".    
                                  "</tr>";      
                       }
                       }
                       ?>
                                                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                
                
                
            </div>    
        </div>
    </div>
                                
                                
                                
                                
                                
                                
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
