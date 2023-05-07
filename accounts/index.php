<?php
session_start();
if(!isset($_SESSION["userid"])){
  $_SESSION["signinerror"]="Invalid Session";
  header("location:../index.php");
}
include "../db_config.php"; 
$username=$_SESSION["userid"];
$sql = "SELECT * FROM users WHERE USER_ID = '$username';";
$result = $con->query($sql);
$row = $result->fetch_assoc();

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
.grid-container {
    display: grid;
    grid-template-columns: 0.8fr 2.5fr;
    grid-gap: 0px;
}
 .dropdown-btn {
  padding: 6px 8px 6px 22px;
  
  font-size: 16px;
 
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.dropdown-btn:hover {
  background-color: #555;
    color: white;
}
.dropdown-container {
  display: none;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
</style>
</head>
<body class="body">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <!--img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top"-->
      Fee Management System
    </a>
    <form class="d-flex " style="align: 'right'" action="../logout.php">
        <button class="btn btn-warning" style="position: absolute; top: 20px; right: 40px;" type="submit">Logout</button>
      </form>
  </div>
</nav>
  <!-- The sidebar -->
<div class="sidebar ">
  <a class="active" href="index.php">Home</a>
  <button class="dropdown-btn" style="height:50px;">Fee Details
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="tuition_fee.php">Tuition Fee</a>
    <a href="exam_fee.php">Exam Fee</a>
    <a href="transportation_fee.php">Transportation Fee</a>
  </div>
  <a href="old_transactions.php">Old Transactions</a>
  <a href="contact.php">Contact</a>
</div>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
} 
</script>
<!-- Page content -->
<br>
<div style="width:auto;margin-right:10%;">
<h1>tab</h1>
</div>
<div class="content grid-container" style="width:auto;">
    <div class="grid-child card" style='width:20rem;height:24%;background-color:#FF766C;'>
    
  <img class="card-img-top" src="../media/user.jpg" alt="<?php echo $_SESSION["userid"]?>">
  <i style="color:#fff;font-size:25px;margin-left:2.5em;"> Profile</i>
    </div>
    <div class="  grid-child ">
            <table class="table noborder" >
                    
                    <div class="graphical-heading"></div>
                    
                    <thead>
                    <th scope="col" style="font-size:20px">Academic Details</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Roll Number:</th>
                            <td> <?php echo $_SESSION["userid"] ?></td>
                            <th scope="row">Name: </th>
                            <td scope="row"><?php echo $_SESSION["username"]?></td>
                        </tr>
                        <tr>
                            <th scope="row">Programme:</th>
                            <td> <?php echo $row["Programme"]?></td>
                            <th scope="row">Branch: </th>
                            <td scope="row"><?php echo $row["Branch"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Regulation: </th>
                            <td> <?php echo $row["Regulation"]?></td>
                            <th scope="row">Section: </th>
                            <td scope="row"><?php echo $row["Section"]?></td>
                        </tr>
                    
                    </tbody>
                </table>
                <br>


                <table class="table noborder">
                <div class="graphical-heading"></div>
                    <thead>
                    <th scope="col" style="font-size:20px">Personal Details</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                <tr>
                <th scope="row">Mobile:</th>
                <td> <?php echo $row["PHONE"] ?></td>
                <th scope="row">Email: </th>
                <td scope="row"><?php echo $row["EMAIL"]?></td>
                </tr>
                <tr>
                <th scope="row">Father name:</th>
                <td> <?php if($row["fathername"]==""){echo "NA";}else{echo $row["fathername"];}?></td>
                <th scope="row">Father mobile: </th>
                <td scope="row"><?php if($row["fatherphone"]==""){echo "NA";}else{echo $row["fatherphone"];}?></td>
                </tr>
    </div>
   
</div>

</body>
</html>