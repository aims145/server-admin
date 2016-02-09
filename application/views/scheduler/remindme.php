<style type="text/css">
    .panel-group{
        margin-bottom: 0px;
    }
    .panel-heading{
    background-color: #C5C5C5 !important;
    }
</style>    
    
<div id="page-wrapper">
<div class="page-header">
	<h2>Reminder</h2>
	
</div>
<!-- <div class="alert alert-success">
	hello
</div> -->
<div class="row">
	<div class="col-lg-12">
<a href="#addreminder" class="btn btn-primary" data-toggle="modal">Add Reminder</a>
		
	</div>
	
</div>


<hr>

<div class="row" id="lists">
        <div class="col-lg-12">
            <?php if(is_array($show_table) || is_object($show_table)){
 foreach ($show_table as $cmds){      
?>
            
        <div class="panel-group hidepanel" id="accordion">
        	
    <div class="panel panel-default">
      <div class="panel-heading">
      	<div class="row">
      	<div class="col-lg-12">
        <h4 class="panel-title searchtag">
<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cmds->id;  ?>"><?php echo $cmds->title;  ?></a>
    <?php if($cmds->status == 1){ echo "<p class='pull-right' style='color:red;'>Expired</p>"; }?>      
        </h4>
        </div>
     
        <div class="col-lg-2">
            <!-- <a class="btn btn-default editcmd" href="#editcmd" data-toggle="modal" data-id="<?php echo $cmds->id;?>">Edit</a>
     <a class="btn btn-danger pull-right deletecmd" href="#deletcmd" data-toggle="modal" data-id="<?php echo $cmds->id;?>">Delete</a> -->
        </div>
        </div>
      </div>
      <div id="<?php echo $cmds->id;  ?>" class="panel-collapse collapse">
          <div class="panel-body">
              <h3   >Time</h3>
              <pre><?php echo $cmds->date_time; ?></pre>
              <h3   >Description</h3>
              <textarea readonly rows="3" class="form-control"><?php echo $cmds->description; ?></textarea>
          </div>
      </div>
    </div>
        </div>
            
            <?php }
            }?>

            
        </div>
    </div>




<div class="modal fade" id="addreminder">
        <div class="modal-dialog" style="width: 90%;">
        	
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/scheduler/addreminder" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Reminder</h4>
            </div>
            <div class="modal-body">

                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Title</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="reminder"  required>
                </div>
                </div>

            <div class="form-group">
            	 <label for="date" class=" control-label col-lg-3">Date</label>
                 <div class="col-lg-3">
                 <div class='input-group date' id='datetimepicker1'>
                     <input type='text' class="form-control"  name="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                 </div>
            </div>
            <div class="form-group">
            	 <label for="time" class=" control-label col-lg-3">Time</label>
                 <div class="col-lg-3">
                   <div class="input-group bootstrap-timepicker timepicker input-append" id="datetimepicker3" >
                       <input id="timepicker1" type="text" data-format="hh:mm:ss" class="form-control input-small" name="time">
            <span class="input-group-addon add-on"><i  class="glyphicon glyphicon-time"></i></span>
        </div>
                 </div>
            </div>    
                
                
            
                <div class=" form-group">
                    <label for="desc" class=" control-label col-lg-3">Description</label>
                    <div class=" col-lg-6">
                    <textarea type="text" class="form-control" name="desc" required></textarea>
                        
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

