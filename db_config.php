<?php 
define('my_site_path', 'http://localhost/fms1');
$con = new mysqli('localhost', 'root', '', 'fms1');
if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>