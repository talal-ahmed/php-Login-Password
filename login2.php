<?php 
session_start();

require_once("inc/con1.php");
$msg = "";

if(isset($_POST['submit']))
{

$user = $_POST['user'];
$pass = $_POST['password'];

$query = "select * from login_tbl WHERE USER_NAME = '$user' AND PASSWORD='$pass'";

$cmd = mysqli_query($con,$query);

$row = mysqli_fetch_array($cmd);

if($user == $row[1] && $pass == $row[2])
{

$_SESSION['user'] = $user;
$_SESSION['password'] = $pass;
$type = $_SESSION['type'] = $row[3];

if($type == 'A')
{	
header('location:welcome.php');
}
}
else
{
$msg = "invalid login";
}
}

if(empty($user))
{
$msg = "invalid user and  password";
} 






?>
<!DOCTYPE html>
<html>
<head>
	<title> practice login page </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>	
</head>
<body>
<div class="container">
<h1 class="col-sm-offset-4 ">Login Page</h1>
<form action="login2.php" method="post" class="form-horizontal" >

<div class="form-group">
<label class="label-control col-sm-1">user</label>
<div class="col-sm-4">
<input type="text" name="user" class="form-control">	
</div>	
</div>

<div class="form-group">
<label class="label-control col-sm-1">password</label>
<div class="col-sm-4">
<input type="password" name="password" class="form-control">	
</div>	
</div>

<div class="form-group">
<button type="submit" name="submit" class="btn btn-success col-sm-offset-4">login</button>
<?php echo $msg ?>
</div>

</form>
</div>
</body>
</html>
