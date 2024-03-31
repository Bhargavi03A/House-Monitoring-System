<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if($_GET['delid']){
$sid=$_GET['delid'];
mysqli_query($con,"delete from tblbook where ID ='$sid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='req-connection.php'</script>";
          }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Rural Development | Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.cpassword.value)
{
alert('New Password and Re-Password field does not match');
document.signup.cpassword.focus();
return false;
}
return true;
}   

</script>

</head>
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Request for Construction</h2>
         
          <br>




		  
        </div>
        <div class="col-md-5 "> <br>
		<table class="table table-bordered"> <thead> <tr> <th>#</th> <th> Appointment Number</th> <th>Name</th><th>Mobile Number</th> <th>Appointment Date</th><th>Appointment Time</th>
							<th>Status</th> </tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select user.name,user.email,user.mobile,user.address,tblbook.ID as bid,tblbook.AptNumber,tblbook.AptDate,tblbook.AptTime,tblbook.Message,tblbook.BookingDate,tblbook.Status from tblbook join user where user.id=tblbook.UserID");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr> <th scope="row"><?php echo $cnt;?></th> <td><?php  echo $row['AptNumber'];?></td> <td><?php  echo $row['name'];?> <?php  echo $row['address'];?></td><td><?php  echo $row['mobile'];?></td><td><?php  echo $row['AptDate'];?></td> <td><?php  echo $row['AptTime'];?></td><?php if($row['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['Status'];?></td><?php } ?> 
                      </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
        </div>
     
    
  </div>
</div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
</body>
</html>