<?php 
session_start();
include("dbprocess.php");
$email="";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if (empty($_POST["email"])) {
		$emailErr = "Email is Require";
	}
	else {
		$email = $_POST['email'];
		
	}
	if (empty($_POST["password"])) {
		$passwordErr = "Password is required";
	}
	else {
		$password = md5($_POST['password']);
	}
}

if (!isset($_SESSION['name'])) {
// $q = "SELECT * FROM `testt` WHERE email = '$email' OR password = '$password' ";	
$res = mysqli_query($conn,"SELECT * FROM `testt` WHERE email = '$email' OR password = '$password' ");

if (isset($res)) {
echo "Login";
echo '<div>';
$row = $res->fetch_assoc();
echo " Welcom ".$row['fname'];
echo '</div>';

$_SESSION["name"] = $row['fname'] ;
if (isset($_SESSION['name'])) {
	header("location:read.php");
}
// per($res->fetch_assoc());
}
else {
	echo "Query not set";
}


}
else {
	header("location:read.php");
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>login</title>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
 	<style type="text/css">
 		.wrapper{
 			width:60%;
	        margin:0% auto;
 		}
 		form{
	padding: 6%;
	border-radius: 12px;
	background: #6c6c6f;
	width: 50%;
	margin:18% auto 0%;
	text-align: center;
}
input{
	width:60%;
	padding:15px;
	border-radius: 50px;
	border:1px solid #d3d3de;
	margin-bottom: 10px;
}
.submit{
	width:40%;
	padding:15px;
	border-radius: 50px;
	font-size: 16px;
	background: aqua;
	color:#2a2a2a;
	font-weight: 700;
	margin-top: 3%;

}
.navbar{
	background-color: green;
	height: 5%;
	width: 95%;
	margin: 0% auto;
}
 	</style>
 </head>
 <body>
 	<div class="navbar">
 		
 	</div>
 	<div class="wrapper">
 		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 			<input type="text" name="email" value="<?php echo $email; ?>" required placeholder="Email">
 			<input type="password" name="password" value="" required placeholder="Password">
 			<button class="submit" onclick="$.alert({title: 'Alert!', content: 'Welcom!',});">LogIn</button>
 		</form>
 	</div>
 
 </body>
 </html>