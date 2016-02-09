 <!-- <div class="row">
 	<div class="col-lg-12">
 		<nav class="navbar navbar-default navbar-static-bottom" role="navigation" style="margin-bottom: 0">
            

            <ul class="nav navbar-top-links navbar-right">
                
            </ul>
            <!-- /.navbar-top-links -->

            
       <!-- </nav>
 	</div>
 </div> -->
 <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="/ci/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/ci/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script type="text/javascript"  src="/ci/assets/dist/js/bootstrap-datetimepicker.js">
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="/ci/assets/dist/js/sb-admin-2.js"></script>
    <script src="/ci/assets/dist/js/moment.js"></script>
<script src="/ci/assets/dist/js/bootstrap-datepicker.js"></script>
<script src="/ci/assets/dist/js/bootstrap-timepicker.js"></script>
<script src="/ci/assets/dist/js/pgenerator.js"></script>
<script src="/ci/assets/dist/js/bootstrap-paginator.min.js"></script>
<script src="/ci/assets/dist/js/bootstrap-multiselect.js"></script>
<script src="/ci/assets/dist/js/jquery.classyedit.js"></script>
<!--<script src="/ci/assets/dist/js/bootstrap-switch.min.js"></script>-->





<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/ci/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/ci/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="/ci/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="/ci/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="/ci/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="/ci/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- <script type="text/javascript" src="/ci/assets/dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://www.datatables.net/release-datatables/extensions/TableTools/js/dataTables.tableTools.js">
	
</script> -->

<script src="/ci/assets/choosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="/ci/assets/choosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    
  </script>    
    <script>
//$(document).ready(function(){
//     $('#eod').dataTable().makeEditable();
//});

$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "aButtons": [
                "copy",
                "csv",
                "xls",
                {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "You have taken this Data from CV Server Admin App"
                },
                "print"
            ]
        }
    } );
} );
</script>
<!--All script action with class -->
<script type="text/javascript">
    $(document).on("click", ".delete", function () {
     var credid = $(this).data('id');
     //alert(credid);
     document.getElementById('credid').value = credid;
     //$(e.currentTarget).find('input[name="credid"]').val(credid);
     //$(".modal-body #credid").val( Id );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
      //$('#deletecred').modal('show');
});

function rhtmlspecialchars(str) {
 if (typeof(str) == "string") {
  str = str.replace(/&gt;/ig, ">");
  str = str.replace(/&lt;/ig, "<");
  str = str.replace(/&#039;/g, "'");
  str = str.replace(/&quot;/ig, '"');
  str = str.replace(/&amp;/ig, '&'); /* must do &amp; last */
  }
 return str;
 }

function editcred(element){
     $(document).on("click", ".edit", function () {
     var credid = $(this).data('id');
     
     document.getElementById('credid2').value = credid;
     
});
    var name = element.parentNode.parentNode.cells[0].innerHTML ;
    var ip = element.parentNode.parentNode.cells[1].innerHTML ;
    var proto = element.parentNode.parentNode.cells[2].innerHTML ;
    var username = element.parentNode.parentNode.cells[3].innerHTML ;
    var pass = rhtmlspecialchars(element.parentNode.parentNode.cells[4].innerHTML);
    document.getElementById('servername').value = name ; 
    document.getElementById('serverip').value = ip ; 
    document.getElementById('protocol').value = proto ; 
    document.getElementById('username').value = username ; 
    document.getElementById('password').value = pass ; 

}

$(document).on("click", ".delserver", function () {
     var serverid = $(this).data('id');
     //alert(credid);
     document.getElementById('serverid').value = serverid;
     
});
$(document).on("click", ".viewserver", function () {
     var serverid = $(this).data('id');
     //alert(serverid);
     $.ajax({
      type : 'post',
      url  : '<?php echo base_url();?>server/selectone',
      data : "serverid="+serverid,
      //dataType : 'json',
      success : function(res) {
          //console.log(res);
//          var obj = $.parseJSON(res);
          var dataObj = JSON.parse(res);
        //console.log(dataObj[0].title); // to see the object
        var servername = dataObj[0].server_name;
        var serverip = dataObj[0].server_ip;
        var os = dataObj[0].OS;
        var ram = dataObj[0].RAM;
        var hdd = dataObj[0].HDD;
        var cpu = dataObj[0].CPU;
        // your code here
        document.getElementById('serverhead').innerHTML = servername+" - "+serverip;
        document.getElementById('ram').innerHTML = ram+" RAM";
        document.getElementById('hdd').innerHTML = hdd+" HDD";
        document.getElementById('cpu').innerHTML = cpu+" CPU";
        document.getElementById('os').innerHTML = os;
        }
      
    });
       
     
});




function editserver(element){
     $(document).on("click", ".editserver", function () {
     var serverid = $(this).data('id');
     
     document.getElementById('serverid2').value = serverid;
     
});
    var name = element.parentNode.parentNode.cells[0].innerHTML ;
    var ip = element.parentNode.parentNode.cells[1].innerHTML ;
    var remark = element.parentNode.parentNode.cells[2].innerHTML ;
    
    document.getElementById('servername').value = name ; 
    document.getElementById('serverip').value = ip ; 
    document.getElementById('remark').value = remark ; 
    
}


$(document).on("click", ".deletecmd", function () {
     var cmdid = $(this).data('id');
     //alert(credid);
     document.getElementById('cmdid').value = cmdid;
     
});

$(document).on("click", ".deletelink", function () {
     var linkid = $(this).data('id');
     //alert(credid);
     document.getElementById('linkid').value = linkid;
     
});


$(document).on("click", ".deletekey", function () {
     var linkid = $(this).data('id');
     //alert(credid);
     document.getElementById('keyid').value = linkid;
     
});

$(document).on("click", ".editcmd", function () {
     var cmdid = $(this).data('id');
     $.ajax({
      type : 'post',
      url  : '<?php echo base_url();?>server/imp/selectone',
      data : "cmdid="+cmdid+"&table=imp_cmds",
      //dataType : 'json',
      success : function(res) {
          
//          var obj = $.parseJSON(res);
          var dataObj = JSON.parse(res);
        //console.log(dataObj[0].title); // to see the object
        var title = dataObj[0].title;
        var cmd = dataObj[0].command;
        var des = dataObj[0].description;
        var id = dataObj[0].id;
        // your code here
        document.getElementById('cmdname').value = title;
        document.getElementById('cmd').value = cmd;
        document.getElementById('description').innerHTML = des;
        document.getElementById('id').value = id;
        }
      
    });
             //document.getElementById('linkid').value = linkid;
     
});

$(document).on("click", ".editlink", function () {
     var linkid = $(this).data('id');
     $.ajax({
      type : 'post',
      url  : '<?php echo base_url();?>server/imp/selectone',
      data : "cmdid="+linkid+"&table=imp_links",
      //dataType : 'json',
      success : function(res) {
          
//          var obj = $.parseJSON(res);
          var dataObj = JSON.parse(res);
        //console.log(dataObj[0].title); // to see the object
        var title = dataObj[0].title;
        var link = dataObj[0].link;
        var des = dataObj[0].description;
        var id = dataObj[0].id;
        // your code here
        document.getElementById('linkname').value = title;
        document.getElementById('links').value = link;
        document.getElementById('description').innerHTML = des;
        document.getElementById('id').value = id;
        }
      
    });
             //document.getElementById('linkid').value = linkid;
     
});



$(document).on("click", ".monitor", function () {
     var id = $(this).data('id');
     var value = $(this).val();
     
//     alert(linkid);
    if(value === 'OFF'){
        var flag = '1';
        $(this).val('ON');
        $(this).addClass('btn-primary').removeClass('btn-warning');
    }
    else{
        var flag =  '0';
        $(this).val('OFF');
        $(this).addClass('btn-warning').removeClass('btn-primary');
    }
      $.ajax({
      type : 'post',
      url  : '<?php echo base_url();?>server/monitor/hostupdate',
      data : "id="+id+"&flag="+flag,
      //dataType : 'json',
      success : function() {
                  }
        
        
    }); 
     
});

$(document).on("click", ".deletehost", function () {
     var id = $(this).data('id');
        console.log(id);
    document.getElementById('mon_host_id').value = id;
});

</script>
<script>

$(document).ready(function() {

    $(".classy-editor").ClassyEdit();

});

</script>

<script>
function downloadfile(abc){
	var script = document.getElementsByClassName(abc)[0].innerHTML;
	
	

downloadInnerHtml(script);

}


function downloadInnerHtml(elHtml) {
	var filename =  'Script.txt';
    var link = document.createElement('a');
    mimeType = 'text/plain';

    link.setAttribute('download', filename);
    link.setAttribute('href', 'data:' + mimeType + ';charset=utf-8,' + encodeURIComponent(elHtml));
    link.click(); 
}


// $(document).ready(function(){
// elHtml = document.getElementById('main').innerHTML;
// $('#yeah').show('puff', 750);
// });


</script>
<script type="text/javascript">
function validuser(){
    if($('#pass').val()!=$('#cpass').val()){
       alert('Password not matches');
       return false;
   }
   return true;
    
}

function getid(){
    alert('reaching');
    return false;
}
</script>

<script type='text/javascript'>
        var options = {
            currentPage: 1,
            totalPages: 10
        };

        $('#example').bootstrapPaginator(options);
    </script>
<script type="text/javascript">
$(document).ready(function(){
    	
    $('#generator').pGenerator({
        'bind': 'click',
        'passwordElement': '#usrpass',
//        'displayElement': '#my-display-element',
        'passwordLength': 16,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': true
//        'onPasswordGenerated': function(generatedPassword) {
//        	alert('My new generated password is ' + generatedPassword);
//        }
    });
});            
</script>


<script type="text/javascript">
            $(function () {
               // $('#datetimepicker1').datetimepicker();
               $('#datetimepicker1').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '0d'
                   
                });
                
            });
            
         $(function () {
               // $('#datetimepicker1').datetimepicker();
                $('#datetimepicker12').datepicker({
                  format: 'yyyy-mm-dd',
                  endDate: new Date()
                  
                  
                });
                
            });
               
            
        </script>


<script type="text/javascript">
  $(function() {
    $('.timepicker').datetimepicker({
      pickDate: false
    });
  });
</script>


<!--Show tutorial with full width -->
<script type="text/javascript">
	
$(document).on("click", ".fulltutos", function () {
     var tutoid = $(this).data('id');
     //alert(tutoid);
     //document.getElementById('serverid').value = serverid;
     
	   $.ajax({
      type : 'post',
      url  : '<?php echo base_url();?>server/imp/selecttuto',
      data : "tutoid="+tutoid+"&table=tutorials",
      dataType : 'json',
      success : function(res) {
      //console.log(res);

        //console.log(res[0].title); // to see the object
         var title = res[0].title;
         var image = res[0].featured_image;
         var des = res[0].description;
         var id = res[0].id;
         var time = res[0].Time;
         
        // // your code here
        document.getElementById('heading').innerHTML = title;
        $("#featured_image").attr("src",image);
        // document.getElementById('').innerHTML = time;
        $( "#time" ).append('Posted on '+time);
        document.getElementById('description').innerHTML = des;
        // document.getElementById('id').value = id;
        }
      
    });     
     
});

$(document).on("click", ".emailsend", function () {
     var table = $('.eodtable').html();
     console.log(table);
        $.ajax({
      type : 'post',
      url  : '<?php echo base_url();?>server/email/send',
      data : "table="+table,
      
      success : function(res) {
        
           jQuery("#mailsent1").modal('show');
        }
      
    });     
     
     
});


</script>


<script> 
 
(function ($) {
  jQuery.expr[':'].Contains = function(a,i,m){
      return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
  };
  
  function listFilter(header, list) {
    var form = $("<form>").attr({"class":"form-group","action":"#"}),
        input = $("<input>").attr({"class":"form-control","type":"text","placeholder":"Search"});
    $(form).append(input).appendTo(header);
 
    $(input)
      .change( function () {
        var filter = $(this).val();
        if(filter) {
          $(list).find(".searchtag:not(:Contains(" + filter + "))").parent().parent().parent().parent().parent().slideUp();
          $(list).find(".searchtag:Contains(" + filter + ")").parent().parent().parent().parent().parent().slideDown();
        } else {
          $(list).find(".hidepanel").slideDown();
        }
        return false;
      })
    .keyup( function () {
        $(this).change();
    });
  }
 
  $(function () {
    listFilter($("#heads"), $("#lists"));
  });
}(jQuery));
 
  </script>
  
  
  <script type="text/javascript">
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "http://10.222.10.160/ci/pkgslist.php",
		data:'keyword='+$(this).val()+'&status=Available',
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(http://localhost/ci/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});


$(document).ready(function(){
	$("#search-box2").keyup(function(){
		$.ajax({
		type: "POST",
		url: "http://10.222.10.160/ci/pkgslist.php",
		data:'keyword='+$(this).val()+'&status=Installed',
		beforeSend: function(){
			$("#search-box2").css("background","#FFF url(http://localhost/ci/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box2").show();
			$("#suggesstion-box2").html(data);
			$("#search-box2").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

function selectCountry1(val) {
$("#search-box2").val(val);
$("#suggesstion-box2").hide();
}

</script>
  
<script type="text/javascript" >

$(document).on("click", ".deleteuser", function () {
     var userid = $(this).data('id');
     document.getElementById('userid').value = userid;
     
});

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#hostmultiselect').multiselect();
    });
</script>


</body>

</html>
