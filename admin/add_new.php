<?php 
session_start();
if(!isset($_SESSION['userid'])){
    header("../location:index.php");
}
if(!isset($_SESSION["userid"])){
  $_SESSION["signinerror"]="Invalid Session";
  header("Location:../index.php");
}
if(isset($_POST["roll_number"])){
  
$roll=$_POST["roll_number"];
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$programme="B Tech";
$regulation=$_POST["regulation"];
$branch=$_POST["branch"];
$section=$_POST["section"];
$id=2;
$password=$roll;
if($roll=='' || $fname==''||$lname==''||$email==''||$phone=''||$regulation==''||$branch==''||$section==''){
  $_SESSION['form_error']="Enter all fields";
}
else{
  $con = mysqli_connect("localhost", 'root','', "fms1");
if(!$con){
  die("connection failed:".mysqli_connect_error());
}
  $sql="INSERT INTO users values('$roll','$password','$fname','$lname','$phone','$email','$programme','$branch','$regulation','$section',$id,NULL,NULL)";
  if(mysqli_query($con,$sql)){
    $_SESSION['insert']="inserted successfully";
  }
}
}
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

.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display:block;
  color: #f2f2f2;
  text-align: center;
  padding: 18px 14px;
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
.div-center {
  width: 50%;
  height: 50%;
  background-color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
}
    </style>
</head>
<body>

<div class="topnav" id="myTopnav" style='margin-top:0.5%;'>
  <a href="index.php" >Dashboard</a>
  <a href="records.php">All Transactions</a>
  <a href="add_new.php" class="active">Add New Students</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <div class="nav navbar-nav pull-right">
               <a href="../logout.php" class="navbar-brand btn"><strong>Logout</strong></a>
            </div>
</div>
  
<!-- form code-->
<div class="div-center" style="margin-top:10%">
    <div style="margin-left:2%;">
<h1 style="text-align:center;">Add New Student Details</h1>
  <?php  
if(isset($_SESSION['insert'])){
  echo "<div style='text-align:center;color:green;'>".$_SESSION['insert']."</div>";
}
  ?>
    <form action="add_new.php" method="post">
          <div class="form-group">
            <label>Roll Number</label>
            <input type="text" class="form-control"  placeholder="Roll Number" name="roll_number">
          </div>
          <div class='form-row'>
            <div class="form-group col">
              <label>First Name</label>
              <input type="text" class="form-control"  placeholder="First Name" name="first_name">
            </div>
            <div class="form-group col">
              <label>Last Name</label>
              <input type="text" class="form-control"  placeholder="Last name"  name="last_name">
            </div>
          </div>
          <div class='form-row'>
              <div class="form-group col">
                  <label>Email</label>
                  <input type="email" class="form-control"  placeholder="Email" name="email">
              </div>
              <div class="form-group col">
                <label>Phone</label>
                <input type="text" class="form-control"  placeholder="Phone" name="phone">
              </div>
          </div>
          <div class='form-row'>
            <div class="form-group col">
              <label>Regulation</label>
              <input type="text" class="form-control"  placeholder="regulation" name="regulation">
            </div>
            <div class="form-group col">
              <label>Branch</label>
              <input type="text" class="form-control"  placeholder="branch" name="branch">
            </div>
            <div class="form-group col">
              <label>Section</label>
              <input type="number" class="form-control"  placeholder="Section" name="section">
            </div>
          </div>
          <div class="form-group">
            <input style="margin-left:45%;padding:10px 20px;" type="submit" value="Add" name="submit" class="btn btn-info" >
          </div>
    </form>
    </div>
    </div>
</body>
</html>