 <script>
 $(document).ready(function(){
 setInterval(function(){cache_clear()},5000);
 });
 function cache_clear()
{
 window.location.reload(true);
}
</script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
  <div class="row">
    <div class="col-lg-3">
                        <form method="post" action="<?php echo base_url(); ?>server/serverstatus/ports">
                            <div class="form-group">
                                    <label for="name">Server</label>
                                    <select type="text" class="form-control" name="server" onchange="this.form.submit()">
                                    <option value="" selected>Select Server</option>
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

    <?php if (isset($ports)) {
        # code...
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <p></p>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Server Ports</th>
                                            <th>PID/Service</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                        
                                    <tbody>
                                      <?php 
                                      $num = count($ports);
                                      
                                      for($i=0;$i<$num;$i++){
                                          $s = $i + 1;
                                          echo "<tr>".
                                                  "<td>".$s."</td><td>".$ports[$i].                                                                         "</td><td>".$pid[$i]."</td></tr>"
                                                    ;
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
            <?php }?>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
