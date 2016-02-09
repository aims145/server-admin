
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Monitor Services</h1>
        </div>
        
    </div>
    <?php if(isset($msg) && !is_numeric($msg)){ ?>
    <div class="alert alert-success" role="alert" id="delcred" ><?php echo $msg; ?></div>
    <?php }?>
    
<div class="row">
	<div class="col-lg-6">
		<form for="" method="post" action="serviceadd">
					
		<select id="hostmultiselect" name="servers[]" multiple="multiple">
			
			
		</select>
		
		<p></p>
		<p ><input class="btn btn-primary" type="submit" value="Add Host" /></p>
		</form>
	</div>

<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered">
    <thead>
      <tr>
        <th>Server Name</th>
        <th>Server IP</th>
        <th>Host Status</th>
        <th>Last Down Time</th>
        <th>Monitor Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
      </tbody>
  </table>
		
		
		
		
		
	</div>
</div>
</div>    
</div>




    <div class="modal fade" id="deletehost">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>server/monitor/deletehost">
            <div class="modal-header">
                <h4 class="text-center">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
             Are you really want to Delete ?   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="mon_host_id" class="mon_host_id" id="mon_host_id"  value="" />
                <button type="submit" class="btn btn-success pull-left" >YES</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">NO</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>


<script>
setInterval(function () {
    $("#hostdown").css("background-color", function () {
        this.switch = !this.switch
        return this.switch ? "red" : ""
    });
}, 500)
</script>