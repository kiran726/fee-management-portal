<?php
session_start();

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

<div class="topnav" id="myTopnav" style="margin-top:1%;">
  <a href="index.php" class="active">Dashboard</a>
  <a href="records.php">All Transactions</a>
  <a href="add_new.php">Add New Students</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <div class="nav navbar-nav pull-right">
               <a href="../logout.php" class="navbar-brand btn"><strong>Logout</strong></a>
            </div>
</div>
<div style="text-align:center;margin-top:2%;">
<h1 style="font-style:oblique">Welcome Admin</h1>
</div>
<div style="margin-top:5%"></div>
<div class="row" style="margin-left:10%;">
  <div class="col-sm-3 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Number of Transaction today</h5>
        <p class="card-text"></p>
        <div  style="text-align:center;"><a href="#" class="btn btn-lg">123</a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total number of Transaction monthly</h5>
        <p class="card-text"></p>
        <div  style="text-align:center;"><a href="#" class="btn btn-lg">123</a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-3 ">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Transactions</h5>
        <p class="card-text"></p>
        <div  style="text-align:center;"><a href="#" class="btn btn-lg">123</a></div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>