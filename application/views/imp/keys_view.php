
<style type="text/css">
    .panel-group{
        margin-bottom: 0px;
    }
    .panel-heading{
    background-color: #C5C5C5 !important;
    }
</style>    
    
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Important SSHKeys</h1>
        </div>
        
    </div>
    <?php if(isset($msg) && !is_numeric($msg)){ ?>
    <div class="alert alert-success" role="alert" id="delcred" ><?php echo $msg; ?></div>
    <?php }?>
    <div class="row">
    <div class="col-lg-4">
    <a href="#addkey" data-toggle="modal" class="btn btn-primary ">Add SSHKey</a>
    </div>
    
    <div id="heads" class="col-lg-3 pull-right">
    	<!-- <form role="form" action="" method="post" >
	<input type="text" name="search" id="search-box" class="form-control" placeholder="Search"/>
	</form> -->
    </div>
    

    </div>

    <p></p>
    <div class="row" id="lists">
        <div class="col-lg-12">
            <?php if(is_array($show_table) || is_object($show_table)){
 foreach ($show_table as $cmds){      
?>
            
        <div class="panel-group hidepanel" id="accordion">
        	
    <div class="panel panel-default">
      <div class="panel-heading">
      	<div class="row">
      	<div class="col-lg-10">
        <h4 class="panel-title searchtag">
<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cmds->id;  ?>"><?php echo $cmds->title;  ?></a>
          
        </h4>
        </div>
     
        <div class="col-lg-2">
           
     <a class="btn btn-danger pull-right deletekey" href="#deletkey" data-toggle="modal" data-id="<?php echo $cmds->id;?>">Delete</a>
        </div>
        </div>
      </div>
      <div id="<?php echo $cmds->id;  ?>" class="panel-collapse collapse">
          <div class="panel-body">
              <!-- <h3   >Command</h3>
              <pre><?php echo $cmds->command; ?></pre> -->
              <div class="row">
              	<div class="col-lg-2">
              		<h3   >SSH Key</h3>		
              	</div>
              	<div class="col-lg-10">
    <a class="btn btn-primary pull-right" onclick="downloadfile('<?php echo $cmds->id;  ?>')">Download as Text</a>		
              	</div>
              </div>
              
              
              <pre class="<?php echo $cmds->id;?>"><?php echo $cmds->keys; ?></pre>
          </div>
      </div>
    </div>
        </div>
            
            <?php }
            }?>

            
        </div>
    </div>
    
  <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
</div>

</div>




    <div class="modal fade" id="addkey">
        <div class="modal-dialog" style="width: 75%;">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/imp/addkey" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Script</h4>
            </div>
            <div class="modal-body">

                
                
                <div class=" form-group">
                    <label for="scriptname" class=" control-label col-lg-3">Key Name</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="keyname" placeholder="Script Title" required>
                    </div>
                </div>
                                     
                <div class=" form-group">
                    <label for="Description" class=" control-label col-lg-3">SSHKey</label>
                    <div class=" col-lg-8">
                        <textarea class="form-control" rows="10" name="key"></textarea>
                    </div>
                </div>    
                
            </div>
                      
          
            <div class="modal-footer ">
                
                <button type="submit" class="btn btn-success " >Add</button>
                <a class="btn btn-danger " data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div>    
    



<div class="modal fade" id="deletkey">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>server/imp/delkey">
            <div class="modal-header">
                <h4 class="text-center">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
             Are you really want to Delete ?   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="keyid" class="keyid" id="keyid"  value="" />
                <button type="submit" class="btn btn-success pull-left" >YES</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">NO</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>


<!--    <div class="modal fade" id="editcmd">
        <div class="modal-dialog" style="width: 75%;">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/imp/updateone" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Edit Command</h4>
            </div>
            <div class="modal-body">

                
                
                <div class=" form-group">
                    <label for="username" class=" control-label col-lg-3">Command Title</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="cmdname" id="cmdname"  required>
                    </div>
                </div>
                <div class=" form-group">
                    <label for="password" class=" control-label col-lg-3">Command</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="cmd" id="cmd"  required>
                    </div>
                </div>
                     
                <div class=" form-group">
                    <label for="generator" class=" control-label col-lg-3">Description</label>
                    <div class=" col-lg-8">
                        <textarea class="form-control" rows="10" name="description" id="description"></textarea>
                    </div>
                </div>    
                
            </div>
                      
          
            <div class="modal-footer ">
                <input type="hidden" name="id" id="id" value="" />
                <input type="hidden" name="table" value="imp_cmds" />
                <button type="submit" class="btn btn-success " >Update</button>
                <a class="btn btn-danger " data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div>   -->