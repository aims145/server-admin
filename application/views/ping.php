<?php ?>
<div id="page-wrapper">

<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ping Tool</h1>
        </div>
</div>

<div class="row">
    <div class="col-lg-3">
    					<form method="post" action="<?php echo base_url(); ?>server/tools/ping">
                            <div class="form-group">
                                    <label for="name">Host Name</label>
                                    <input class="form-control" name="host" type="text">   
                                </div>
                                <button type="submit" id="addbtn" class="btn btn-primary">Ping</button>
                                </form>
                        </div>
    </div>
<p></p>
<?php 
if(isset($result)){ ?>
    <div class="row">
    <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Result - <?php echo $host;?>
                        </div>
                        <div class="panel-body">
                      <?php      
                      foreach($result as $ping) {
						echo $ping."<br />";
						

						} ?> 
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>
                </div>

	
<?php }

?>


</div>




