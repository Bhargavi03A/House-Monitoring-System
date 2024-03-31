<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

if(isset($_POST['submit']))
{
	$idd=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];	
	$rno=rand(10,100000);
	$fdd=$_POST['fromdate'];
	$tdd=$_POST['todate'];

	//+$idd +"name"+$name ."contact". $contact."$rno". $contact."fromdate". $fdd."todate".$tdd);
mysqli_query($con,"insert into tblbook(UserID,Name,Mobile,email,AptNumber,AptFrmDate,AptToDate) values('$idd','$name','$contact','$email','$rno','$fdd','$tdd')");

echo "<script>alert('Query received. We will contact you soon.');</script>";  
echo "<script>window.location.href='get-construction-quote.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Rural Development | Request Quote</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid">
	<?php include("leftbar.php");?>
	<div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		<div class="page-title">	
			<h3>Request for the Construction</h3>
     
	
             <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="panel panel-default">
                             
                                <div class="panel-body">
                                    <p>Please click below mention job of your interest to be a part in Rural Develoment:</p>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
 <?php
$uid=$_SESSION['id'];

echo "user" .$uid ;

$query=mysqli_query($con,"select id,email,name,mobile from user where id='$uid'");
while($rw=mysqli_fetch_array($query)){
      ?>                        

	  
   <div class="form-group">
     <label class="col-md-3 control-label">ID </label>
    <div class="col-md-9">                                            
    <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
         <input type="text" name="id" class="form-control" value="<?php echo $rw['id'];?>" readonly="true" />
          </div>                                            
                                                
        </div>
       </div> 
    <div class="form-group">
     <label class="col-md-3 control-label">Name </label>
    <div class="col-md-9">                                            
    <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
         <input type="text" name="name" class="form-control" value="<?php echo $rw['name'];?>" readonly="true" />
          </div>                                            
                                                
        </div>
       </div>
                                        
        <div class="form-group">                                        
   <label class="col-md-3 control-label">Contact no</label>
  <div class="col-md-9 col-xs-12">
  <div class="input-group">
   <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
    <input type="text" name="contact" class="form-control" value="<?php echo $rw['mobile'];?>" readonly="true"/>
     </div>            
       </div>
     </div>
                                      
     <div class="form-group"> <label class="col-md-3 control-label">Request Date</label>  <div class="col-md-9 col-xs-12">
  <div class="input-group">
   <span class="input-group-addon"><span class="fa fa-pencil"></span></span><input type="date" class="form-control1" name="fromdate" id="fromdate" value="" required='true'> </div> </div> </div>
  
    <div class="form-group"> <label class="col-md-3 control-label">Expected Date to Complete</label>  <div class="col-md-9 col-xs-12">
  <div class="input-group">
   <span class="input-group-addon"><span class="fa fa-pencil"></span></span><input type="date" class="form-control1" name="todate" id="todate" value="" required='true'> </div> </div> </div> 
   
   
		
							 

							 
                                            

                                            
                                          
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="email" name="email" class="form-control" value="<?php echo $rw['email'];?>" readonly="true">                                            
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            
                                            
                                       
                                            
                                   
                                            
                                        </div>
                                  
                                        
                                    </div>
   <?php } ?>   
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <input value="Submit" type="submit" name="submit" class="btn btn-primary pull-right">
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>            
                                    
                                    
                                   
                                   
                                    
                               
                                    
                                    
                                      
             
            	
		</div>
    </div>
  </div>
<!-- BEGIN CHAT --> 

 </div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 

</body>
</html>