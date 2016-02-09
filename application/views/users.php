
<div id="page-wrapper">
                <div class="row">
                <div class="col-lg-12">
                    
                    <h1 class="page-header"><img src="<?php echo base_url();?>public/images/user.png">  Users</h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>  

<div class="row">
	<div class="col-lg-12">
<a href="#addusers" class="btn btn-primary" data-toggle="modal">Add Users</a>
		
	</div>
	
</div>
<hr>

<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
<!--                                            <th>Password</th>-->
                                            <th>Role</th>
                                            <th>Edit / Delete</th>
                                        </tr>
                                    </thead>
            <?php if(is_array($users) || is_object($users)){
            foreach($users as $user){
                echo "<tr><td>".$user->fname." ".$user->lname."</td>"
                    . "<td>".$user->username."</td><td>".$user->email."</td><td>".$user->role.""
                        . "</td><td>
<a href='' data-id='".$user->id."' data-toggle='modal' class='btn btn-primary editserver' onclick=''>Edit</a>
<a href='#deleteusers' data-id='".$user->id."' data-toggle='modal' class='btn btn-danger deleteuser' >Delete</a>

                        </td></tr>";
            }
            }
            ?>
                                    <tbody>
                                        
                                       
                                    </tbody>
                                </table>
</div>
    
    
    
</div>


<div class="modal fade" id="addusers">
        <div class="modal-dialog" >
        	
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>admin/users/adduser" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add User</h4>
            </div>
            <div class="modal-body">

                <div class=" form-group">
                    <label for="fname" class="control-label col-lg-4">First Name</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="fname"  required>
                </div>
                </div>

                <div class=" form-group">
                    <label for="lname" class=" control-label col-lg-4">Last Name</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="lname"  required>
                </div>
                </div>
                <div class=" form-group">
                    <label for="username" class=" control-label col-lg-4">User Name</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="uname" minlength="5" required>
                </div>
                </div>
                <div class=" form-group">
                    <label for="email" class=" control-label col-lg-4">Email</label>
                    <div class=" col-lg-6">
                        <input type="email" class="form-control" name="email"  required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="pass1" class=" control-label col-lg-4">Password</label>
                    <div class=" col-lg-6">
                        <input type="password" class="form-control" minlength="8" id="pass" name="pass1"  required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="pass2" class=" control-label col-lg-4">Confirm Password</label>
                    <div class=" col-lg-6">
                        <input type="password" class="form-control" minlength="8" id="cpass" name="pass2"  required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="role" class=" control-label col-lg-4">Role</label>
                    <div class=" col-lg-6">
                        <select class="form-control" name="role">
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                </div>
                </div>
          
                
            </div>
                      
          
            <div class="modal-footer">
                <button type="submit" class="btn btn-success pull-left" onclick="return validuser();" >Add</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div> 


<div class="modal fade" id="deleteusers">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>admin/users/deluser">
            <div class="modal-header">
                <h4 class="text-center">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
             Are you really want to Delete ?   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="userid" class="userid" id="userid"  value="" />
                <button type="submit" class="btn btn-success pull-left"  >YES</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal" >NO</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>

















