<?php
session_start();
if(!isset($_SESSION["userid"])){
    $_SESSION["signinerror"]="INvalid session";
    header("location:../index.php");
}
include "../db_config.php";
$user=$_SESSION["userid"];
$sql="select * from   transactions order by dateofpay desc";
$result=$con->query($sql);

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

.body{
    background-color:#f1f1ff;;
}
.topnav {
  background-color: #333;
  overflow: hidden;
}
.table-font{
  font-size: 18px;
}
/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 18px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}
    </style>
</head>
<body>
<div class="topnav" id="myTopnav" style='margin-top:0.5%;'>
  <a href="index.php" >Dashboard</a>
  <a href="records.php" class="active">All Transactions</a>
  <a href="add_new.php">Add New Students</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <div class="nav navbar-nav pull-right">
               <a href="../logout.php" class="navbar-brand btn"><strong>Logout</strong></a>
            </div>
</div>

<div>
    <div style="margin-top:2%;"></div>
  <?php
  if(mysqli_num_rows($result)>0){
  echo "
  <div class='table-responsive'>
  <table class='table table-stripped table-curved table-hover table-font'>
    <thead class='thead-dark'>
        <th>Student roll number</th>
        <th>date of payment</th>
        <th>transaction id</th>
        <th>amount</th>
        <th>fee type</th>
        <th>mode of pay</th>  
    </thead>
    <tbody>";
      
      while($rows=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$rows["USER_ID"]."</td>";
        echo "<td>".$rows["DATEOFPAY"]."</td>";
        echo "<td>".$rows["TRANSACTION_ID"]."</td>";
        echo "<td>".$rows["TOTAL_SUM"]."</td>";
        echo "<td>".$rows["FEE_TYPE"]."</td>";
        echo "<td>".$rows["MODE_OF_PAY"]."</td>";
        echo "</tr>";
        echo "</div>";
      }
      }
      else{
        echo "<tr><td>'No Results found!'</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>