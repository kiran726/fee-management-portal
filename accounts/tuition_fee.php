<?php
session_start();
if(!isset($_SESSION["userid"])){
  $_SESSION["signinerror"]="Invalid Session";
  header("location:../index.php");
}
include '../db_config.php';
$userid=$_SESSION["userid"];
$sql = "SELECT * FROM users WHERE USER_ID = '$userid';";
$result = $con->query($sql);
$row1 = $result->fetch_assoc();
$sql="Select * from fee_due_details where USER_ID='$userid'";
$res=$con->query($sql);
if(mysqli_num_rows($res)>0){

}
else{
  $_SESSION["fee_error"]="unknown user";
  echo '<style>
  check{display:none;}</style>';
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
<body>
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
  <a class="" href="index.php">Home</a>
  <button class="dropdown-btn active" style="color:white;background-color: #04AA6D;height:50px;">Fee Details
    <i class="fa fa-caret-down"></i>
  </button>
  
  <div class="dropdown-container">
    <a href="tuition_fee.php" class="active" style="margin:8px;">Tuition Fee</a>
    <a href="exam_fee.php">Exam Fee</a>
    <a href="transportation.php">Transportation Fee</a>
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
<div class="content" style="text-align:center;">
  
<br>
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
                            <td> <?php echo $row1["Programme"]?></td>
                            <th scope="row">Branch: </th>
                            <td scope="row"><?php echo $row1["Branch"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Regulation: </th>
                            <td> <?php echo $row1["Regulation"]?></td>
                            <th scope="row">Section: </th>
                            <td scope="row"><?php echo $row1["Section"]?></td>
                        </tr>
                    
                    </tbody>
                </table>
                <br>
    </div>
    <div>
    <?php
      if(isset($_SESSION["fee_error"])){
        echo "error occured contact admin";
        session_destroy();
      }
      else{
        $row=$res->fetch_assoc();
        $tuition=$row["tuition_fee"];
        $misl=$row["miscellaneous_fee"];
        $total=$tuition+$misl;
        echo "<form action='pay_fee.php' method='post'>
        <div class='form-row'>
          <div class='col-md-5 mb-3>
            <label for='a' style='text-align:left;'>Tuition Fee<input class='form-control' style='text-align:center;' type='text' value=$tuition name='tuition' readonly>
            </label>
          </div>
          <div class='col-md-1 '>
          </div>
          
          <div class='col-md-3 mb-3>
            <label for='a' style='text-align:left;'>Tuition fee fine<input class='form-control' style='text-align:center;' type='text' value='0' name='tuition' readonly>
            </label>
          </div>
        </div>
        <br>
        <br>
        <div class='form-row'>
          <div class='col-md-5 mb-3>
            <label for='a' style='text-align:left;'>Miscellaneous Fee<input class='form-control' style='text-align:center;' type='text' value='$misl' name='tuition' readonly>
            </label>
            </div>
            <div class='col-md-1 '>
            </div>
            <div class='col-md-3 mb-3>
              <label for='a' style='text-align:left;'>Miscellaneous Fee fine<input class='form-control' style='text-align:center;' type='text' value='0' name='tuition' readonly>
              </label>
            </div>
          </div>
          <hr style='height:1px;background-color:gray;'/>
          
        <div class='form-row' style='align:center;margin-left:55%;'>
        
        <div class='col-md-5 mb-3'>
          <label for='a' style='text-align:left;'>Total Fee<input class='form-control' style='text-align:center; '  type='text' value='$total' name='tuition' readonly>
          </label>
        </div>
        </div>
          <div class='check' style='margin-left:30%;'>
          <input class='btn btn-info btn-lg ' type='submit' name='submit' value='pay fee'>
          </div>
        
        ";
      }
    ?>
  </div>
</body>
</html>
