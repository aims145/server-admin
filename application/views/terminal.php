<script language="JavaScript">
<!--
function resize_iframe()
{

	var height=window.innerWidth;//Firefox
	if (document.body.clientHeight)
	{
		height=document.body.clientHeight;//IE
	}
	//resize the iframe according to the size of the
	//window (all these should be on the same line)
	document.getElementById("glu").style.height=parseInt(height-
	document.getElementById("glu").offsetTop-8)+"px";
}

// this will resize the iframe every
// time you change the size of the window.
window.onresize=resize_iframe; 

//Instead of using this you can use: 
//	<BODY onresize="resize_iframe()">


//-->
</script>      

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Terminal</h1>
                        <div id="frame" class="col-md-12 main">
                            <iframe id="glu" frameborder="0" width="100%" onload="resize_iframe()" src="http://10.222.10.160:6161">
</iframe>
</div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->