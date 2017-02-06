
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
            <h1 class="page-header">Important Links</h1>
        </div>
        
    </div>
    <?php if(isset($msg)){ ?>
    <div class="<?php echo $alert; ?>" role="alert"  ><?php echo $msg; ?></div>
    <?php }?>
    <div class="row">
    <div class="col-lg-4">
    <a href="#addlink" data-toggle="modal" class="btn btn-primary pull-left ">Add Links </a>    
    </div>
    
    <div id="heads" class="col-lg-3 pull-right"></div>
    
    </div>
    <div class="row" id="lists">
        <div class="col-lg-12">
            <?php if(is_array($show_table) || is_object($show_table)){
 foreach ($show_table as $links){      
?>
            
        <div class="panel-group hidepanel " id="accordion">
    <div class="panel panel-default ">
      <div class="panel-heading">
      	<div class="row">
      	<div class="col-lg-10">
        <h4 class="panel-title searchtag">
<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $links->id;  ?>"><?php echo $links->title;  ?></a>
        </h4>
      </div>
      <div class="col-lg-2">
      	<a class="btn btn-default  editlink" href="#editlink" data-toggle="modal" data-id="<?php echo $links->id;?>"><i class='fa fa-edit'></i></a>
     <a class="btn btn-danger pull-right deletelink" href="#deletelink" data-toggle="modal" data-id="<?php echo $links->id;?>" ><i class='fa fa-trash-o'></i></a>
        </div>
      </div>
      </div>
      <div id="<?php echo $links->id;  ?>" class="panel-collapse collapse">
          <div class="panel-body">
              <h3 >Link</h3>
              <pre><a href="<?php echo $links->link; ?>" target="_blank" ><?php echo $links->link; ?></a></pre>
              <h3  >Details</h3>
              <textarea readonly rows="10" class="form-control"><?php echo $links->description; ?></textarea>
          </div>
      </div>
    </div>
        </div>
            
            <?php }
            }?>

          
        </div>
    </div>
    
</div>



    <div class="modal fade" id="addlink">
        <div class="modal-dialog" style="width: 75%;">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/imp/addlink" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Add Link</h4>
            </div>
            <div class="modal-body">

                
                
                <div class=" form-group">
                    <label for="username" class=" control-label col-lg-3">Link Title</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="linkname" placeholder="Link Title" required>
                    </div>
                </div>
                <div class=" form-group">
                    <label for="link" class=" control-label col-lg-3">Link</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="link" id="link" placeholder="Enter Link" required>
                    </div>
                </div>
                     
                <div class=" form-group">
                    <label for="details" class=" control-label col-lg-3">Description</label>
                    <div class=" col-lg-8">
                        <textarea class="form-control" rows="10" name="details"></textarea>
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
    


<div class="modal fade" id="deletelink">
    <div class="modal-dialog">

        <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>server/imp/dellink">
            <div class="modal-header">
                <h4 class="text-center">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
             Are you really want to Delete ?   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="linkid" class="linkid" id="linkid"  value="" />
                <button type="submit" class="btn btn-success pull-left" >YES</button>
                <a class="btn btn-danger pull-right" data-dismiss="modal">NO</a>
                    
            </div>
        </form>
        </div>
    </div>
</div>

    <div class="modal fade" id="editlink">
        <div class="modal-dialog" style="width: 75%;">
            <div class="modal-content">
                <form role="form" action="<?php echo base_url();?>server/imp/updateone" method="post" class="form-horizontal">
            <div class="modal-header">
                <h4 class="text-left">Edit Link</h4>
            </div>
            <div class="modal-body">

                
                
                <div class=" form-group">
                    <label for="linkname" class=" control-label col-lg-3">Link Title</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="linkname" id="linkname"  required>
                    </div>
                </div>
                <div class=" form-group">
                    <label for="link" class=" control-label col-lg-3">Link</label>
                    <div class=" col-lg-8">
                        <input type="text" class="form-control" name="link" id="links"  required>
                    </div>
                </div>
                     
                <div class=" form-group">
                    <label for="description" class=" control-label col-lg-3">Description</label>
                    <div class=" col-lg-8">
                        <textarea class="form-control" rows="10" name="description" id="description"></textarea>
                    </div>
                </div>    
                
            </div>
                      
          
            <div class="modal-footer ">
                <input type="hidden" name="id" id="id" value="" />
                <input type="hidden" name="table" value="imp_links" />
                <button type="submit" class="btn btn-success " >Update</button>
                <a class="btn btn-danger " data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div> 