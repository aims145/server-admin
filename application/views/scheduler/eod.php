<?php $today = date("Y-m-d"); ?>
<div id="page-wrapper">
    
    <div class="page-header">
	<h2>End of the Day</h2>
	
    </div>
<?php if(isset($msg)){ ?>
    <div class="alert alert-success" role="alert" id="delcred" ><?php echo $msg; ?></div>
<?php }?>    
    
<div class="row">
	<div class="col-lg-12">
<a href="#addeod" class="btn btn-primary" data-toggle="modal">Add Task</a>
		
	</div>
</div><hr>
<div class="row">
    <div class="col-lg-12">
        <form role="form" action="" method="POST" class="form-horizontal" id="foreod">
            <div class="form-group">
            	 <label for="date" class=" control-label col-lg-3">Search Old EOD</label>
                 <div class="col-lg-3">
                 <div class="input-group date" id="datetimepicker12">
                     <input type="text" class="form-control" name="date">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                 </div>
                 <div class="col-lg-3">
                     <button class="btn btn-primary " type="submit">Search</button>
                 </div>
            </div>
        </form>
    </div>
</div>

<hr>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tasks List for <?php echo $today; ?> 
                        </div>
                        <!-- /.panel-heading -->


                    <div class="panel-body">
                    <div class="dataTable_wrapper eodtable">
                        <table class="table table-striped table-bordered " id="eod" border="1px" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Project</th>
                                    <th>Task</th>
                                    <th>Related Task</th>
                                    <th>Expected Time</th>
                                    <th>Actual Time</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Date</th>


                                </tr>
                            </thead>
                            <tbody>
                             <?php
                             if($show_table){
                                 $num = 1;
                             foreach ($show_table as $task){
                                 ?>
                                <tr>
                                    <td><?php echo $num;?></td>
                                    <td><?php echo $task->Project;?></td>    
                                    <td><?php echo $task->Task;?></td>
                                    <td><?php echo $task->Related_task;?></td>
                                    <td><?php echo $task->Expected_time;?></td>
                                    <td><?php echo $task->Actual_time;?></td>
                                    <td><?php echo $task->Status;?></td>
                                    <td><?php echo $task->Remark;?></td>
                                    <td><?php echo $task->Date;?></td>
                                </tr>    
                             <?php 
                             $num++;
                             }
                             
                             }
                             ?>           
                            </tbody>
                        </table>
                    </div>
                            <!-- /.table-responsive -->
                            <a  class="btn btn-success emailsend">Send EOD</a>
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>








    
    
</div>




<div class="modal fade" id="addeod">
        <div class="modal-dialog" style="width: 90%;">
        	
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/scheduler/addeod" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Tasks</h4>
            </div>
            <div class="modal-body">

                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Project</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="project"  required>
                </div>
                </div>
                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Task</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="task"  required>
                </div>
                </div>

                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Related Task</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="rtask"  required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Expected Time</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="etime"  required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Actual Time</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="atime"  required>
                </div>
                </div>
                
                <div class=" form-group">
                    <label for="reminder" class=" control-label col-lg-3">Status</label>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control" name="status"  required>
                </div>
                </div>
            
        <div class=" form-group">
                    <label for="desc" class=" control-label col-lg-3">Remark</label>
                    <div class=" col-lg-6">
                    <textarea type="text" class="form-control" name="remark" required></textarea>
                        
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


<div class="modal fade" id="mailsent1">
        <div class="modal-dialog" >
        	
            <div class="modal-content">
            
            <div class="modal-body">
                <center>
                <h3 class=" lead">
                    EOD sent Successfully.
                </h3>   
                    </center>
                
            </div>
                      
          
            <div class="modal-footer">
            
                <a class="btn btn-danger pull-right" data-dismiss="modal">Close</a>
            </div>
                </div>
        </div>
    </div> 
