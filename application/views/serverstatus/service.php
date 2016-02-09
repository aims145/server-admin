<div id="page-wrapper">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Server Services</h1>
                </div>
                <!-- /.col-lg-12 -->


    </div>

     <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Server's with Service Listed Below
                    </div>
                    <div class="panel-body">
                        <form role="form"  action="<?php echo base_url();?>server/serverstatus/servicerequest" method="post">
                        <div class="row"> 
                            
                              <div class="col-lg-3">  
                                <div class="form-group">
                                    <label for="name">Server</label>
                                    <select type="text" class="form-control" name='server'>
                                    <option value="">Select Server</option>
                                    <?php
                                    foreach ($show_table as $server){
                                        echo "<option value=".$server->server_ip.">".$server->server_name."</option>";
                                    }
                                    ?>
                                    </select>    
                                </div>
                              </div> 
                              <div class="col-lg-3">  
                                <div class="form-group ">
                                    <label for="name">Service</label>
                                    <select type="text" class="form-control" name='service'>
                                    <option value="">Select Service</option>
                                    <option value="httpd">Apache Service</option>
                                    <option value="mysqld">Mysql Service</option>
                                    <option value="postfix">PostFix Service</option>
                                    
                                    </select>    
                                </div>
                              </div>     
                              <div class="col-lg-3">  
                                <div class="form-group">
                                    <label for="name">Action</label>
                                    <select type="text" class="form-control" name='action'>
                                    <option value="">Select Action</option>
                                    <option value="start">Start Service</option>
                                    <option value="stop">Stop Service</option>
                                    <option value="restart">Restart Service</option>
                                    <option value="status">Status Service</option>
                                    </select>    
                                </div>
                              </div>
                               
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                               </form>  
                    </div>

                </div>
                <!-- /.panel -->
                
                    <?php
                    if(isset($result)){
                        $len = count($result);
                    echo "<div class='well'><p>";
                    foreach ($result as $abc){
                        if($action == "start" || $action == "stop" || $action == "restart") {
                            echo "<div class='alert alert-success'>";
                            echo "Service is ".$action."ing <br />";
                            echo $abc."<br /></div>";
                            
                        }
                        else{
                            echo $abc."<br />";
                        }
                    }
                    echo "</p></div>";
                    }
                    ?>
                </div>
            </div>
            <!-- /.col-lg-12 -->

            

</div>
           

