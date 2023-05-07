<?php
session_start();
if(!isset($_SESSION["userid"])){
    $_SESSION["signinerror"]="Invalid Session";
    header("location:../index.php");
  }
include "../db_config.php";
$data=$_SESSION["receipt"];

$userid=$_SESSION['userid'];
$sql="SELECT * from users where USER_ID= '$userid'";
$result = $con->query($sql);
//$row = $result->fetch_assoc();

$row=mysqli_fetch_assoc($result);
	$name=$row['FIRST_NAME'].' '.$row["LAST_NAME"];
	
	$degree=$row['Programme'];
	$branch=$row['Branch'];
	$batch=$row['Regulation'];
	$noofpapers=null;
	$amtppaper=null;
	$amttbpaid=$data["TOTAL_SUM"];
	
?>

<!DOCTYPE html>
<head>
    <title>FMS</title>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"  >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../templates/css/sidebar.css">
    <style>
.noborder td, .noborder th {
    border: none !important;
    background-color:white;
}


.grid-container {
    display: grid;
    grid-template-columns: 0.8fr 2.5fr;
    grid-gap: 0px;
}
#form1 {
    position: relative;
    bottom: 25px;
    left: 55px;
}
</style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <!--img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top"-->
      Fee Management System
    </a>
    <form class="d-flex " style="align: 'right'" action="../logout.php">
        <button class="btn btn-success" style="position: absolute; top: 20px; right: 40px;" type="submit">Logout</button>
      </form>
  </div>
</nav>

<?php
echo '
	<div style="float:left; margin-left:10%;margin-top:1%;width:100;height:100;">
	<img src="college_logo.png" width="100%" height="100%" alt="college_logo"></img>
	</div>
	<div style="float:left;margin-left:12%;">
	<h1 style="text-align:center; color:gray;height:30%;">Examination Branch</h1>
	<h2 style="text-align:center;color:gray;height:30%;">College Name</h2>
	<h2 style="text-align:center;color:gray;">Examination Fee Payment Receipt </h2>
	
	</div>
	<div style="float:left;width:200px;height:150px;">
	<br/>
	<h3 style="margin-left:1.2%;">  Date :'.date("d-M-Y").'</h3></div>
	<div style="margin-top:2%;width:65%;float:left;">
<table class="noborder" style="font-size:26px; margin-left:40%;"  border="1" cellpadding="5" cellspacing="5" width="60%">
	<tr>
	<td style="text-align:none;" width="100">Name</td>
	<td width="42" style="text-align:none;" width="100"  >'.$name.'</td>
	</tr>
	<tr>
	<td style="text-align:none;">Roll Number</td>
	<td style="text-align:none;"   >'.$userid.'</td>
	</tr>
	<tr>
	<td style="text-align:none;">Degree</td>
	<td style="text-align:none;" >'.$degree.'</td>
	</tr>
	<tr>
	<td style="text-align:none;">Branch</td>
	<td style="text-align:none;"  >'.$branch.'</td>
	</tr>
	<tr>
	<td style="text-align:none;">Regulation</td>
	<td style="text-align:none;"  >'.$batch.'</td>
	</tr>
	<tr>
	<td style="text-align:none;">Total Amount Paid</td>
	<td style="text-align:none;color:red;"  > Rs: '.$amttbpaid.'</td>
	</tr>
	</table></div>
	<div style="float:left;width:160px;height:60px;margin-top:18%;">
	<h3 style="text-aligh:left;text-font:20px;"><i>Authorized Signatory</h3></i>
	</div>
	<!--div style="float:left;width:500px;height:100px;">
	<form method="get" action="old_transactions.php" style="margin-left:125%;margin-top:3%;">
	<input type="submit" class="btn btn-info" value="back" style="font-size:18px>
	</div-->
	</form>
	<div class="container" style="float:left;text-align:center;margin-left:5%;width=700px;height:100px;margin-top:-1%;">
	<a href="old_transactions.php"><button  type="button" class="btn btn-info" style="padding:13px;margin:15px;">back</button></a>
	<a href="print_receipt.php"><button type="button" class="btn btn-info" style="padding:13px;">print</button></a>
	</form>
';
	?>
    
</body>
</html>