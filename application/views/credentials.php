      <script>
function showform(){
    //console.log('hello');
    //$("#addbtn").css("display","none");
    //$(".hide").css("display","block");
    document.getElementById('addbtn').style.display='none';
    document.getElementById('hide').style.display='block';
    
}
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Server Credentials </h1>
        </div>
        
    </div>
    
    <?php if(isset($msg)){ ?>
    <div class="<?php echo $alert; ?>" role="alert" id="delcred" ><?php echo $msg; ?></div>
    <?php }?>
    <a  id="addbtn" data-toggle="modal" class="btn btn-primary" href="#addcred" >Add Credentials</a>
    
    <p></p>
    

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        All Credentials <div class="tools"></div>
                    </div>
             <div class="panel-body">
                  <div class="dataTable_wrapper portlet-body">
                  <table class="table table-striped table-bordered table-hover" 
                         id="myTablecreds">
                    <thead>
                        <tr>
                            <th>Server Name</th>
                            <th>Server IP</th>
                            <th>Protocol</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Expiry</th>
                            <th>Action</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($creddata){
                        foreach($creddata as $cred){
                            echo "<tr>
                            <td>".$cred->server_name."</td>
                            <td>".$cred->server_ip."</td>
                            <td>".$cred->Protocol."</td>
                            <td>".$cred->username."</td>
                            
                            <td class='col-lg-3'>
                            	<div class='form-group input-group'>
                            	<input class='form-control' type='text' id='pass".$cred->id."' value='".htmlspecialchars($cred->password)."'>
    <span class='input-group-btn'>
                    			<button class='btn btn-default btn-passcopy' id='passcopy' type='button' data-clipboard-demo='' data-clipboard-target='#pass".$cred->id."'>
                        <i class='fa fa-copy'></i>
                    </button>
                </span>
                </div>
</td>
<td>".$cred->pass_expiry." Days</td>
                            <td><a data-toggle='modal' href='#editcred' data-id='".$cred->id."' class='btn btn-default edit' onclick='editcred(this);' title='Edit'><i class='fa fa-edit'></i></a>  <a href='#deletecred' data-toggle='modal' class='btn btn-danger delete' data-id='".$cred->id."' id='delete' title='Delete'><i class='fa fa-trash-o'></i></a></td>
                            </tr>";
							
                        }
                        }
                        //
                        ?>
                                                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                
                
                
            </div>    
        </div>
    </div>
    
    <div class="modal fade" id="deletecred">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>server/credentials/del">
            <div class="modal-header">
                <h4 class="text-center">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
             Are you really want to Delete ?   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="credid" class="credid" id="credid"  value="" />
                <button type="submit" class="btn btn-success pull-left" >YES</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">NO</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>

    
    
 <div class="modal fade" id="editcred">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>server/credentials/update">
            <div class="modal-header">
                <h4 class="text-center">Update Credentials</h4>
            </div>
            <div class="modal-body text-center">
               <div class="modal-body">
                    <div class="form-group">
                        <label for="servername" class="control-label col-lg-4">Server Name</label>
                        <div class="col-lg-6 ">
                            <input type="text" class="form-control" id="servername" name="servername" value='' readonly="readonly">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="serverip" class="control-label col-lg-4">Server IP</label>
                        <div class="col-lg-6 ">
                            <input type="test" class="form-control" id="serverip" name="serverip" value='' readonly="readonly">
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="protocol" class="control-label col-lg-4">Service</label>
                        <div class="col-lg-6 ">
                            <input type="test" class="form-control" id="protocol" name="protocol" value=''>
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="username" class="control-label col-lg-4">User Name</label>
                        <div class="col-lg-6 ">
                            <input type="test" class="form-control" id="username" name="username" value=''>
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="password" class="control-label col-lg-4">Password</label>
                        <div class="col-lg-6 ">
                            <input type="test" class="form-control" id="password" name="password" value=''>
                        </div>
                    </div>
                   
                   <div class=" form-group">
                 <label for="expiry" class=" control-label col-lg-4">Expiry</label>
                 <div class=" col-lg-6">
                     <select type="text" class="form-control" name="expiry" >
                         <option value="" selected="selected">Select Password Expiry</option>
                         <option value="30">1 Month</option>
                         <option value="60">2 Month</option>
                         <option value="90">3 Month</option>
                         
                     </select>
                    </div>
                </div> 
                        
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="credid2" class="credid2" id="credid2"  value="" />
                <button type="submit" class="btn btn-success pull-left" >Update</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">Cancel</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>
    
    
    <div class="modal fade" id="addcred">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/credentials/add" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Credentials</h4>
            </div>
            <div class="modal-body">

                <div class=" form-group">
                    <label for="server" class=" control-label col-lg-3">Server Name</label>
                    <div class=" col-lg-6">
                        <select type="text" class="form-control" name="server">
                                    <option value="">Select Server</option>
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
                </div>
                
                <div class=" form-group">
                    <label for="protocal" class=" control-label col-lg-3">Service</label>
                    <div class=" col-lg-6">
                    
                        <select type="text" class="form-control" name="protocol">
                                    <option value="">Select Service</option>
                                    <option value="mysql">Mysql</option>
                                    <option value="ssh">SSH</option>
                                    <option value="ftp">FTP</option>
                                    
                        </select>
                        
                        
                    </div>
                </div>
                
                
                <div class=" form-group">
                    <label for="username" class=" control-label col-lg-3">User Name</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="username" placeholder="UserName" required>
                    </div>
                </div>
                <div class=" form-group">
                    <label for="password" class=" control-label col-lg-3">Password</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="password" id="usrpass" placeholder="Password" required>
                    </div>
                </div>
                     
                <div class=" form-group">
                    <label for="generator" class=" control-label col-lg-3"></label>
                    <div class=" col-lg-4">
                        <input type="button" class="form-control btn btn-primary generator" name="generator" id="generator" value="Generate Password">
                    </div>
                </div>  
                
                
                 <div class=" form-group">
                 <label for="expiry" class=" control-label col-lg-3">Expiry</label>
                 <div class=" col-lg-6">
                     <select type="text" class="form-control" name="expiry" >
                         <option value="">Select Password Expiry</option>
                         <option value="30">1 Month</option>
                         <option value="60">2 Month</option>
                         <option value="90">3 Month</option>
                     </select>
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
