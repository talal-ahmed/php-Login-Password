<?php


$con= mysqli_connect("localhost","root","","ghazi");  // database connection ghazi is database

if(!$con)
{
 die("con failed". mysqli_connect_error($con));	
}
?>
