<?php
session_start();
if(!isset($_SESSION["userid"])){
    $_SESSION["signinerror"]="Invalid Session";
    header("location:../index.php");
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


.grid-container {
    display: grid;
    grid-template-columns: 0.8fr 2.5fr;
    grid-gap: 0px;
}
html,body{
  background-color:#f1f1f1;
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
        <button class="btn btn-success" style="position: absolute; top: 20px; right: 40px;" type="submit">Logout</button>
      </form>
  </div>
</nav>
<h1 style="text-align:center;margin:20% auto;">&emsp;&emsp; Page Under Construction</h1>
<div style="text-align:center;">
<a href="old_transactions.php">
  <button  type="button" class="btn btn-info" style="position:absolute;top:60%;width:100px;padding:10px;">Go Back</button>
</a>
</div>
</body>
</html>