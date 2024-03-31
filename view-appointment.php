<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
	  $company=$_POST['company'];
   $query=mysqli_query($con, "update  tblbook set Remark='$remark',Status='$status',company='$company' where ID='$cid'");
    if ($query) {
    
    echo '<script>alert("All remark has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-appointment.php'; </script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Admin | Manage Users</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row"> 
  
      <?php include("leftbar.php");?>
    
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                     <h3>Widget Settings</h3>

                </div>
                <div class="modal-body">Widget settings form goes here</div>
            </div>
            <div class="clearfix"></div>
            <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li> 
                    <li><a href="#" class="active">Manage Users</a>

                    </li>
                </ul>
                <div class="page-title">	<i class="icon-custom-left"></i>

                    	<h3>Manage Users </h3>	
                </div>
             
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="grid simple ">
                                    <div class="grid-title no-border">
                                        	<h4>All Users Details</h4>
                                        <div class="tools">	<a href="javascript:;" class="collapse"></a>
											<a href="#grid-config" data-toggle="modal" class="config"></a>
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
                                        </div>
                                    </div>
                                    <div class="grid-body no-border">
                              
                                          <h4>View Appointment:</h4>
						<?php
$cid=$_GET['viewid'];
$ret=mysqli_query($con,"select user.name,user.address,user.email,user.mobile,tblbook.ID as bid,tblbook.AptNumber,tblbook.AptFrmDate,tblbook.AptToDate,tblbook.Message,tblbook.BookingDate,tblbook.Remark,tblbook.Status,tblbook.RemarkDate from tblbook join user on user.ID=tblbook.UserID where tblbook.ID='$cid'");

$compan=mysqli_query($con,"select * from tblservices");



$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<table class="table table-bordered">
							<tr>
    <th>Appointment Number</th>
    <td><?php  echo $row['AptNumber'];?></td>
  </tr>
  <tr>
<th>Name & Address</th>
    <td><?php  echo $row['name'];?> <?php  echo $row['address'];?></td>
  </tr>

<tr>
    <th>Email</th>
    <td><?php  echo $row['email'];?></td>
  </tr>
   <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row['mobile'];?></td>
  </tr>
   <tr>
    <th>Appointment Date</th>
    <td><?php  echo $row['AptFrmDate'];?></td>
  </tr>
 
<tr>
    <th>Appointment Time</th>
    <td><?php  echo $row['AptToDate'];?></td>
  </tr>
  
  
  <tr>
    <th>Apply Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
  </tr>
  
  

<tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Updated Yet";
}

if($row['Status']=="Selected")
{
  echo "Selected";
}

if($row['Status']=="Rejected")
{
  echo "Rejected";
}

     ;?></td>
  </tr>
						</table>
						<table class="table table-bordered">
							<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Selected" selected="true">Selected</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>


<tr>
    <th>Company </th>
    <td><select name="company">
    <option value="">Select company</option>
    <?php 
    $query ="SELECT ID,ServiceName FROM tblservices";
    $result = $con->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['ServiceName'];
        $id =$optionData['ServiceName'];
    ?>
    <option value="<?php echo $id; ?>" ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
</select></td>
  </tr>



  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
							<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr>
    <th>Status</th>
    <td><?php echo $row['Status']; ?></td>
  </tr>






<tr>
<th>Remark date</th>
<td><?php echo $row['RemarkDate']; ?>  </td></tr>









						</table>
						<?php } ?>
						<?php } ?>

                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
					</div>
                </div>
            </div>
            <!-- END PAGE -->
        </div>

 </div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK--> 
<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS --> 	
<script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 	
<script>
	//Too Small for new file - Helps the to tick all options in the table 
	$('table .checkbox input').click( function() {			
		if($(this).is(':checked')){			
			$(this).parent().parent().parent().toggleClass('row_selected');					
		}
		else{	
		$(this).parent().parent().parent().toggleClass('row_selected');		
		}
	});
	// Demo charts - not required 
	$('.customer-sparkline').each(function () {	
		$(this).sparkline('html', { type:$(this).attr("data-sparkline-type"), barColor:$(this).attr("data-sparkline-color") , enableTagOptions: true  });	
	});
</script>
<!-- BEGIN CORE TEMPLATE JS --> 
<script src="../assets/js/core.js" type="text/javascript"></script> 
<script src="../assets/js/chat.js" type="text/javascript"></script> 
<script src="../assets/js/demo.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS --> 
</body>

</html>