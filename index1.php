<?php session_start();
define('my_site_path', 'http://localhost/fms');
$con = new mysqli('localhost', 'root', '', 'fms');
?>

<!doctype html>
<html lang="en">
	<head>
		<title>FMS | Homepage</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	</head>
    <body class="p-0">
		<!-- intruder -->
		<?php require 'templates/intruder.php'; ?>
		<?php require 'templates/no_authority.php'; ?>
		<?php unset($_SESSION['noAuthority']); ?>
		<?php unset($_SESSION['intruder']); ?>
		<!-- /intruder -->
        <div>
  <div class="container" style="margin-top:20px;  align:center;">
    <div class="d-grid gap-2 col-6 mx-auto">
      <form  name="login_form" method="post" action="login.php" role="form">
        
          <h2>Please Sign In</h2>
          <hr>
          <div class="col-lg order-lg-2">
					<!-- login-error -->
					<?php if(isset($_SESSION['signinerror']) && $_SESSION['signinerror'] != ''){?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<span id="error" class="lead text-danger"><?php echo $_SESSION['signinerror']; ?></span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php session_destroy(); }?><!-- /login-error -->
				
          <div class="form-group">
            Username:   <input class="" name="user_id" type="text" id="user_id" placeholder="Roll Number">
          </div>
          <div class="form-group">
            Password:   <input class="" type="password" name="password" id="password" placeholder="Password">
          </div>
          
          <div>
            <div class="form-group">
              <input class="btn btn-primary btn-sm" type="submit" name="Submit" value="Login">
            </div>
        </form>
    </div>
  </div>
</div>
</body>
</html>