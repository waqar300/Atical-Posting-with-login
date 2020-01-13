<?php 
session_start();
if (isset($_SESSION['name'])) {
	header("location:read.php");
}
$fname = $email = $password = $contact = $city = "";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script>
		$('#dialogBox').dialog('open');

setTimeout(function(){
   alert("You are successfully registered");
},100);
</script>
</head>
<body>
	<div class="wrapper">
		<form method="POST" action="process.php">
			
			<input type="text" name="fname" placeholder="Full Name" value="<?php echo $fname; ?>" ><br>
		    
		    <input type="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>" required><br>
			
			<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" ><br>
			
			<input type="number" name="contact" placeholder="+92 3317744124" value="<?php echo $contact; ?>"><br>
			
			<input type="text" name="city" placeholder="City" value="<?php echo $city; ?>"><br>
			
			<button class="submit" onclick="" id="dialogBox">Sign Up</button>

		

		</form>
	</div>
	
</body>
</html>